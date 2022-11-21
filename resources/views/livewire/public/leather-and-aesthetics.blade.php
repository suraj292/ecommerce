<div>
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
                            @foreach($categories as $category)
                                <li><a href="#" data-filter=".{{ $category }}">{{ $category }}</a></li>
                            @endforeach
{{--                            <li><a href="#" data-filter=".video" id="video-btn">video</a></li>--}}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-section portfolio-padding pt-0 port-col zoom-gallery">
        <div class="container">
            <div class="isotopeContainer row">
                @foreach($images as $image)
                    @if($image->category === 'video')
                    <div class="col-lg-4 col-sm-6 col-md-4 isotopeSelector video">
                        <iframe src="https://www.youtube.com/embed/74P0VGyLGd8" title="YouTube video player"
                                allowfullscreen></iframe>
                        <div class="opacity" data-bs-toggle="modal" data-bs-target="#myModal"
                             data-src="https://www.youtube.com/embed/74P0VGyLGd8"></div>
                    </div>

                    @else
                    <div class="col-lg-4 col-sm-6 isotopeSelector {{ $image->category }}">
                        <div class="overlay">
                            <div class="border-portfolio">
                                <a href="{{ asset('storage/leatherAesthetics/'.$image->file) }}">
                                    <div class="overlay-background">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                    <img src="{{ asset('storage/leatherAesthetics/'.$image->file) }}"
                                         class="img-fluid blur-up lazyload">

                                </a>
                            </div>
                        </div>
                        <div style="" class="social-container"  wire:click="like({{ $image->id }})">
                            <div class="like" title="Like">
                                <i class="fa fa-thumbs-up"></i>
                                <span style="font-size: 16px;">{{ $image->likes }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

{{--                <div class="col-lg-4 col-sm-6 col-md-4 isotopeSelector video">--}}
{{--                    <iframe src="https://www.youtube.com/embed/74P0VGyLGd8" title="YouTube video player"--}}
{{--                            allowfullscreen></iframe>--}}
{{--                    <div class="opacity" data-bs-toggle="modal" data-bs-target="#myModal"--}}
{{--                         data-src="https://www.youtube.com/embed/74P0VGyLGd8"></div>--}}
{{--                </div>--}}

                <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="" id="video"
                                            allow="autoplay; fullscreen; scriptaccess" ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--                         aria-hidden="true">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}


{{--                                <div class="modal-body">--}}

{{--                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                    <!-- 16:9 aspect ratio -->--}}
{{--                                    <div class="embed-responsive embed-responsive-16by9">--}}
{{--                                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"--}}
{{--                                                allow="autoplay"></iframe>--}}
{{--                                    </div>--}}


{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

            </div>
        </div>
    </section>

</div>
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css">
    <style>
        .social-container {
            top: 10px;
            right: 25px;
            color: whitesmoke;
            font-size: 20px;
            z-index: 1;
            position: absolute;
            cursor: pointer;
        }

        .like > i:hover {
            color: #ff7c7c;
        }

        .comment > i:hover {
            color: #6f9cff;
        }

        .video > iframe {
            width: 100%;
            height: 250px;
        }

        /*#video{*/
        /*    width: 100%;*/
        /*    height: unset;*/
        /*}*/
        .opacity {
            background-color: transparent;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
            /*z-index: 3;*/
        }
    </style>

@endsection
@section('script')
    <!-- portfolio js -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/zoom-gallery.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Gets the video src from the data-src on each button
            var videoSrc;
            $('.opacity').click(function () {
                videoSrc = $(this).data("src");
            });
            // console.log(videoSrc);
            var model = $('#myModal');
            // when the modal is opened autoplay it
            model.on('shown.bs.modal', function (e) {
                // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
            })
            // stop playing the youtube video when I close the modal
            model.on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#video").attr('src', videoSrc);
            })

            $.ajax({url: "https://api.ipify.org/?format=json", success: function(result){
                    // alert(result['ip']);
                    // window.livewire.emit('ip', result['ip']);
                    @this.set('ip', result['ip'])
            }});
        });
    </script>
@endsection
