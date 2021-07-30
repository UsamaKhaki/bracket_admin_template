@extends('layouts.app', ['auth' => true])
@section('content')
    <div class="ht-100v d-flex align-items-center justify-content-center">
        <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
            <svg class="success-check-animated-mark bg-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
            <h5 class="tx-xs-24 tx-normal tx-info mt-4 mg-b-30 lh-5">Congratulations, your account has been successfully created.</h5>
            <div class="d-flex justify-content-center">
                <div class="wd-150">
                    <a href="{{ route('page-login') }}" class="btn btn-block btn-success btn-oblong">
                        Login here
                    </a>
                </div>
            </div><!-- d-flex -->
        </div>
    </div>
@stop
