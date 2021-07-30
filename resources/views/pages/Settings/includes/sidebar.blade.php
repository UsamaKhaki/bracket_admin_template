<div class="br-subleft">
    <h6 class="tx-uppercase tx-10 tx-mont tx-spacing-1 mg-t-10 pd-x-10 tx-white-7">Navigations</h6>
    <nav class="nav br-nav-mailbox flex-column">
        <a href="" class="nav-link"><i class="icon ion-person-stalker tx-16-force"></i> Basic Settings</a>
        <a href="{{ route('page-setting-edit-profile') }}" class="nav-link"><i class="icon ion-person-stalker tx-16-force"></i> Edit Profile</a>
        <a href="{{ route('page-setting-edit-login-details') }}" class="nav-link"><i class="fa fa-lock tx-16-force"></i> Edit Login Credentials</a>
    </nav>
</div>

@push('footer-js')

    <script>
        settingSidebarActive("{{ url()->current() }}")
    </script>

@endpush
