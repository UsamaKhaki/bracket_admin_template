@push('plugin-js')
    <script src="{{ asset('lib/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('lib/common-validation/common-validation.min.js') }}"></script>
    <script>
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than ' +  {{ 3 }} +'MB');

        $.validator.addMethod('imagesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than ' +  {{ 2 }} +'MB');
    </script>
@endpush
