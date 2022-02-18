<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Collection banner </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Collection banner</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                   <img src="{{asset('assets/images/test/collaction_banner.PNG')}}" width="100%">
                </div>
            </div>
        </div>
        <div class="row" x-data="{ isOpen: false }">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-sm-12 col-lg-3">
                                <h4 class="card-title">Collection banner</h4>
                            </div>
                            @if($banners->count() >= 3)
                                <div class="col-md-6 col-sm-12 col-lg-3">
                                    <button class="btn btn-block btn-gradient-light w-80" disabled>+ Add Slide</button>
                                </div>
                            @else
                                <div class="col-md-6 col-sm-12 col-lg-3">
                                    <button class="btn btn-block btn-gradient-success w-80" @click="isOpen = !isOpen">+ Add Slide</button>
                                </div>
                            @endif
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>bg Color</th>
                                <th>Item</th>
                                <th>Edit / Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td><img src="{{asset('storage/slider/'.$banner->image)}}" alt="img" style="width: 50px; height: 50px; border-radius: 5%;"></td>
                                    <td>
                                        <div style="background-color: {{$banner->bg_color}}; width: 40px; height: 40px; border-radius: 50%;"></div>
                                    </td>
                                    <td class="text-success text-uppercase"> {{$banner->item}} </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getBanner({{$banner->id}})">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="deleteBanner({{$banner->id}})">
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

            @if(!is_null($getBannerId))
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Collection banner</h4>
                            <form class="forms-sample" wire:submit.prevent="editBanner">
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" wire:model.debounce.500ms="editItem">
                                    @error('editItem') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Offer</label>
                                    <input type="text" class="form-control" placeholder="Enter Button name" wire:model.debounce.500ms="editOffer">
                                    @error('editOffer') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Background Color</label>
                                    <input type="color" class="colorPick" title="Choose your color" wire:model.debounce.500ms="editBgColor">
{{--                                    <input type="color" class="form-control colorPick" placeholder="Enter Sub-Title" wire:model.debounce.500ms="editBgColor">--}}
                                    @error('editBgColor') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choose Collection banner Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model.debounce.500ms="editImg">
                                    @error('editImg') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Banner Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Button Link" wire:model.debounce.500ms="editBannerLink">
                                    @error('editBannerLink') <p class="text-danger mt-2">{{ $message }}</p> @enderror
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
                        <h4 class="card-title">Add new Collection banner</h4>
                        <form class="forms-sample" wire:submit.prevent="newBanner">
                            <div class="form-group">
                                <label>Item</label>
                                <input type="text" class="form-control" placeholder="Enter Title" wire:model.debounce.500ms="newItem">
                                @error('newItem') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>Offer</label>
                                <input type="text" class="form-control" placeholder="Enter Button name" wire:model.debounce.500ms="newOffer">
                                @error('newOffer') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <style>
                                .colorPick{padding: 0; width: 60px; height: 50px; margin-left: 10px;}
                            </style>
                            <div class="form-group">
                                <label>Background Color</label>
                                <input type="color" class="colorPick" title="Choose your color" wire:model.debounce.500ms="newBgColor">
{{--                                <input type="color" class="form-control colorPick" wire:model.debounce.500ms="newBgColor">--}}
                                @error('newBgColor') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Collection banner Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model.debounce.500ms="newImg">
                                @error('newImg') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                @if(session()->has('img_required'))
                                    <p class="text-danger mt-2">{{session('img_required')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Banner Link</label>
                                <input type="text" class="form-control" placeholder="Enter Button Link" wire:model.debounce.500ms="newBannerLink">
                                @error('newBannerLink') <p class="text-danger mt-2">{{ $message }}</p> @enderror
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
@section('script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
