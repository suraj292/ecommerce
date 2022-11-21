@extends('layouts.app')
@section('content')
    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>blog details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">blog deatils</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end-->


    <!--section start-->
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 blog-detail"><img src="../assets/images/about/about%20us.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                    <h3 class="text-uppercase">{{ $post->title }}</h3>
                    <ul class="post-social">
                        <li>{{ $post->created_at->format('d M Y') }}</li>
                        <li>Posted By : Admin</li>
                        <li><i class="fa fa-heart"></i> 5 Hits</li>
{{--                        <li><i class="fa fa-comments"></i> 10 Comment</li>--}}
                    </ul>


                </div>
            </div>
            <div class="row section-b-space blog-advance">
                {!! $post->post !!}
            </div>
            <div class="row section-b-space">
                <div class="col-sm-12">
                    <ul class="comment-section">
                        <li>
                            <div class="media"><img src="../assets/images/avtar.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6>Mark Jecno <span>( 12 Jannuary 2018 at 1:30AM )</span></h6>
                                    <p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis
                                        fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer
                                        faucibus enim nec ullamcorper tempor. Aenean nec felis dui. Integer tristique
                                        odio mi, in volutpat metus posuere eu. Aenean suscipit ipsum nunc, id volutpat
                                        lorem hendrerit ac. Sed id elit quam. In ac mauris arcu. Praesent eget lectus
                                        sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec facilisis
                                        erat tempor quis. Vestibulum eu vestibulum ex.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media"><img src="../assets/images/2.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6>Mark Jecno <span>( 12 Jannuary 2018 at 1:30AM )</span></h6>
                                    <p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis
                                        fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer
                                        faucibus enim nec ullamcorper tempor. Aenean nec felis dui. Integer tristique
                                        odio mi, in volutpat metus posuere eu. Aenean suscipit ipsum nunc, id volutpat
                                        lorem hendrerit ac. Sed id elit quam. In ac mauris arcu. Praesent eget lectus
                                        sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec facilisis
                                        erat tempor quis. Vestibulum eu vestibulum ex.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media"><img src="../assets/images/20.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6>Mark Jecno <span>( 12 Jannuary 2018 at 1:30AM )</span></h6>
                                    <p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis
                                        fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer
                                        faucibus enim nec ullamcorper tempor. Aenean nec felis dui. Integer tristique
                                        odio mi, in volutpat metus posuere eu. Aenean suscipit ipsum nunc, id volutpat
                                        lorem hendrerit ac. Sed id elit quam. In ac mauris arcu. Praesent eget lectus
                                        sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec facilisis
                                        erat tempor quis. Vestibulum eu vestibulum ex.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row blog-contact">
                <div class="col-sm-12">
                    <h2>Leave Your Comment</h2>
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                       required="">
                            </div>
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="exampleFormControlTextarea1">Comment</label>
                                <textarea class="form-control" placeholder="Write Your Comment"
                                          id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
@section('style')

@endsection
@section('script')

@endsection

