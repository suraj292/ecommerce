<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-tag-multiple"></i>
                </span> Coupons </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('coupon_saved'))
                            <p class="alert-success rounded p-2">{{ session('coupon_saved') }}</p>
                        @endif
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Coupon</th>
                                <th>Discount</th>
                                <th>Expiry</th>
                                <th>Active/Deactivate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $index => $coupon)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="@if($coupon->active) text-success @else text-danger @endif text-uppercase">{{ $coupon->code }}</td>
                                    <td> {{ $coupon->value }} % </td>
                                    <td> {{ $coupon->expire_at->format('d M Y') }} </td>
                                    <td>
                                        @if($coupon->active)
                                            <i class="mdi mdi-toggle-switch"
                                               style="font-size: xx-large; color: #157715;" title="Active"
                                                wire:click="couponActive({{ $coupon->id }})"
                                            >
                                            </i>
                                        @else
                                            <i class="mdi mdi-toggle-switch-off"
                                               style="font-size: xx-large; color: #fc476b;" title="Deactivate"
                                               wire:click="couponActive({{ $coupon->id }})"
                                            >
                                            </i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Coupons</h4>
                        <form class="forms-sample" wire:submit.prevent="couponGenerate">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Coupon Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-uppercase"
                                           style="border: 1px solid #c4c4c4"
                                           placeholder="enter new Coupon" wire:model.defer="newCoupon.code">
                                    @error('newCoupon.code')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Coupon Value [%]</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputEmail2" placeholder="enter 1-100 %" wire:model.defer="newCoupon.value">
                                    @error('newCoupon.value')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Maximum Discount Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           style="border: 1px solid #c4c4c4"
                                           id="exampleInputMobile" placeholder="&#8377; xxx" wire:model.defer="newCoupon.maxAmount">
                                    @error('newCoupon.maxAmount')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
