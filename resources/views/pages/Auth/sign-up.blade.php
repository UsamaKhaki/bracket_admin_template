@extends('layouts.app', ['auth' => true])
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <form action="{{ url()->current() }}" id="myForm" autocomplete="off">
            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> practice <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon wd-40 justify-content-center"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon wd-40 justify-content-center"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon wd-40 justify-content-center"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                </div>
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>

                <div class="mg-t-40 tx-center">Already member? <a href="{{ route('page-login') }}" class="tx-info">Login</a> here</div>
            </div>
        </form>
    </div>
@stop
@push('footer-js')
    @include('plugins.validation', ['tooltip' => true])
    @include('plugins.js-confirm')
    @include('plugins.loadingOverlay')
    <script>
        var _validator = $("#myForm").commonValidator({
            errorType: "tooltip",
            onSuccess: function (response) {
                if(response.status === 'Success'){
                    window.location.href = '{{ route('page-signup-success') }}';
                }
            },
            rules: {
                username: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            }
        });
    </script>
@endpush

