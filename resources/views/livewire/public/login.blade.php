<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Sign in</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Login</h3>
                    <div class="theme-card">

                        <form class="theme-form" wire:submit.prevent="login">
                            <div class="form-group">
                                <label for="email">Email or Mobile</label>
                                <input type="text" class="form-control" id="email" placeholder="Email or Mobile" wire:model.defer="emailMobile">
                                @error('emailMobile') <p style="margin-top: -20px; color: red;"> {{ $message }} </p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password" class="form-control" id="review" placeholder="Enter your password" wire:model.defer="password">
                                @error('password') <p style="margin-top: -20px; color: red;"> {{ $message }} </p> @enderror
                                @if(session()->has('wrong_credential'))
                                    <p style="margin-top: -20px; color: red;"> {{ session('wrong_credential') }} </p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-solid">Login</button>
                        </form>

                    </div>
                    <br>
                    <div class="hr-sect"> Or Sign in with </div>

                    <div class="container">
                        <div class="row text-center">

                            <div class="col-md-6">
                                <a href="{{ route('google_login') }}" class="btn btn-social btn-lg btn-google rounded m-3">
                                    <i class="fa fa-google"></i>
                                    Google
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('facebook_login') }}" class="btn btn-social btn-lg btn-facebook rounded m-3">
                                    <i class="fa fa-facebook"></i>
                                    Facebook
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{-- route('twitter_login') --}}" class="btn btn-social btn-lg btn-twitter rounded m-3">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('linkedin_login') }}" class="btn btn-social btn-lg btn-linkedin rounded m-3">
                                    <i class="fa fa-linkedin"></i>
                                    LinkedIn
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                        <a href="{{ route('register') }}" class="btn btn-solid">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

</div>
@section('style')
    <link href="{{ asset('assets/css/bootstrap-social.css') }}" rel="stylesheet" >
@endsection
