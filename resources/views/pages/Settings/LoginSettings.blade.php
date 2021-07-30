@extends('layouts.app', ['sidebar' => 'collapse'])
@section('content')
    @include('pages.Settings.includes.sidebar')
    <div class="br-contentpanel">
        <div class="br-profile-page">
            <div class="tab-content br-profile-body">
                <div class="tab-pane fade active in show" id="login-details">
                    <form action="{{ route('page-setting-edit-login-details') }}"
                          id="update-login-details">
                        <div class="form-layout form-layout-5 bg-white">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-30">Update Login Details</h6>
                            <div class="row form-group">
                                <label class="col-sm-3 form-control-label">Username: <span class="tx-danger">*</span></label>
                                <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" placeholder="Enter First Name">
                                </div>
                            </div><!-- row -->
                            <div class="row form-group">
                                <label class="col-sm-3 form-control-label">Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control" name="password" placeholder="Enter Password here">
                                </div>
                            </div><!-- row -->
                            <div class="row form-group mb-0">
                                <label class="col-sm-3 form-control-label"></label>
                                <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                    <button type="submit" class="btn btn-info">Submit Form</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- br-mainpanel -->
    </div>
@stop
@push('footer-js')
    @include('plugins.validation')
    @include('plugins.js-confirm')
    @include('plugins.loadingOverlay')
    <script>

        var _updateLoginDetailsValidator = $("#update-login-details").commonValidator({
            redirectTo: "{{ route('page-setting-edit-login-details') }}",
            errorType: "tooltip",
            selectorVariable: '_updateLoginDetailsValidator',
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
