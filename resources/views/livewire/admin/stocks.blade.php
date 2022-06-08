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
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Sub-Category</th>
                                <th>Stock</th>
                                <th>Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Jacob</td>
                                <td>Photoshop</td>
                                <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                                <td><label class="badge badge-danger">Pending</label></td>
                            </tr>
                            <tr>
                                <td>Dave</td>
                                <td>53275535</td>
                                <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                <td><label class="badge badge-warning">In progress</label></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-5">
                        <h4>Alert with input type</h4>
                        <button class="btn btn-primary" id="subscribe">Subscribe</button>
                    </div>
                    <script>
                        $('#subscribe').on('click', function () {
                            Swal.fire({
                                title: 'Stock Control',
                                html: `<p>Product: <br>
                                            sub-category: <br>
                                            Color: <br>
                                            <input type="text" id="stock" class="swal2-input" placeholder="Enter new stock">
                                       </p>`,
                                confirmButtonText: 'Update',
                                focusConfirm: false,
                                preConfirm: () => {
                                    const stock = Swal.getPopup().querySelector('#stock').value
                                    if (!stock) {
                                        Swal.showValidationMessage(`Please enter stock`)
                                    }
                                    return { stock: stock }
                                }
                            }).then((result) => {
                                Swal.fire(`
                                Stock: ${result.value.stock}
                              `.trim())
                            })

                        })
                    </script>

                </div>
            </div>
        </div>

    </div>
</div>
@section('script')
@endsection
@section('style')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
