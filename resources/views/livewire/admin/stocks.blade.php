<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-cart-plus"></i>
                </span> Stocks </h3>
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
                        <form class="input-group mb-3" wire:submit.prevent="stockListUpdate">
                            <select class="custom-select mt-1" id="inputGroupSelect01" wire:model.lazy="stockList">
                                <option selected value="null">All Stock</option>
                                <option value="5">Less than 5 Stock Qty</option>
                                <option value="10">More than 5 Stock Qty</option>
                            </select>
                            <button class="btn btn-primary ml-2">submit</button>
                        </form>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
{{--                                <th>Sub-Category</th>--}}
                                <th>Stock</th>
                                <th>Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stocks as $stock)
                            <tr wire:click="editStock({{ $stock->id }})">
                                <td>
                                    <img src="{{ asset('storage/product/small/'.explode(',', $stock->images)[0]) }}" alt="image">
                                    {{ $stock->productDetails->title }}
                                </td>
                                <td class="text-danger">{{ $stock->stock }}</td>
                                <td><img src="{{ asset('storage/color_image/'.$stock->getColor->color_image) }}" alt="image"></td>
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
@section('script')
    <script>
        // window.addEventListener('swal:modal', event => {
        //     Swal.fire(event.detail);
        // });
        window.addEventListener('swal:updateSuccessMessage', event => {
            Swal.fire(event.detail);
        });
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail.title,
                input: event.detail.input,
                inputValue: event.detail.inputValue,
                confirmButtonText: event.detail.confirmButtonText,
            }).then((result)=>{
                // console.log(result);
                if (result.isConfirmed===true){
                    window.livewire.emit('stockUpdate', {
                        updatedStock : result.value,
                    });
                }
            });
        });
    </script>
@endsection
@section('style')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
