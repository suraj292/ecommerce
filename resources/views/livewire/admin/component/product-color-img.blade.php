<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Color & Images:</h4>

            @if(session()->has('color_img'))
            <p class="alert-success p-2">{{session('color_img')}}</p>
            <button type="submit" class="btn btn-gradient-primary w-100 mb-2" wire:click="add_more_color">+ Add more Color</button>
            @else

            <form class="forms-sample" wire:submit.prevent="productColorImg">
                <!-- select color -->
                <div class="form-group" wire:ignore>
                    <select class="selectpicker" wire:model.lazy="colorId">
                        <option selected> Select below </option>
                        @foreach($colors as $color)
                        <option
                            data-content=" <img src='{{ asset('storage/color_image/'.$color->color_image ) }}' width='20px'> &nbsp;&nbsp;&nbsp;{{$color->color_name}} "
                            value="{{ $color->id }}"
                        ></option>
                        @endforeach
                    </select>

                    @error('productColors') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                </div>
                <script>
                    $('.selectpicker').selectpicker();
                </script>

                <style>
                    .btn-stock:hover{background: #efefef;}
                </style>
                <div class="input-group my-2">
                    <label class="mr-2">Stock :</label>
                    <button class="btn btn-stock" type="button" style="border: 1px #0000003b solid; width: 50px;" wire:click="stockDec"><i class="mdi mdi-minus"></i></button>
                    <input type="text" class="text-center" maxlength="3" value="{{ $stockQuantity }}" style="border: 1px #0000003b solid; width: 100px;">
                    <button class="btn btn-stock" type="button" style="border: 1px #0000003b solid; width: 50px;" wire:click="stockInc"><i class="mdi mdi-plus"></i></button>
                </div>

                <!-- end select color -->
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image1">Image : 1</label>
                            <input type="file" class="form-control-file" id="image1" wire:model.debounce.500ms="newImg1">
                            @error('newImg1') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        @if ($newImg1)
                            <img src="{{ $newImg1->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                        @else
                        <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                </div>
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image2">Image : 2</label>
                            <input type="file" class="form-control-file" id="image2" wire:model.debounce.500ms="newImg2">
                             @error('newImg2') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        @if ($newImg2)
                            <img src="{{ $newImg2->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                        @else
                            <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                </div>
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image3">Image : 3</label>
                            <input type="file" class="form-control-file" id="image3" wire:model.debounce.500ms="newImg3">
                             @error('newImg3') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        @if ($newImg3)
                            <img src="{{ $newImg3->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                        @else
                            <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                </div>
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image4">Image : 4</label>
                            <input type="file" class="form-control-file" id="image4" wire:model.debounce.500ms="newImg4">
                             @error('newImg4') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        @if ($newImg4)
                            <img src="{{ $newImg4->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                        @else
                            <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                </div>
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image5">Image : 5</label>
                            <input type="file" class="form-control-file" id="image5" wire:model.debounce.500ms="newImg5">
                             @error('newImg5') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        @if ($newImg5)
                            <img src="{{ $newImg5->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                        @else
                            <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
            </form>
            @endif
        </div>
    </div>
</div>

