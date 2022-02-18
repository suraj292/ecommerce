<div class="main-panel">
    <div class="content-wrapper"  x-data="{ isOpen: false }">
        <div class="page-header">
            <h3 class="page-title"> Category </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Product</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product_category')}}">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-Category</li>
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
                            @if(session()->has('success_edit'))
                                <div class="col-12 alert-success mb-3">
                                    <p class="m-2">{{session('success_edit')}}</p>
                                </div>
                            @endif
                            @if(session()->has('success_delete'))
                                <div class="col-12 alert-success mb-3">
                                    <p class="m-2">{{session('success_delete')}}</p>
                                </div>
                            @endif
                            <div class="col-md-6 col-sm-12 col-lg-2">
                                <h4 class="card-title">Sub-Category</h4>
                            </div>
                        </div>

                        <div class="m-3 justify-content-center">
                            <label> Product Category : </label>
                            <select class="custom-select w-75 ml-3" wire:model.lazy="selectedCategory">
                                <option selected>Select product Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->product_category}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if(!is_null($selectedCategory)){{--    show sub category list on select product category   --}}
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary btn-fw w-75" @click="isOpen = !isOpen">+ Add Product Sub-Category</button>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S no.</th>
                                <th>Sub-Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategories as $index => $subCategory)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td class="text-success text-uppercase"> {{ $subCategory->sub_category }} </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-icon" wire:click="getSubCategory({{$subCategory->id}})">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-danger btn-icon" wire:click="delete({{$subCategory->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @endif

                    </div>
                </div>
            </div>

            @if(!is_null($selectedSubCategory))
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">edit Sub Category</h4>
                            <form class="forms-sample" wire:submit.prevent="edit">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="edit Sub Category" wire:model.lazy="editSubCategory">
                                    @error('editSubCategory') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                                </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                <button class="btn btn-light" @click="isOpen = !isOpen">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-12 grid-margin stretch-card" :hidden="!isOpen">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Sub Category</h4>
                        <form class="forms-sample" wire:submit.prevent="save">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="New Sub Category" wire:model.lazy="newSubCategory">
                                @error('newSubCategory') <p class="text-danger mt-2">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light" @click="isOpen = !isOpen">Cancel</button>
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
