@push('plugin-css')

@endpush
@push('plugin-js')
    <script src="{{asset("plugins\DataTables\DataTables-1.10.16\js\dataTables.rowGroup.min.js")}}"></script>
    <script src="{{asset("plugins\DataTables\Buttons-1.4.2\js\buttons.print.js")}}"></script>
    <script src="{{asset("plugins\DataTables\Buttons-1.4.2\js\buttons.colVis.min.js")}}"></script>
    <script src="{{asset("plugins\DataTables\Buttons-1.4.2\js\buttons.html5.js")}}"></script>
    <script src="{{asset("plugins\DataTables\pdfmake-0.1.32\pdfmake.min.js")}}"></script>
    <script src="{{asset("plugins\DataTables\pdfmake-0.1.32/vfs_fonts.js")}}"></script>
    <script src="{{asset("plugins\DataTables\JSZip-2.5.0\jszip.min.js")}}"></script>
@endpush
