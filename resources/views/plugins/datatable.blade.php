@push('plugin-css')
    <link href="{{asset('admin_css/plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("js/DataTables/datatables.min.css")}}">
    <link rel="stylesheet" href="{{asset("js/DataTables/Responsive-2.2.0/css//responsive.bootstrap.min.css")}}">
@endpush
@push('plugin-js')
    <script src="{{asset("js/DataTables/datatables.min.js")}}"></script>
    <script src="{{asset("js/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("plugins\DataTables\Buttons-1.4.2\js\buttons.print.js")}}"></script>
    {{--<script src="{{asset("js/DataTables/Responsive-2.2.0/js/dataTables.responsive.min.js")}}"></script>--}}
    {{--<script src="{{asset("js/DataTables/Responsive-2.2.0/js/responsive.bootstrap.min.js")}}"></script>--}}
    <script src="{{asset("js/DataTables/Buttons-1.4.2/js/buttons.colVis.min.js")}}"></script>
    <script src="{{asset("js/DataTables/pdfmake-0.1.32/pdfmake.min.js")}}"></script>
    <script src="{{asset("js/DataTables/pdfmake-0.1.32/vfs_fonts.js")}}"></script>
    <script src="{{asset("js/DataTables/JSZip-2.5.0/jszip.min.js")}}"></script>
    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            dom: 'lBfrtip',
        });
    </script>
@endpush
