@extends('layouts.app', ['auth' => true])
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <form action="{{ route('page-login-post') }}" id="myForm" autocomplete="off">
            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> practice <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Enter your username">
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
                <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('page-signup') }}" class="tx-info">Sign Up</a></div>
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
                if(response.status === "Success"){
                    window.location.href = '{{ route('page-dashboard') }}'
                }
            },
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
            }
        });
    </script>
@endpush
