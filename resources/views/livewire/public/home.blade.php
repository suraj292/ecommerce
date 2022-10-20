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
                                <a class="video-banner-btn">
                                    {{ $banners->button_name }}
                                </a>
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
                <a href="{{ $image[0]->redirect_link }}" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://drive.google.com/uc?export=view&id={{ $image[0]->image_link }}">
                    </div>
                </a>
                <a href="{{ $image[1]->redirect_link }}" class="panel">
                    <div class="panel__content panel__title">
                        <img src="https://drive.google.com/uc?export=view&id={{ $image[1]->image_link }}">
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

        @media screen and (min-width: 1300px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panels__container img{
                width: 100%;
                height: 550px;
            }
            .banner-innner {
                padding: 200px 0;
                margin-top: 120px;
            }
        }

        @media screen and (min-width: 1000px) and (max-width: 1300px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panels__container img{
                width: 100%;
                height: 430px;
            }
            .banner-innner {
                padding: 200px 0;
                margin-top: 120px;
            }
            #home-img-animation{
                margin-top: -70px;
            }
        }
        @media only screen and (min-width: 900px) and (max-width: 999px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panels__container img{
                width: 100%;
                height: 350px;
            }
            .banner-innner {
                padding: 200px 0;
            }
            #home-img-animation{
                margin-top: -80px;
            }
        }
        @media only screen and (min-width: 800px) and (max-width: 899px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panels__container img{
                width: 100%;
                height: 350px;
            }
            .banner-innner {
                padding: 150px 0;
            }
            #home-img-animation{
                margin-top: -140px;
            }
        }
        @media only screen and (min-width: 700px) and (max-width: 799px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panel__content img{
                width: 100%;
                height: 370px;
            }
            .banner-innner {
                padding: 150px 0;
            }
            #home-img-animation{
                margin-top: -150px;
            }
        }
        @media only screen and (min-width: 600px) and (max-width: 699px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panel__content img{
                width: 100%;
                height: 330px;
            }
            .banner-innner {
                padding: 150px 0;
            }
            #home-img-animation{
                margin-top: -270px;
            }
        }
        @media only screen and (min-width: 500px) and (max-width: 599px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panel__content img{
                width: 100%;
                height: 330px;
            }
            .banner-innner {
                padding: 85px 0;
            }
            #home-img-animation{
                margin-top: -300px;
            }
        }
        @media only screen and (min-width: 400px) and (max-width: 499px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panel__content img{
                width: 100%;
                height: 300px;
            }
            .banner-innner {
                padding: 70px 0;
            }
            .banner-left h1 {
                font-size: 30px !important;
                line-height: unset !important;
            }
            .banner-left p {
                line-height: unset !important;
            }
            #home-img-animation{
                margin-top: -350px;
            }
            .banner-left{
                width: 100% !important;
            }
        }
        @media only screen and (min-width: 300px) and (max-width: 399px) {
            .banner video {
                width: 100%;
                position: absolute;
                overflow: hidden;
            }
            .panel__content img{
                width: 100%;
                height: 220px;
            }
            .banner-innner {
                padding: 50px 0;
            }
            .banner-left h1 {
                font-size: 20px !important;
                line-height: unset !important;
                margin-bottom: 0 !important;
            }
            .banner-left p {
                line-height: unset !important;
                margin-bottom: 10px !important;
            }
            #home-img-animation{
                margin-top: -450px;
            }
            .banner-left{
                width: 100% !important;
            }
        }

        /*.panels__container img{*/
        /*    width: 100%;*/
        /*    height: 450px;*/
        /*}*/

        .video-banner-btn{
            background: gray;
            padding: 10px;
            color: black;
            border-radius: 4px;
            font-size: larger;
            cursor: pointer;
        }
        .video-banner-btn:hover{
            background: #a1a0a0;
            color: black;
        }
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
