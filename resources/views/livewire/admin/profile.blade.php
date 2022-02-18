<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account-convert"></i>
                </span> Profile </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin Profile</h4>
                    @if(session()->has('updated'))
                        <p class="alert-success p-2">{{ session('updated') }}</p>
                    @else
                    <form class="forms-sample" wire:submit.prevent="updateProfile" id="profile">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" wire:model.lazy="name">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="4" placeholder="Address" wire:model.lazy="address"></textarea>
                                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="GSTIN" wire:model.lazy="gstin">
                                @error('gstin')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="987xxxxxxx" wire:model.lazy="mobile">
                                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="role@houseofbhavana.in" wire:model.lazy="email">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <a class="btn btn-gradient-primary mr-2" id="edit">Click here to edit</a>
                        <button type="submit" class="btn btn-gradient-primary mr-2" style="display: none;" id="update">Update</button>
{{--                        <button class="btn btn-light">Cancel</button>--}}
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-uppercase">Admin Credentials</h4>
                    @if(session()->has('admin_updated'))
                        <p class="alert alert-success">hello</p>
                    @else
                    <form class="forms-sample" wire:submit.prevent="updateAdminPassword" id="adminPassword">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" wire:model.lazy="username" @if(!$nowCanChange) disabled @endif>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Password" wire:model.lazy="password" @if(!$nowCanChange) disabled @endif>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
{{--                        <a class="btn btn-gradient-primary mr-2" id="edit">Click here to edit</a>--}}
                        @if($nowCanChange)
                        <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                        @else
                        <a class="btn btn-gradient-primary mr-2" wire:click="askAdminPassword">Update Credentials</a>
                        @endif
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($showPassDiv)
        <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" style="display: block; background-color: #161616a6;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form class="forms-sample" wire:submit.prevent="adminPasswordConformation">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="hideAdminPassword">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Admin Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Name" wire:model.lazy="reqAdminPassword">
                                    @error('reqAdminPassword')<span class="text-danger">{{ $message }}</span>@enderror
                                    @if(session()->has('wrong_password'))<span class="text-danger">{{ session('wrong_password') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" wire:click="hideAdminPassword">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
@section('script')
    <script>
        $(document).ready(function (){
            $("#profile input, #profile textarea").attr('disabled', true);
            $("#edit").on('click', function (){
                $("#edit").hide();
                $("#update").show();
                $("#profile input, #profile textarea").removeAttr("disabled");
            });
        });
    </script>
@endsection
