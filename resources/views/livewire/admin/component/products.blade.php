<div class="main-panel">
    <div class="content-wrapper"  x-data="{ isOpen: false }">
        <div class="page-header">
            <h3 class="page-title"> Category </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Product</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product_category')}}">Category</a></li>
                    <li class="breadcrumb-item"><a href="{{route('sub_category')}}">Sub Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ul>
            </nav>
        </div>
        <style>
            .current-active{background-color: #ededed;}
        </style>
        <div class="row">
            {{--    CATEGORY    --}}
            <div class="col-md-6 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                        <h4 class="card-title">Category</h4>
                        <table class="table table-hover" id="active-a">
                            <thead>
                            <tr>
                                <th>S no.</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $index => $category)
                                <tr wire:click="selectedCategory({{ $category->id }})">
                                    <td>{{ $index + 1 }}</td>
                                    <td  class="text-uppercase">{{ $category->product_category }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{--    SUB-CATEGORY    --}}
            <div class="col-md-6 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                        <h4 class="card-title">Sub Category</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S no</th>
                                <th>Sub Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($subCategories)
                                @foreach($subCategories as $index => $subCategory)
                                    <tr wire:click="selectedSubCategory({{ $subCategory->id }})">
                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-uppercase">{{ $subCategory->sub_category }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if(!$subCategories)
                        <h2 class="text-center p-4" style="color: #646464;">EMPTY!</h2>
                        @endif
                    </div>
                </div>
            </div>
            {{--    product table   --}}
            <div class="col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                        <div class="row justify-content-between">
                            <h4 class="card-title">Products</h4>
                            @if($products)
                                <button type="button" class="btn btn-inverse-primary btn-fw" wire:click="addProduct">
                                    <i class="mdi mdi-plus"></i> Add Product
                                </button>
                            @endif
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> Product </th>
                                <th> Price </th>
                                <th> Edit  </th>
                                <th> Delete  </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products)
                            @foreach($products as $product)
                            <tr>
                                <td class="py-1">
                                    @if($product->product_color_img)
                                        <img src="{{ url('storage/product/small/'.explode(',', $product->product_color_img->images)[0]) }}" alt="thumbnail">
                                        {{ $product->details->title }}
                                    @else
                                        <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="thumbnail">
                                        {{ $product->details->title }}
                                    @endif
                                </td>
                                <td> &#8377; {{ $product->details->offer_price != '' ? $product->details->offer_price:$product->details->price }} </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon" title="Edit" wire:click="editProduct({{ $product->id }})">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" wire:click="deleteProduct({{ $product->id }})">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if(is_null($products) || $products->isEmpty())
                            <h2 class="text-center p-4" style="color: #646464;">EMPTY!</h2>
                        @endif
                    </div>
                </div>
            </div>
            {{--    add product     --}}
            @if($addProductDiv)
                <div class="col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product</h4>
                        @if(session()->has('product_detail'))
                            <p class="alert alert-success">{{ session('product_detail') }}</p>
                        @else
                        <form class="forms-sample" wire:submit.prevent="saveNewProduct" id="addProduct">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Product Title" wire:model.lazy="addProduct.title">
                                    @error('addProduct.title') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dimension</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Product Dimension" wire:model.lazy="addProduct.dimension">
                                    @error('addProduct.dimension') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Product description" wire:model.lazy="addProduct.description">
                                    @error('addProduct.description') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Care Instruction</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Care Instruction" wire:model.lazy="addProduct.care_instruction">
                                    @error('addProduct.care_instruction') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Specification</label>
                                <div class="col-sm-9">
                                    @foreach($addProduct['specification'] as $key => $specification)
                                        <div class="input-group" style="margin-bottom: 10px;">
                                            <input type="text" class="form-control" placeholder="add Specification" wire:model="addProduct.specification.{{$key}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-gradient-danger" type="button" wire:click="removeSpecList({{$key}})">X</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw" wire:click="addSpecList">+ Add Specification</button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control" wire:model.lazy="addProduct.gender">
                                        <option value="common">Common</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('addProduct.gender') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white" style="height: 46px;">&#8377;</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Product Offer Price" wire:model.lazy="addProduct.price">
                                    @error('addProduct.price') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Offer Price</label>
                                <div class="col-sm-9 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white" style="height: 46px;">&#8377;</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Product Offer Price" wire:model.lazy="addProduct.offer_price">
                                    @error('addProduct.offer_price') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-check col-sm-9 mx-auto">
                                        <input type="checkbox" class="form-check-input" wire:model.lazy="addProduct.return">
                                        <label class="form-check-label"> Return </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-check col-sm-9 mx-auto">
                                        <input type="checkbox" class="form-check-input" wire:model.lazy="addProduct.sale">
                                        <label class="form-check-label"> Sale </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-check col-sm-9 mx-auto">
                                        <input type="checkbox" class="form-check-input" wire:model.lazy="addProduct.discount">
                                        <label class="form-check-label"> Discount </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-check col-sm-9 mx-auto">
                                        <input type="checkbox" class="form-check-input" wire:model.lazy="addProduct.italian">
                                        <label class="form-check-label"> Italian </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

                @if(!is_null($productId))
                    <livewire:admin.component.product-color-img  :productId="$productId"/>
                @endif
            @endif
            {{--    edit product    --}}
            @if($editProductId)
                <livewire:admin.component.edit-product :wire:key="$editProductId" :editProductId="$editProductId" />
            @endif

        </div>

    </div>
</div>
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function (){
            {{--let productId = {{ $productId }};--}}
            {{--if (productId) {--}}
            {{--    $("#addProduct input, #addProduct select").attr('disabled', true);--}}
            {{--    $("#addProduct").removeAttr('wire:submit.prevent')--}}
            {{--}--}}
        });
    </script>
@endsection
