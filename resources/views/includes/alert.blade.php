@if(Session::get('info'))
    <script>$(document).ready(function () {
            swal("Message", "{{ Session::get('info') }}", "info")
        });
    </script>
@endif

@if(Session::get('success'))
    <script>$(document).ready(function () {
            {{--swal("Message", "{{ Session::get('success') }}", "success");--}}
            swal({
                title: "Message",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "Close",
            });
        });
    </script>
@endif

@if(Session::get('error'))
    <script>$(document).ready(function () {
            swal("Error", "{{ Session::get('error') }}", "error")
        });
    </script>
@endif
