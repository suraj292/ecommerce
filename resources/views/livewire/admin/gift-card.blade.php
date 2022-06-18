<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-cash-multiple"></i>
                </span> Gift Card </h3>
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
                    <div class="card-body" wire:ignore>
                        <div class="row mb-3">
                            <h4 class="card-title">Hoverable Table</h4>
                            <button type="button" class="btn btn-gradient-success btn-fw ml-auto" id="testClick">+ GIFT CARD</button>
                        </div>
                        <div class="form-group row rounded w-50 p-2" style="background-color: #efefef;">
                            <label for="gStatus" class="col-md-4 col-sm-12 col-form-label">Gift Card Status:</label>
                            <select id="gStatus" class="form-control col-sm-12 col-md-8 text-center">
                                <option value selected>All</option>
                                <option value="Used">Used</option>
                                <option value="Unused">Unused</option>
                                <option value="Expired">Expired</option>
                            </select>
                        </div>
                        <table class="table table-hover" id="sale-table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Amount</th>
                                <th>Validity</th>
                                <th style="display: none;">giftCardStatus</th>
                                <th style="display: none;">order</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($giftCards as $giftCard)
                                <tr>
                                    <td>{{ $giftCard->code }}</td>
                                    <td> {{ $giftCard->amount }} </td>
                                    <td> {{ $giftCard->expiry }} </td>
                                    <td style="display: none;">
                                        @if(now() <= $giftCard->expiry && $giftCard->user_id)
                                            Used
                                        @elseif(now() <= $giftCard->expiry && !$giftCard->user_id)
                                            Expired
                                        @else
                                            Unused
                                        @endif
                                    </td>
                                    <td style="display: none;"> {{ $giftCard->id }} </td>
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
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#sale-table').DataTable({
                order: [[4, 'desc']],
            });

            // SweetAlert2
            $('#testClick').on('click', function () {
                Swal.fire({
                    title: 'NEW GIFT CARD',
                    html: `<input type="number" id="amount" class="swal2-input" placeholder="Enter Amount">
                            <input type="date" id="exDate" class="swal2-input" placeholder="Expiry Date">`,
                    confirmButtonText: ' ADD ',
                    focusConfirm: false,
                    preConfirm: () => {
                        const amount = Swal.getPopup().querySelector('#amount').value
                        const exDate = Swal.getPopup().querySelector('#exDate').value
                        if (!amount || !exDate) {
                            Swal.showValidationMessage(`Please fill all Fields.`)
                        }
                        return { Amount: amount, ExDate: exDate }
                    }
                }).then((result) => {
                    // Swal.fire(`
                    // Amount: ${result.value.Amount}
                    // Code: ${result.value.Code}
                    // Date: ${result.value.ExDate}
                    // `.trim())
                    // console.log(result);
                    if (result.isConfirmed===true){
                        window.livewire.emit('generateGiftCard', {
                            data : result.value,
                        });
                    }
                })
            });
            /*
            Custom filter
            1. val = get value of th or dropdown
            2. grab column number-1
             */
            $('#gStatus').on('change', function () {
                var val = $('#gStatus').val();
                table.column(3)
                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                    .draw()
            });
        });
        window.addEventListener('swal:giftCardGenerated', event => {
            Swal.fire(event.detail);
            location.reload();
        });
    </script>
@endsection
