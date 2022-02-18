<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" wire:submit.prevent="productNewImg">

                <div>
                    <label>Color :</label>
                    <img class="rounded ml-2" src="{{ asset('storage/color_image/'.$selectedColor ) }}" width="50px">
                </div>

                <style>
                    .btn-stock:hover{background: #efefef;}
                </style>
                <div class="input-group my-2">
                    <label class="mr-2">Stock :</label>
                    <button class="btn btn-stock" type="button" style="border: 1px #0000003b solid; width: 50px;" wire:click="stockDec"><i class="mdi mdi-minus"></i></button>
                    <input type="text" class="text-center" maxlength="3" value="{{ $editStock }}" style="border: 1px #0000003b solid; width: 100px;">
                    <button class="btn btn-stock" type="button" style="border: 1px #0000003b solid; width: 50px;" wire:click="stockInc"><i class="mdi mdi-plus"></i></button>
                </div>

                @foreach($images as $key=>$image)
                <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                    <div class="col-4 d-flex align-items-center">
                        <div class="form-group container">
                            <label for="image1">Image :</label>
                            <input type="file" class="form-control-file" id="image1" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{url('storage/product/small/'.$image)}}" alt="img" class="img-thumbnail" width="100px">
                    </div>
                    <div class="col-4 d-flex align-items-center"  wire:click="deleteImg({{ $key }})">
                        <button type="button" class="btn btn-inverse-danger btn-icon" >
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </div>
                </div>
                @endforeach

                @if($imgDiv == true)
                    <div class="row mb-2 pb-2" style="border-bottom: #a0a0a04a 1px solid;">
                        <div class="col-6 d-flex align-items-center">
                            <div class="form-group container">
                                <label for="newImage">Image :</label>
                                <input type="file" class="form-control-file" id="newImage" wire:model="newImage">
                                @error('newImage') <p class="text-danger mt-3">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                            @else
                                <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                            @endif
                        </div>
                    </div>
                @endif
                @if(count($images) < 5 && $imgDiv == false)
                    <button class="btn btn-gradient-success" wire:click.prevent="addImgDiv">+ Add Image</button>
                @endif

                <button type="submit" class="btn btn-gradient-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
