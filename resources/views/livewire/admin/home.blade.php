{{--<div>--}}
    @switch($comp)
        @case('slider')
        <livewire:admin.component.slides />
{{--            @include('partial.admin.slider')--}}
        @break
        @case('product')
        <h1>product..</h1>
        @break
        @default
        <h1>default</h1>
    @endswitch
@section('script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
{{--</div>--}}
