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

    <div class="row">
        <div class="col-12 mb-2">
            <img src="https://www.pngitem.com/pimgs/m/181-1813924_400-400-pixel-hd-png-download.png" id="zoomImage" width="300px">
        </div>
        <div class="col-12" id="gallery">
            @foreach($images as $index => $image)
                <a {{--wire:click="switchImage({{ $index }})"--}} id="image_0{{ $index }}">
                    <img src="{{ asset('storage/product/small/'.$image) }}" width="100px">
                </a>
            @endforeach
        </div>
    </div>


</div>
@section('style')
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('script')
{{--    <script src="{{ asset('assets/js/jquery.elevatezoom2.js') }}"></script>--}}
    <script src="{{ asset('assets/js/BUP.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        const zoomImage = $('#zoomImage');
        const contanerZoom = $('#undefinedBlowupLens');
        $(zoomImage).BUP(null, 0.5);
        {{--const images = @json($images);--}}
        // $('#gallery a').on('click', function () {
        //     alert($('#gallery a').attr("id"))
        // })
        const images = @json($images);
        $('#image_00').on('click', function () {
            zoomImage.attr("src","http://127.0.0.1:8000/storage/product/small/"+images[0]);
            zoomImage.BUP(null, 0.5);
        });
        $('#image_01').on('click', function () {
            zoomImage.attr("src","http://127.0.0.1:8000/storage/product/small/"+images[1]);
            zoomImage.BUP(null, 0.5);
        });
        $('#image_02').on('click', function () {
            zoomImage.attr("src","http://127.0.0.1:8000/storage/product/small/"+images[2]);
            zoomImage.BUP(null, 0.5);
        });
        $('#image_03').on('click', function () {
            zoomImage.attr("src","http://127.0.0.1:8000/storage/product/small/"+images[3]);
            zoomImage.BUP(null, 0.5);
        });
        $('#image_04').on('click', function () {
            zoomImage.attr("src","http://127.0.0.1:8000/storage/product/small/"+images[4]);
            zoomImage.BUP(null, 0.5);
        });
    </script>
@endsection
