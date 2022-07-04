<div>

    <!-- Home Video banner -->
    <section class="p-0 height-100 sm-responsive">
        <div class="banner">
            <video autoplay muted loop class="tagline-video">
                <source src="http://www.bigcom.com/assets/2014/10/asmc_bg2.mp4" type="video/mp4">
            </video>
            <div class="overlay"></div>
            <div class="banner-innner">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="banner-left">
                                <h1> Lorem ipsum dolor sit amet, consectetur adipiscing elit </h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                <a href="#"> Contact </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Video banner end -->

    <!-- home page custom image animation -->
    <section class="">
        <div class="panels">
            <div class="panels__container">
                <a href="#" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://www.dior.com/couture/var/dior/storage/images/29895135/53-int-EN/cdc-dispatch8_1440_1200.jpg" width="100%" height="600px">
                        {{--                    <h3 class="panel__title">EXPLORE</h3>--}}
                        {{--                    <div style="height: 100%; "></div>--}}
                    </div>
                </a>
                <a href="#" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://www.dior.com/couture/var/dior/storage/images/29893608/94-int-EN/pcd-dispatch11_1440_1200.jpg" width="100%" height="600px">
                        {{--                    <h3 class="panel__title">DISCOVER</h3>--}}
                        {{--                    <div style="height: 100%; "></div>--}}
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- home page custom image animation -->

</div>
@section('style')
    <link rel="stylesheet/less" type="text/css" href="{{ 'assets/less/main.less' }}" />
    <style>
        .banner {
            height: 100vh;
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .banner video {
            /*width: 100%; 1300*/
            position: absolute;
            overflow: hidden;
        }
        @media screen and (min-width: 1300px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
        }

        .banner-innner {
            padding: 200px 0;
        }

        header {
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 11;
        }

        .banner-left {
            text-align: center;
            width: 65%;
            margin: 0 auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        .banner-left h1 {
            color: #fff;
            text-transform: uppercase;
            font-size: 42px;
            font-weight: 800;
            line-height: 50px;
            text-shadow: 1px 2px #000;
            margin-bottom: 15px;
        }

        .banner-left p {
            color: #fff;
            letter-spacing: 0.5px;
            line-height: 28px;
            margin-bottom: 30px;
        }

        .custom-btn {
            width: 100%;
            background: #E91E63;
            color: #fff;
            letter-spacing: 2.5px;
            transition: 0.8 ease;
        }

        .banner-left a {
            background: #e91e63;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            padding: 8px 35px;
            border-radius: 4px;
            transition: 0.8 ease;
        }

        .banner-left a:hover {
            letter-spacing: 3px;
            transition: 0.8 ease;
        }

        .custom-btn:hover {
            letter-spacing: 3px;
            transition: 0.8 ease;
        }

        .navbar-light .navbar-brand {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 700;
            font-size: 30px;
            text-transform: uppercase;
            text-shadow: 1px 2px #000;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            font-size: 18px;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .navbar-light .navbar-nav .active>.nav-link,
        .navbar-light .navbar-nav .nav-link.active,
        .navbar-light .navbar-nav .nav-link.show,
        .navbar-light .navbar-nav .show>.nav-link {
            color: #fff;
        }

        .navbar-light .navbar-nav .active>.nav-link,
        .navbar-light .navbar-nav .nav-link.active,
        .navbar-light .navbar-nav .nav-link.show,
        .navbar-light .navbar-nav .show>.nav-link:hover {
            color: #e91e63;
        }

        .navbar-light .navbar-brand:focus,
        .navbar-light .navbar-brand:hover {
            color: #fff;
        }

        .navbar-light .navbar-nav .nav-link:focus,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #e91e63;
        }

        .dropdown-menu {
            padding: 0px;
        }

        span.navbar-toggler-icon {
            background-image: url(https://i.ibb.co/1v9M0dZ/menu.png) !important;
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        button.navbar-toggler:focus {
            outline: none;
        }

        a.dropdown-item {
            padding: 10px;
            background: #515156;
            color: #fff;
        }



        @media only screen and (max-width: 800px) {
            .banner-left h1 {
                color: #fff;
                text-transform: uppercase;
                font-size: 30px;
                font-weight: 800;
                line-height: 35px;
                text-shadow: 1px 2px #000;
            }

            .banner {
                padding: 120px 0;
                height: auto;
            }

            .nav-color {
                background: #000;
            }

            .navbar-light .navbar-nav .nav-link {
                padding-left: 0;
            }

            .banner-innner {
                padding: 120px 0;
            }
        }
    </style>
    <style>
        @media screen and (min-width: 799px) {

        }
        @media screen and (max-width: 800px) {
            .tagline-video{
                margin-top: -30px;
            }
        }
        @media screen and (max-width: 576px) {
            .tagline-video{
                margin-top: -50px;
            }
        }
        /*516*/
        @media screen and (max-width: 516px) {
            /*.home-img-animate{*/
            /*    margin-top: -50px;*/
            /*}*/
        }
    </style>
@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
    <script>
        $(document).ready(function () {
            if($(window).width() > 800){

            }
        });
    </script>
@endsection
