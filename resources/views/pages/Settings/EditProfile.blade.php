@extends('layouts.app', ['sidebar' => 'collapse'])
@section('content')
    @include('pages.Settings.includes.sidebar')
    <div class="br-contentpanel">
        <div class="br-profile-page">
            <div class="tab-content br-profile-body">
                <div class="tab-pane fade active in show" id="personal-details">
                    <form action="{{ route('page-setting-edit-profile', ['tag' => 'update_personal_info']) }}"
                          id="update-info-form">
                        <div class="form-layout form-layout-5 bg-white">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-30">Update Personal Info</h6>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label justify-content-start mb-2">Profile Image: <span class="tx-danger">*</span></label>
                                        <input type="file" class="dropify" name="profile_image">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row form-group">
                                        <label class="col-sm-3 form-control-label">Firstname: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="first_name"
                                                   placeholder="Enter First Name" value="{{ Auth::user()->first_name }}">
                                        </div>
                                    </div><!-- row -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 form-control-label">Lastname: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{ Auth::user()->last_name }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 form-control-label">Phone Number: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                            <input type="tel" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 form-control-label">About Me: <span
                                                class="tx-danger">*</span></label>
                                        <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <textarea rows="3" class="form-control" name="about_me"
                                          placeholder="Type here...">{{ Auth::user()->about_me }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer mg-t-30">
                                <button type="submit" class="btn btn-info">Submit Form</button>
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
    @include('plugins.dropify')
    @include('plugins.loadingOverlay')
    <script>

        $('.dropify').dropify();

        var _validator = $("#update-info-form").commonValidator({
            redirectTo: "{{ route('page-setting-edit-profile') }}",
            errorType: "tooltip",
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                about_me: {
                    required: true,
                },
            }
        });
    </script>
@endpush
