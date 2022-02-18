<div class="container">
    <div class="row footer-theme partition-f">
        <div class="col-lg-4 col-md-6">
            <div class="footer-title footer-mobile-title">
                <h4>about</h4>
            </div>
            <div class="footer-contant">
                <div class="footer-logo"><img src="{{asset('assets/images/icon/logo/f8.png')}}" alt=""></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                <div class="footer-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col offset-xl-1">
            <div class="sub-title">
                <div class="footer-title">
                    <h4>my account</h4>
                </div>
                <div class="footer-contant">
                    <ul>
                        <li><a href="#">mens</a></li>
                        <li><a href="#">womens</a></li>
                        <li><a href="#">clothing</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">featured</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="sub-title">
                <div class="footer-title">
                    <h4>why we choose</h4>
                </div>
                <div class="footer-contant">
                    <ul>
                        <li><a href="#">shipping & return</a></li>
                        <li><a href="#">secure shopping</a></li>
                        <li><a href="#">gallary</a></li>
                        <li><a href="#">affiliates</a></li>
                        <li><a href="#">contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="sub-title">
                <div class="footer-title">
                    <h4>store information</h4>
                </div>
                <div class="footer-contant">
                    <ul class="contact-list">
                        <li><i class="fa fa-map-marker"></i>{{ $adminProfile->address }}
                        </li>
                        <li><i class="fa fa-phone"></i>
                            <a href="tel:+91{{ explode(',', $adminProfile->mobile)[0] }}">
                                Call Us: +91 {{ explode(',', $adminProfile->mobile)[0] }}
                            </a>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <a href="mailto:{{ explode(',', $adminProfile->email)[0] }}">
                                Email Us: <span class="text-lowercase">{{ explode(',', $adminProfile->email)[0] }}</span>
                            </a>
                        </li>
{{--                        <li><i class="fa fa-fax"></i>Fax: 123456</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
