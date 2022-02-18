<div class="main-panel" x-data="{ isOpen: false }">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Slider </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-3 col-sm-4 col-lg-2">
                                <h4 class="card-title">Slider</h4>
                            </div>
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <button class="btn btn-block btn-gradient-success w-80" @click="isOpen = !isOpen">+ Add Slide</button>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Button</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $slide)
                            <tr>
                                <td><img src="{{asset('storage/slider/'.$slide->image)}}" alt="img" style="width: 50px; height: 50px; border-radius: 5%;"></td>
                                <td>{{$slide->h4}}</td>
                                <td class="text-success text-uppercase"> {{$slide->button_name}} </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getSlide({{$slide->id}})">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteSlide({{$slide->id}})">
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

            @if(!is_null($editSlide))
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Slide</h4>
                            <form class="forms-sample" wire:submit.prevent="editSlide">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{$editSlide->h4}}" wire:model.debounce.1000ms="editTitle">
                                    @error('editTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Sub-Title</label>
                                    <input type="text" class="form-control" placeholder="{{$editSlide->h1}}" wire:model.debounce.1000ms="editSubTitle">
                                    @error('editSubTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choose Slider Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model.debounce.1000ms="editImg">
                                    @error('editImg') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control" placeholder="{{$editSlide->button_link}}" wire:model.debounce.1000ms="editButtonLink">
                                    @error('editButtonLink') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Button name</label>
                                    <input type="text" class="form-control" placeholder="{{$editSlide->button_name}}" wire:model.debounce.1000ms="editButtonName">
                                    @error('editButtonName') <p class="text-danger mt-2">{{ $message }}</p> @enderror
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
                        <h4 class="card-title">Add new Slide</h4>
                        <form class="forms-sample" wire:submit.prevent="newSlide">
{{--                            @if ($newImg)--}}
{{--                                Photo Preview:--}}
{{--                                <img src="{{ $newImg->temporaryUrl() }}">--}}
{{--                            @endif--}}
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" wire:model.debounce.1000ms="newTitle">
                                @error('newTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Sub-Title</label>
                                <input type="text" class="form-control" placeholder="Enter Sub-Title" wire:model.debounce.1000ms="newSubTitle">
                                @error('newSubTitle') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Slider Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model.debounce.1000ms="newImg">
                                @error('newImg') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text" class="form-control" placeholder="Enter Button Link" wire:model.debounce.1000ms="newButtonLink">
                                @error('newButtonLink') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Button name</label>
                                <input type="text" class="form-control" placeholder="Enter Button name" wire:model.debounce.1000ms="newButtonName">
                                @error('newButtonName') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
