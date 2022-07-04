<div style="background-color: #E0E0E0D6">

    <div class="m-5 p-3 rounded" style="background-color: white;">
        <img src="https://houseofbhavana.in/assets/images/favicon/5.png" width="12px">
        <!-- url -->
        <span
        style="line-height: 1.54; margin-bottom: 3px; font-size: 14px;"
        >https://houseofbhavana.in > login</span>
        <!-- Title -->
        <p
        style="font-size: 18px; margin-top: 3px; color: #3228d0;"
        >House Of Bhavana</p>
        <!-- Description -->
        <p
        style="font-size: 14px; margin-top: -12px;"
        >
            <!-- Date -->
            <span>31-Jan-2020 --</span>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            At beatae debitis delectus porro quidem reprehenderit.</p>
        <!-- rating & review -->
        <div>
            <div>
                <i class="mdi mdi-star" style="color: #ffd500;"></i>
                <i class="mdi mdi-star" style="color: #ffd500;"></i>
                <i class="mdi mdi-star" style="color: #ffd500;"></i>
                <i class="mdi mdi-star" style="color: #ffd500;"></i>
                <i class="mdi mdi-star-outline" style="color: #afafaf;"></i>
                <span style="color: #939393; font-size: 16px;">Rating: 8.2/10</span>
            </div>
        </div>
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
            {{--const data = @json($test);--}}

            {{--const shipped = $.map(data, function (dStatus) {--}}
            {{--    if (Number(dStatus.delivery_status) >= 2) return dStatus;--}}
            {{--});--}}
            {{--console.log(shipped);--}}

            {{--window.addEventListener('page_reload', event => {--}}
            {{--    window.location.reload();--}}
            {{--})--}}

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
