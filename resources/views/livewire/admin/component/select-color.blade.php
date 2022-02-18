<div class="main-panel">
    <div class="content-wrapper"  x-data="{ isOpen: false }">
        <div class="page-header">
            <h3 class="page-title"> Colors </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Colors</li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            @if(session()->has('added'))
                            <div class="col-12 alert-success mb-3">
                                <p class="m-2">{{session('added')}}</p>
                            </div>
                            @endif
                                @if(session()->has('updated'))
                                    <div class="col-12 alert-success mb-3">
                                        <p class="m-2">{{session('updated')}}</p>
                                    </div>
                                @endif
                            @if(session()->has('success_delete'))
                                <div class="col-12 alert-danger mb-3">
                                    <p class="m-2">{{session('success_delete')}}</p>
                                </div>
                            @endif
                            <div class="col-md-6 col-sm-12 col-lg-2">
                                <h4 class="card-title">Colors</h4>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary btn-fw w-75" @click="isOpen = !isOpen">+ Add new Color</button>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S no.</th>
                                <th>Color</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $index => $color)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td> {{ $color->color_name }} </td>
                                    <td>
                                        <img src="{{ asset('storage/color_image/'.$color->color_image) }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getColor({{$color->id}})">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </button>
                                    </td>
                                    <td>
                                        @if($gotPassword)
                                        <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteColor({{$color->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-inverse-danger btn-icon disabled" wire:click="showPasswordDiv" style="background-color: #acacac; cursor: not-allowed">
                                            <i class="mdi mdi-delete" style="color: #0b2e13;"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>

            @if(!is_null($colorId))
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-sm-12 col-lg-2">
                                <h4 class="card-title">Edit Color</h4>
                            </div>
                        </div>
                        <form class="forms-sample" wire:submit.prevent="updateColor">
                            <div class="form-group">
                                <label>Color Name</label>
                                <input type="text" class="form-control" placeholder="Enter Color" wire:model.lazy="editColor">
                                @error('editColor') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Color</label><br>
                                <input type="file" wire:model.lazy="newEditImage">
                                @error('editImage') <p class="text-danger mt-2">{{ $message }}</p> @enderror

{{--                                <img src="{{ asset('storage/color_image/'.$editImage) }}" width="80px">--}}
                                @if ($newEditImage)
                                    <img src="{{ $newEditImage->temporaryUrl() }}" alt="img" class="img-thumbnail" width="80px">
                                @else
                                    <img src="{{ asset('storage/color_image/'.$editImage) }}" alt="img" class="img-thumbnail" width="80px">
                                @endif

                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-12 grid-margin stretch-card" :hidden="!isOpen">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-sm-12 col-lg-2">
                                <h4 class="card-title">Add Color</h4>
                            </div>
                        </div>
                        <form class="forms-sample" wire:submit.prevent="addColor">
                            <div class="form-group">
                                <label>Color Name</label>
                                <input type="text" class="form-control" placeholder="Add new Color" wire:model.lazy="newColor">
                                @error('newColor') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Color Image</label><br>
                                <input type="file" wire:model.lazy="newColorImage">
                                @error('newColorImage') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                @if ($newColorImage)
                                    <img src="{{ $newColorImage->temporaryUrl() }}" alt="img" class="img-thumbnail" width="100px">
                                @else
                                    <img src="{{ asset('assets\images\test\empty.jpg') }}" alt="img" class="img-thumbnail" width="100px">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-light" @click="isOpen = !isOpen">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

            @if($passwordDiv)
            <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" style="display: block; background-color: #161616a6;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form class="forms-sample" wire:submit.prevent="adminPasswordConformation">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="hidePasswordDiv">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <p class="text-danger text-center">All Products associated with this color will be deleted.</p>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Admin Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Name" wire:model.lazy="reqAdminPassword">
                                        @error('reqAdminPassword')<span class="text-danger">{{ $message }}</span>@enderror
                                        @if(session()->has('wrong_password'))<span class="text-danger">{{ session('wrong_password') }}</span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" wire:click="hidePasswordDiv">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
