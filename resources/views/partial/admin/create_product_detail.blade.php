<div class="col-md-12 grid-margin stretch-card" :hidden="!isOpen">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Details</h4>
            <form class="forms-sample" wire:submit.prevent="saveProductDetails">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Product Title" wire:model.lazy="productTitle">
                        @error('productTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dimension</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Product Dimension" wire:model.lazy="productDimension">
                        @error('productDimension') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Product description" wire:model.lazy="productDescription">
                        @error('productDescription') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Care Instruction</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Care Instruction" wire:model.lazy="productCareInstruction">
                        @error('productCareInstruction') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Specification</label>
                    <div class="col-sm-9">
                        @foreach($specList as $key => $specification)
                            <div class="input-group" style="margin-bottom: 10px;">
                                <input type="text" class="form-control" placeholder="add Specification" wire:model="productSpecification.{{$key}}">
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
                        <select class="form-control" wire:model.lazy="gender">
                            <option value="common">Common</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Price</label>
{{--                    <div class="col-sm-9">--}}
{{--                        <input type="text" class="form-control" placeholder="Product Price" wire:model.lazy="productPrice">--}}
{{--                        @error('productPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror--}}
{{--                    </div>--}}
                    <div class="col-sm-9 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white" style="height: 46px;">&#8377;</span>
                        </div>
                        <input type="text" class="form-control"  placeholder="Product Price" wire:model.lazy="productPrice">
                        @error('productPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Offer Price</label>
{{--                    <div class="col-sm-9">--}}
{{--                        <input type="text" class="form-control" placeholder="Product Price" wire:model.lazy="productOfferPrice">--}}
{{--                        @error('productOfferPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror--}}
{{--                    </div>--}}
                    <div class="col-sm-9 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white" style="height: 46px;">&#8377;</span>
                        </div>
                        <input type="text" class="form-control"  placeholder="Product Price" wire:model.lazy="productOfferPrice">
                        @error('productOfferPrice') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-3">
                        <div class="form-check col-sm-9 mx-auto">
                            <input type="checkbox" class="form-check-input" wire:model.lazy="productReturn">
                            <label class="form-check-label"> Return </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check col-sm-9 mx-auto">
                            <input type="checkbox" class="form-check-input" wire:model.lazy="productSale">
                            <label class="form-check-label"> Sale </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check col-sm-9 mx-auto">
                            <input type="checkbox" class="form-check-input" wire:model.lazy="productDiscount">
                            <label class="form-check-label"> Discount </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check col-sm-9 mx-auto">
                            <input type="checkbox" class="form-check-input" wire:model.lazy="productItalian">
                            <label class="form-check-label"> Italian </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                <button class="btn btn-light" @click="isOpen = !isOpen">Cancel</button>
            </form>
        </div>
    </div>
</div>
