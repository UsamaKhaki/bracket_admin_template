@push('plugin-js')

    <script src="{{ asset('lib/dropdown-datetime-picker/jsRapDateTimePicker.js') }}"></script>
    <script>
        function showDropdownDetail($this, y, m, d, h, i, s, type) {
            if(type == "" || type == 'D3' || type == undefined){
                if(d && y && m){
                    m = moment(m, 'MMMM').format('M')
                    if(m < 10)m = '0' + m;
                    if(d < 10)d = '0' + d;
                    dateCreated = d + '/' + m + '/' + y;
                    $($this).attr('data-date', dateCreated);
                    $($this).closest('.dropdownDatePicker-wrapper').find('input[type="hidden"]').val(dateCreated)
                }
            }
        }
    </script>
@endpush
