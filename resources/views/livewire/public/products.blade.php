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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ul>
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
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Top banner wrapper -->
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="{{asset('assets/images/mega-menu/2.jpg')}}" class="img-fluid blur-up lazyload" alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4>BIGGEST DEALS ON TOP BRANDS</h4>
                                            <p>The trick to choosing the best wear for yourself is to keep in mind your
                                                body type, individual style, occasion and also the time of day or
                                                weather.
                                                In addition to eye-catching products from top brands, we also offer an
                                                easy 30-day return and exchange policy, free and fast shipping across
                                                all pin codes, cash or card on delivery option, deals and discounts,
                                                among other perks. So, sign up now and shop for westarn wear to your
                                                heart’s content on Multikart. </p>
                                        </div>
                                    </div>
                                    <!-- End Top banner wrapper -->

                                    <!-- Start Content -->
                                    <div class="collection-product-wrapper">
                                        <!-- Product Filters -->
                                        <div class="container">
                                            <div class="row">
                                                <!-- <div class="col-12"> -->
                                                <div class="col-sm-12 col-md-10 mb-2">
                                                    @if($sub_categories->count() > 0)
                                                    <ul class="list-group list-group-horizontal-md text-center">
                                                        @foreach($sub_categories as $subCategory)
                                                        <li class="list-group-item mlm" wire:click="filterBySubCategory({{ $subCategory->id }})">
                                                            {{ $subCategory->sub_category }}
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <select class="list-group btn btn-light mx-auto py-2 px-3 border" wire:model="selectFilter">
                                                        <option value="relevant">Relevant</option>
                                                        <option value="ASC">Price: High to Low</option>
                                                        <option value="DESC">Price: Low to High</option>
                                                    </select>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <!-- Products -->
                                        <div class="product-wrapper-grid">
                                            <livewire:public.component.paginate-products :gender="$gender" :productCategoryId="$productCategoryId" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
