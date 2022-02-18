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
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <section class="register-page section-b-space">
                        <div class="container">
                            @if(session()->has('email_verified'))
                                <p class="alert-success h5 p-2 rounded">
                                    <i class="fa fa-check-circle" style="font-size: 25px;"></i>
                                    &nbsp;
                                    {{ session('email_verified') }}
                                </p>
                            @endif
                            @if(session()->has('link_expired'))
                                <p class="alert-danger h5 p-2 rounded">
                                    <i class="fa fa-times-circle" style="font-size: 25px;"></i>
                                    &nbsp;
                                    {{ session('link_expired') }}
                                    <a href="{{ route('send_email_verify') }}" >Click here to resend verification link.</a>
                                </p>
                            @endif
                            @if(session()->has('already_verified'))
                                <p class="alert-danger h5 p-2 rounded">
                                    <i class="fa fa-times-circle" style="font-size: 25px;"></i>
                                    &nbsp;
                                    {{ session('already_verified') }}
                                </p>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
