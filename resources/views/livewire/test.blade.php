<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>image</th>
            <th>title</th>
            <th>price</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td> title </td>
                <td class="text-success text-uppercase"> image </td>
                <td> price </td>
            </tr>
        </tbody>
    </table>
    <hr>

    <div class="row ml-5">
        <p>{{ $test }}</p>
        <button wire:click="click">click to refresh</button>
    </div>


</div>
@section('style')
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function () {
            const data = @json($test);

            const shipped = $.map(data, function (dStatus) {
                if (Number(dStatus.delivery_status) >= 2) return dStatus;
            });
            console.log(shipped);

            window.addEventListener('page_reload', event => {
                window.location.reload();
            })

            // data.newOrder = $.map(data, function (newOrder) {
            //     if (newOrder.user_delivery_id == 1){
            //         return newOrder;
            //     }
            // });
            //
            // for (let i in data.newOrder){
            //     data.newOrder[i];
            // }
            //
            // var json ={"DEPARTMENT": [
            //         {
            //             "id":"1",
            //             "deptemp":"840",
            //             "shares":"1100",
            //
            //         },
            //         {
            //             "id":"2",
            //             "deptemp":"1010",
            //             "shares":"1900",
            //         }, {
            //             "id":"3",
            //             "deptemp":"350",
            //             "shares":"510",
            //         },
            //         {
            //             "id":"4",
            //             "deptemp":"575",
            //             "shares":"1900",
            //         },
            //         {
            //             "id":"5",
            //             "deptemp":"475",
            //             "shares":"1200",
            //         }]};

            // json.DEPARTMENT = $.map(json.DEPARTMENT,function(val,key) {
            //     if(Number(val.deptemp) <= 500 ) return val;
            // });
            //
            // for(var i in json.DEPARTMENT){
            //     let x = json.DEPARTMENT[i];
            //      // x += x;
            //     console.log(x);
            //     // return x;
            // }
            // const y =+ x;
            // console.log(x);
        });
    </script>
@endsection
