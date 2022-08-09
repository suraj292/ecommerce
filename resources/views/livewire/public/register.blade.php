<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                @if(session()->has('verifyEmail'))
                    <p class="alert-success p-2 rounded">
                        {{ session('verifyEmail') }}
                    </p>
                @else
                    <h3>create account</h3>
                    <div class="theme-card">

                        <form class="theme-form" wire:submit.prevent="register">
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="fname">Full Name <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="fname" placeholder="Full Name" wire:model.defer="register.fullName">
                                    @error('register.fullName') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="dob">Date of Birth <span style="color: gray; font-size: 10px;"> (OPTIONAL) </span></label>
                                    <input type="date" class="form-control" id="fname" wire:model.defer="register.dob">
                                    @error('register.dob') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">email <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" wire:model.defer="register.email">
                                    @error('register.email') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Mobile <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" wire:model.defer="register.mobile">
                                    @error('register.mobile') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="password">Password <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" wire:model.defer="register.password">
                                    @error('register.password') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password">Confirm Password <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" wire:model.defer="register.confirmPassword">
                                    @error('register.confirmPassword') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-solid w-auto">create Account</button>
                        </form>

                        <br>
                        <div class="hr-sect"> Or Sign in with </div>

                        <div class="container">
                            <div class="row text-center">

                                <div class="col-md-3">
                                    <a href="{{ route('google_login') }}" class="btn btn-social btn-lg btn-google rounded m-3">
                                        <i class="fa fa-google"></i>
                                        Google
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('facebook_login') }}" class="btn btn-social btn-lg btn-facebook rounded m-3">
                                        <i class="fa fa-facebook"></i>
                                        Facebook
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{-- route('twitter_login') --}}" class="btn btn-social btn-lg btn-twitter rounded m-3">
                                        <i class="fa fa-twitter"></i>
                                        Twitter
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('linkedin_login') }}" class="btn btn-social btn-lg btn-linkedin rounded m-3">
                                        <i class="fa fa-linkedin"></i>
                                        LinkedIn
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
@section('style')
    {{--    <link href="{{ asset('assets/css/docs.css') }}" rel="stylesheet" >--}}
    {{--<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/css/bootstrap-social.css') }}" rel="stylesheet" >
@endsection
