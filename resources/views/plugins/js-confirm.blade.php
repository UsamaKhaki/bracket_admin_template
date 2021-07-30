@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('lib/jQuery-confirm-master/jquery-confirm.min.css?v=1.1') }}">
@endpush

@push('plugin-js')
    <script src="{{ asset('lib/jQuery-confirm-master/jquery-confirm.min.js?v=1.1') }}"></script>
    <script>

        jconfirm.defaults = {
            theme: "light",
            type: 'green',
            animation: 'scale',
            closeAnimation: 'scale',
            animateFromElement: false,
        }

        function showErrorPopup (setting){

            opt = $.extend({
                title: 'Error!!',
                content: 'Content Message Not Set',
            }, setting);

            $.confirm({
                type: 'red',
                title: opt.title,
                content: opt.content,
                buttons: {
                    confirm: {
                        text: "OK",
                        btnClass: "btn-red",
                        action: function () {

                        }
                    }
                }
            })

        }

        function showSuccessPopup (setting){

            opt = $.extend({
                title: 'Success!!',
                content: 'Content Message Not Set',
                onOkClick: function() {

                },
            }, setting);

            $.confirm({
                type: 'red',
                title: opt.title,
                content: opt.content,
                buttons: {
                    confirm: {
                        text: "OK",
                        btnClass: "btn-green",
                        action: function () {
                            opt.onOkClick()
                        }
                    }
                }
            })

        }

    </script>
@endpush
