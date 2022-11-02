@extends('layouts.app')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>LEATHER & AESTHETICS</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">LEATHER & AESTHETICS</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- Our Project Start -->
    <!-- section start -->
    <section class="filter-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title1 ">
                        <h2 class="title-inner1">portfolio</h2>
                    </div>
                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#" data-filter="*">All </a></li>
                            <li><a href="#" data-filter=".fashion">Fashion</a></li>
                            <li><a href="#" data-filter=".bags">Bags</a></li>
                            <li><a href="#" data-filter=".shoes">Shoes</a></li>
                            <li><a href="#" data-filter=".watch">Watch</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-section portfolio-padding pt-0 port-col zoom-gallery">
        <div class="container">
            <div class="isotopeContainer row">
                <div class="col-lg-4 col-sm-6 isotopeSelector shoes">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/1.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/1.jpg" class="img-fluid blur-up lazyload">
                                <div style="position: absolute;" class="social-container">
                                    <div class="like" title="Like">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span style="font-size: 16px;">50</span>
                                    </div>
{{--                                    <div class="comment" title="Comment">--}}
{{--                                        <i class="fa fa-comment"></i>--}}
{{--                                        <span style="font-size: 16px;">5</span>--}}
{{--                                    </div>--}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/2.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/2.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector shoes">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/3.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/3.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/4.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/4.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector watch">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/14.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/14.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector watch">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/6.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/6.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/7.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/7.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector bags">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/8.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/8.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/9.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/9.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/10.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/10.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/11.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/11.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector bags">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/17.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/17.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/13.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/13.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/5.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/5.jpg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 isotopeSelector fashion">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/16.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/16.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/magnific-popup.css') }}">
    <style>
        .social-container{
            top: 10px;
            right: 15px;
            color: whitesmoke;
            font-size: 20px;
            z-index: 1;
        }
        .like > i:hover{
            color: #ff7c7c;
        }
        .comment > i:hover{
            color: #6f9cff;
        }
    </style>
@endsection
@section('script')
<!-- portfolio js -->
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/zoom-gallery.js') }}"></script>
@endsection

