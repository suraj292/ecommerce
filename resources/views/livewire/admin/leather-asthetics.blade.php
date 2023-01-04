<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-image-multiple"></i>
                </span> Leather & Aesthetics </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-gradient-primary w-100" wire:click="addCollection">+ Add New Post
                        </button>
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
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Likes</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($images as $index => $img)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td class="text-uppercase">
                                                        {{--mdi mdi-video--}}
                                                        @if($img->category == 'video')
                                                            <i class="mdi mdi-video" style="font-size: 40px; color: rebeccapurple;"></i>
                                                        @else
                                                        <img src="{{ asset('storage/leatherAesthetics/'.$img->file) }}" style="width: 40px; height: unset; border-radius: unset;">
                                                        @endif
                                                    </td>
                                                    <td>{{ $img->category }}</td>
                                                    <td> {{ $img->likes }} </td>
                                                    <td>
                                                        <button type="button" class="btn btn-inverse-danger btn-icon"
                                                                wire:click="deleteCollection()">
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
                    </div>
                </div>
            </div>
        </div>

        @if($newImageDiv)
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('image_saved'))
                            <p class="alert-success p-2">{{ session('image_saved') }}</p>
                        @endif
                            <h4 class="text-uppercase">Add new Post</h4>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <form wire:submit.prevent="newImage" wire:ignore>
                                            <div class="form-group">
                                                <label for="file-type">File Type</label>
                                                <select class="form-control" id="file-type">
                                                    <option>Image</option>
                                                    <option>Video</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="image" style="display: block;">
                                                <label for="exampleFormControlSelect2">Image</label>
                                                <input type="file" class="form-control" wire:model.defer="image">
                                                @error($image)<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group" id="video" style="display: none;">
                                                <label for="exampleFormControlSelect2">Youtube Link</label>
                                                <input type="text" class="form-control" wire:model.defer="image">
                                                @error($image)<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Category</label>
                                                <input type="text" class="form-control" wire:model.defer="category" id="category">
                                                @error($category)<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            @if (is_file($image))
                                                <img src="{{ $image->temporaryUrl() }}" width="400px">
                                            @endif

                                            <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4 w-25">Add Image</button>
                                        </form>

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
@section('script')
    <script>
        $(document).ready(function () {
            let image = $('#image');
            let video = $('#video');
            $('#file-type').on('change', function() {
                const fileType = $('#file-type').find(":selected").val();
                if (fileType === 'Image'){
                    video.hide();
                    image.show();
                    $("#category").text('')
                }
                if (fileType === 'Video'){
                    image.hide();
                    video.show();
                    // $("#category").text('video')
                }
            })
        });
    </script>
@endsection
