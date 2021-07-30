@push('plugin-css')
    <link href="{{asset('plugins\select2-4.0.6-rc.1\dist\css\select2.min.css')}}" rel="stylesheet" media="screen">
@endpush
@push('plugin-js')
    <script src="{{asset('lib/select2-4.0.6-rc.1/dist/js/select2.full.min.js')}}"></script>
    @if(isset($cSelect2))
        <script src="{{asset('lib/ajaxSelect2/ajax-select2.min.js')}}"></script>
    @endif
@endpush
