<!-- JAVASCRIPT -->
<script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
{{--<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>--}}

<!-- apexcharts -->
<script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{ asset('assets') }}/js/pages/dashboard.init.js"></script>

<!-- Magnific Popup-->
<script src="{{ asset('assets') }}/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="{{ asset('assets') }}/js/pages/lightbox.init.js"></script>

<!-- Summernote js -->
<script src="{{ asset('assets') }}/libs/summernote/summernote-bs4.min.js"></script>

<!-- Multiple Select js -->
<script src="{{ asset('assets') }}/libs/select2/js/select2.min.js"></script>
<!-- form advanced init -->
<script src="{{ asset('assets') }}/js/pages/form-advanced.init.js"></script>

<!-- init js -->
<script src="{{ asset('assets') }}/js/pages/form-editor.init.js"></script>

<!-- App js -->
<script src="{{ asset('assets') }}/js/app.js"></script>
<script>
    $("#bootstrap-style").attr("href", "{{ asset('assets/css/bootstrap.min.css') }}");
    $("#app-style").attr("href", "{{ asset('assets/css/app.min.css') }}");
</script>
<script src="{{ asset('assets') }}/js/custom/script.js"></script>
@include('includes.custom-script-in-master')
@yield('custom-script')
