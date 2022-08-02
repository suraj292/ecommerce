<div>

    <!-- Home Video banner -->
    <section class="p-0 height-100 sm-responsive">
        <div class="banner">
            <video autoplay muted loop class="tagline-video" style="width: 100%;">
                <source src="https://drive.google.com/uc?export=download&id={{ $banners->video }}" type="video/mp4">
            </video>
            <div class="overlay"></div>
            <div class="banner-innner">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="banner-left">
                                <h1> {{ $banners->heading }} </h1>
                                <p> {{ $banners->para }} </p>
                                <a href="{{ $banners->link }}" class="btn btn-outline me-3" style="background: #0000004d; color: whitesmoke;">{{ $banners->button_name }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Video banner end -->

    <!-- home page custom image animation -->
    <section class="container" id="home-img-animation">
        <div class="panels">
            <div class="panels__container">
                <a href="#" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://images.unsplash.com/photo-1621252346441-c42a54aa8707?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80">
                        {{--                    <h3 class="panel__title">EXPLORE</h3>--}}
                        {{--                    <div style="height: 100%; "></div>--}}
                    </div>
                </a>
                <a href="#" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://images.unsplash.com/photo-1523779105320-d1cd346ff52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80">
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
        @media screen and (min-width: 800px) {
            .panels__container img{
                width: 100%;
                height: 550px;
            }
            .banner-innner{
                margin-top: 100px;
            }
        }
        @media screen and (max-width: 800px) {
            .tagline-video{
                margin-top: -30px;
            }
            /*.panel__content img{*/
            /*    width: 100%;*/
            /*    height: 415px;*/
            /*}*/
        }
        @media screen and (max-width: 990px) {
            .panel__content img{
                width: 90%;
                height: 350px;
            }
            .panels{
                background: none;
            }
        }
        @media screen and (max-width: 700px) {
            .panel__content img{
                width: 90%;
                height: 290px;
            }
            .panels{
                background: none;
            }
        }
        @media screen and (max-width: 360px) {
            #home-img-animation{
                margin-top: -200px;
            }
            .panel__content img {
                width: 90%;
                height: 220px;
            }
            .panels{
                background: none;
            }
        }
        @media screen and (max-width: 576px) {
            .tagline-video{
                margin-top: -50px;
            }
        }
        /*516*/
        @media screen and (max-width: 516px) {
            .home-img-animate{
                margin-top: -50px;
            }
        }
    </style>
@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
    <script>
        $(document).ready(function () {
            if($(window).width() < 801){
                $('#home-img-animation div').removeClass('panels__container');
                $('#home-img-animation a').removeClass('panel');
            }
        });
    </script>
@endsection
