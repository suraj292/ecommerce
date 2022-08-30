<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Orders </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Logistics Rate</li>
                </ul>
            </nav>
        </div>
        <div class="row">
            {{--    CATEGORY    --}}
            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="overflow-y: auto;">
                        <h4 class="card-title">Logistics Rate</h4>
                        <form wire:submit.prevent="checkLogisticsRate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="201005" wire:model.defer="fromPin">
                                            @error('fromPin')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="201005" wire:model.defer="toPin">
                                            @error('toPin')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shipment Length</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="length in cm" wire:model.defer="length">
                                            @error('length')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shipment width</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="width in cm" wire:model.defer="width">
                                            @error('width')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shipment height</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="height in cm" wire:model.defer="height">
                                            @error('height')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shipment weight</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="weight in kg" wire:model.defer="weight">
                                            @error('weight')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Payment Mode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="prepaid/cod" wire:model.defer="paymentMode">
                                            @error('paymentMode')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">MRP &#8377;</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="&#8377; xxxx" wire:model.defer="mrp">
                                            @error('mrp')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary btn-rounded btn-fw">Check</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="overflow-y: auto;">
                        <h4 class="card-title">Logistics Rate</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
