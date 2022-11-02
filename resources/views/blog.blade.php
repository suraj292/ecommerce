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
    <!-- Our Project Start -->
    <section class="portfolio-section grid-portfolio ratio2_3 portfolio-padding">
        <div class="container">
            <div>
                <div class="input-group rounded mx-auto mb-4" style="width: 50%;">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button class="input-group-text search" >
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="row zoom-gallery">

                <div class="isotopeSelector filter fashion col-sm-12 col-md-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="{{ route('blog.detail', ['id'=>rand(1,9)]) }}">
                                <div class="overlay-background" title="view details">
                                    <div class="blog">
                                        <div class="m-4 text-center">
                                            <h2 class="text-uppercase">
                                                hello suraj
                                            </h2>
                                            <p class="mt-4">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur esse libero necessitatibus neque nesciunt odio similique, soluta temporibus vel....
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <img src="{{ asset('assets/images/portfolio/grid/1.jpg') }}" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="isotopeSelector filter shoes col-sm-12 col-md-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a >
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/2.jpg"
                                     class="bg-img img-fluid blur-up lazyload">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Project End -->
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/magnific-popup.css') }}">
    <style>
        .blog{
            position: absolute; height: 100%; display: flex; align-items: center;
        }
        .blog > div > h2, .blog > div > p{
            color: white;
        }
        .search{
            color: #737373;
            background-color: #ffffff00;
            border: 1px solid #cfcfcf;
        }
        .search:hover{
            background-color: #737373;
            color: #cfcfcf;
        }
    </style>
@endsection
@section('script')

@endsection

