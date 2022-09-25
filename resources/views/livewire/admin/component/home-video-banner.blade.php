<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-cash-multiple"></i>
                </span> Home Page
            </h3>

            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 grid-margin stretch-card row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="card-title">HEADING</h4>
                           <div class="media">
                               <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                               <div class="media-body">
                                   <p class="card-text">{{ $data->heading }}</p>
                               </div>
                           </div>
                           <form wire:submit.prevent="heading">
                               <div class="form-group">
                                   <div class="input-group col-xs-12">
                                       <input type="text" class="form-control file-upload-info" placeholder="Enter Heading" wire:model.defer="heading">
                                       <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                    </span>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">PARAGRAPH</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text">{{ $data->para }}</p>
                                </div>
                            </div>
                            <form wire:submit.prevent="paragraph">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Paragraph" wire:model.defer="para">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                    </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">BUTTON NAME</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text">{{ $data->button_name }}</p>
                                </div>
                            </div>
                            <form wire:submit.prevent="buttonName">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Button Name" wire:model.defer="buttonName">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                    </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">BUTTON NAVIGATION</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text">{{ $data->button_link }}</p>
                                </div>
                            </div>
                            <form wire:submit.prevent="buttonNavigation">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Button Navigation" wire:model.defer="buttonNavigation">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                    </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">VIDEO</h4>
                            <div class="media">
                                <video autoplay muted loop class="tagline-video m-2 w-50">
                                    <source src="https://drive.google.com/uc?export=download&id={{ $data->video }}" type='video/mp4'>
                                </video>
                            </div>
                            <form wire:submit.prevent="video">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Url" wire:model.defer="video">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                    </span>
                                    </div>
                                </div>
                            </form>
                            <p>
                                eg: https://drive.google.com/file/d/
                                <span style="background-color: #1B8505FF; color: whitesmoke;">1k1ZeTmaQDtQK_wVPWT69kfwzZQXYS7ny</span>
                                /view?usp=sharing
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 grid-margin stretch-card row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Left Image</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                                <div class="media-body">
                                    <img src="https://drive.google.com/uc?export=view&id={{ $banner[0]->image_link }}" width="250px">
                                    <br>
                                    <p>Redirect: <a href="{{ $banner[0]->redirect_link }}">{{ $banner[0]->redirect_link }}</a></p>
                                </div>
                            </div>
                            <form wire:submit.prevent="left_image_link">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter image" wire:model.lazy="leftImageLink">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                        </span>
                                    </div>
                                    @error('leftImageLink')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>
                            </form>
                            <form wire:submit.prevent="left_image_redirect_link">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Image redirect Link" wire:model.defer="leftImageRedirectLink">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                        </span>
                                    </div>
                                    @error('leftImageRedirectLink')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Right Image</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                                <div class="media-body">
                                    <img src="https://drive.google.com/uc?export=view&id={{ $banner[1]->image_link }}" width="250px">
                                    <br>
                                    <p>Redirect: <a href="{{ $banner[1]->redirect_link }}">{{ $banner[1]->redirect_link }}</a></p>
                                </div>
                            </div>
                            <form wire:submit.prevent="right_image_link">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter image" wire:model.defer="rightImageLink">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                        </span>
                                    </div>
                                    @error('rightImageLink')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>
                            </form>
                            <form wire:submit.prevent="right_image_redirect_link">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" placeholder="Enter Image redirect Link" wire:model.defer="rightImageRedirectLink">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="submit">Update</button>
                                        </span>
                                    </div>
                                    @error('rightImageRedirectLink')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@section('style')

@endsection
@section('script')
    <style>
        form{
            margin-top: 10px;
        }
    </style>
@endsection
