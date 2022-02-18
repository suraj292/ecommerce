<div class="checkout-title">
    <h3>User Authorization</h3>
</div>
<div class="row check-out">
    <div class="shadow p-3 mb-5 bg-body rounded lgn-reg-btn">
        <div class="form-group col-12 text-center">
            <a href="{{ route('register') }}" class="btn-solid btn btn-reg">Register</a>
        </div>

        <div class="hr-sect"> Already a Member </div>

        <div class="form-group col-12 text-center mt-4">
            <a href="{{ route('login') }}" class="btn-solid btn btn-sign">Sign in</a>
        </div>

        <div class="hr-sect"> Or </div>

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
