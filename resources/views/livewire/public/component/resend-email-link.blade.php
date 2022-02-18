<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Verification</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Send Verification Link</h3>
                    <div class="theme-card">

                        <form class="theme-form" wire:submit.prevent="resend">
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <label for="email">email <span class="text-danger"> * </span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" wire:model.lazy="email">
                                    @error('email') <p class="text-danger" style="margin-top: -20px;">{{ $message }}</p> @enderror
                                    @if(session()->has('email_not_registered'))
                                    <p style="margin-top: -20px; color: red;">
                                        {{ session('email_not_registered') }}
                                        <a href="{{ route('register') }}"> Click here to Register </a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-solid w-auto">create Account</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
