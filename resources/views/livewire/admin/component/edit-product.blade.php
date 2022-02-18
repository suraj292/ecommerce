<div class="col-12">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Details</h4>
                @if(session()->has('product_detail_updated'))
                <p class="alert-success p-2">{{ session('product_detail_updated') }}</p>
                @else
                <form class="forms-sample" wire:submit.prevent="editProductDetails">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Title" wire:model.lazy="editProductTitle">
                            @error('editProductTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Dimension</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Dimension" wire:model.lazy="editProductDimension">
                            @error('editProductDimension') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product description" wire:model.lazy="editProductDescription">
                            @error('editProductDescription') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Care Instruction</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Care Instruction" wire:model.lazy="editProductCareInstruction">
                            @error('editProductCareInstruction') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Specification</label>
                        <div class="col-sm-9">
                            @for($i=0; $i<count($this->editProductSpecification); $i++)
                                <div class="input-group" style="margin-bottom: 10px;">
                                    <input type="text" class="form-control" placeholder="add Specification" wire:model="editProductSpecification.{{$i}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-gradient-danger" type="button" wire:click="removeSpecList({{$i}})">X</button>
                                    </div>
                                </div>
                            @endfor
                            <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw" wire:click="addSpecList">+ Add Specification</button>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-lg" wire:model.lazy="editGender">
                                <option value="common">Common</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('editGender') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Price" wire:model.lazy="editProductPrice">
                            @error('editProductPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Offer Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Price" wire:model.lazy="editProductOfferPrice">
                            @error('editProductOfferPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-3">
                            <div class="form-check col-sm-9 mx-auto">
                                <input type="checkbox" class="form-check-input" wire:model.lazy="editProductReturn">
                                <label class="form-check-label"> Return </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check col-sm-9 mx-auto">
                                <input type="checkbox" class="form-check-input" wire:model.lazy="editProductSale">
                                <label class="form-check-label"> Sale </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check col-sm-9 mx-auto">
                                <input type="checkbox" class="form-check-input" wire:model.lazy="editProductDiscount">
                                <label class="form-check-label"> Discount </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check col-sm-9 mx-auto">
                                <input type="checkbox" class="form-check-input" wire:model.lazy="editProductItalian">
                                <label class="form-check-label"> Italian </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
{{--                    <button class="btn btn-light" @click="isOpen = !isOpen">Cancel</button>--}}
                </form>
                @endif
            </div>
        </div>
    </div>

    {{--    display avilable colors of product      --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(session()->has('img_updated'))
                <p class="alert-success p-2">{{ session('img_updated') }}</p>
                @endif
                <h4 class="card-title">Product Color & Stock</h4>
                <form class="forms-sample">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Color</th>
                            <th>Stock</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($oldImgStk as $color)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/color_image/'.$color->getColor->color_image) }}" >
                                </td>
                                <td> {{ $color->stock }} </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getProductColorId({{$color->id}})">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteColorImg({{ $color->id }})">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <button class="btn btn-gradient-success" wire:click.prevent="addColor">+ Add Color</button>
                </form>
            </div>
        </div>
    </div>

    @if(!is_null($addNewColor))
        <livewire:admin.component.product-color-img :productId="$addNewColor"/>
    @endif

    @if(!is_null($images))
        @include('partial.admin.edit_product_images')
    @endif

</div>
