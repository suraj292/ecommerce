<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-animation"></i>
                </span> Coupons </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-gradient-primary w-100" wire:click="addCollection">+ Add New Collection</button>
                        @if(session()->has('added'))
                        <p class="alert-success p-2 mt-2">{{ session('added') }}</p>
                        @endif
                        @if(session()->has('deleted'))
                            <p class="alert-danger p-2 mt-2">{{ session('deleted') }}</p>
                        @endif
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Collection</th>
                                                <th>Total Product</th>
                                                <th>Edit / Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($collections as $index => $collection)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-uppercase">{{ $collection->name }}</td>
                                                <td> {{ count($collection->collectionLink) }} </td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getCollection({{ $collection->id }})">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteCollection({{ $collection->id }})">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($addCollection == true)
                        <div class="row" style="margin-top: -60px;">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="saveCollection">
                                            <h4 class="text-uppercase">Add New Collection</h4>
                                            <div class="form-group">
                                                <label>Collection Name</label>
                                                <input type="text" class="form-control" placeholder="Enter new Collection" wire:model.debounce.1000ms="newCollection">
                                                @error('newCollection')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                                            </div>
                                            <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4 w-25">Save Collection</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        @if(!empty($getCollection))
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('product_removed'))
                            <p class="alert-success p-2">{{ session('product_removed') }}</p>
                        @endif
                        @if(session()->has('product_added'))
                            <p class="alert-success p-2">{{ session('product_added') }}</p>
                        @endif
                        <button class="btn btn-gradient-primary w-100 " wire:click="addProduct">+ Add Product to {{ $getCollection->name }}</button>

                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        @if($addProduct != true)
                                        <h4 class="text-uppercase" style="color: #1973cf;">{{ $getCollection->name }}</h4>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($getCollection->collectionLink as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->products->title }}</td>
                                                <td>
                                                    @if($product->products->offer_price)
                                                        {{ $product->products->offer_price }}
                                                    @else
                                                        {{ $product->products->price }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteProduct({{ $product->id }})">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <h4 class="text-uppercase" style="color: #1973cf;">Select Product to add in {{ $getCollection->name }}</h4>
                                        <form wire:submit.prevent="saveToCollection">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Category Product</label>
                                                <select class="form-control" wire:model="selectedCategory">
                                                    <option selected>Select Category of Product</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->product_category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Sub-Category Product</label>
                                                <select class="form-control" id="exampleFormControlSelect2" wire:model="selectedSubCategory">
                                                    <option selected>Select Sub-Category of Product</option>
                                                    @if(!is_null($selectedCategory))
                                                        @foreach($subCategory as $sub_category)
                                                            <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Product</label>
                                                <select class="form-control" id="exampleFormControlSelect2" wire:model="selectedProduct">
                                                    <option selected>Select Product</option>
                                                    @if(!is_null($selectedSubCategory))
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->details->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4 w-25">Add to Collection</button>
                                        </form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
