<div class="main-panel" x-data="{ isOpen: false }">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Category </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ul>
            </nav>
        </div>
        <div class="row">
            {{--   view category   --}}
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            @if(session()->has('success'))
                                <div class="col-12 alert-success mb-3">
                                    <p class="m-2">{{session('success')}}</p>
                                </div>
                            @endif
                            @if(session()->has('success_delete'))
                                <div class="col-12 alert-success mb-3">
                                    <p class="m-2">{{session('success_delete')}}</p>
                                </div>
                            @endif
                            @if(session()->has('category_updated'))
                                <div class="col-12 alert-success mb-3">
                                    <p class="m-2">{{session('category_updated')}}</p>
                                </div>
                            @endif
                            <div class="col-md-3 col-sm-4 col-lg-2">
                                <h4 class="card-title">Category</h4>
                            </div>
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <button class="btn btn-block btn-gradient-success w-80" @click="isOpen = !isOpen">+ Add Category</button>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S no.</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $index => $category)
                            <tr>
                                <td> {{$index + 1}} </td>
                                <td class="text-success text-uppercase"> {{$category->product_category}} </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getCategory({{$category->id}})">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="delete({{$category->id}})">
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

            {{--   edit category   --}}
            @if(!is_null($getCategory))
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update new Slide</h4>
                            <form class="forms-sample" wire:submit.prevent="update">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" placeholder="Edit Category" wire:model.lazy="editCategory">
                                    @error('editCategory') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label>HSN Code</label>
                                    <input type="text" class="form-control" placeholder="Edit HSN Code" wire:model.lazy="editHsn">
                                    @error('editHsn') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            {{--   add category   --}}
            <div class="col-12 grid-margin stretch-card" :hidden="!isOpen">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Slide</h4>
                        <form class="forms-sample" wire:submit.prevent="submit">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" placeholder="New Category" wire:model.lazy="newCategory">
                                @error('newCategory') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label>HSN Code</label>
                                <input type="text" class="form-control" placeholder="new HSN Code" wire:model.lazy="newHsn">
                                @error('newHsn') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->         {{--   required admin password to confirm delete   --}}
            @if(!is_null($categoryId))
    <div class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px; background-color: #00000080;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span wire:click="cancelDelete">&times;</span>
                    </button>
                </div>

                <form wire:submit.prevent="confirmDelete">
                    <div class="modal-body">
                        <p class=" text-danger"><span class="h5">Warning: </span> All Sub-Category & Products associated with this category will be Deleted.</p>
                        <div class="form-group">
                            <label>Admin Password</label>
                            <input type="password" class="form-control" placeholder="Password" wire:model.lazy="adminPassword">
                            @error('adminPassword') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            @if(session()->has('wrong_pass'))
                            <p class="text-danger mt-2">{{session('wrong_pass')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
            @endif
</div>
