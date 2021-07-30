{{-- Custom JS Files --}}
<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
@if(!isset($auth))
    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/moment/moment.js') }}"></script>
    <script src="{{ asset('lib/peity/jquery.peity.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    sidebarActive("{{ url()->current() }}");
</script>
@stack('plugin-js')
@stack('footer-js')
</body>
</html>
