<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.header')

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')

            <!-- Jquery Core Js -->
            <script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>
        
            <!-- data table -->
            <script src="{{asset('admins/js/pages/tables/jquery-datatable.js')}}"></script>

            <!-- Bootstrap Core Js -->
            <script src="{{asset('admins/plugins/bootstrap/js/bootstrap.js')}}"></script>

            <!-- Select Plugin Js -->
            <script src="{{asset('admins/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

            <!-- Slimscroll Plugin Js -->
            <script src="{{asset('admins/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

            <!-- Waves Effect Plugin Js -->
            <script src="{{asset('admins/plugins/node-waves/waves.js')}}"></script>

            <!-- Jquery CountTo Plugin Js -->
            <script src="{{asset('admins/plugins/jquery-countto/jquery.countTo.js')}}"></script>

            <!-- Morris Plugin Js -->
            <script src="{{asset('admins/plugins/raphael/raphael.min.js')}}"></script>
            <script src="{{asset('admins/plugins/morrisjs/morris.js')}}"></script>

            <!-- ChartJs -->
            <script src="{{asset('admins/plugins/chartjs/Chart.bundle.js')}}"></script>

            <!-- Flot Charts Plugin Js -->
            <script src="{{asset('admins/plugins/flot-charts/jquery.flot.js')}}"></script>
            <script src="{{asset('admins/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
            <script src="{{asset('admins/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
            <script src="{{asset('admins/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
            <script src="{{asset('admins/plugins/flot-charts/jquery.flot.time.js')}}"></script>

            <!-- Sparkline Chart Plugin Js -->
            <script src="{{asset('admins/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

            
            <!-- Jquery DataTable Plugin Js -->
            <script src="{{asset('admins/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
            <script src="{{asset('admins/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
            
            <!-- Custom Js -->
            <script src="{{asset('admins/js/admin.js')}}"></script>
            <script src="{{asset('admins/js/pages/index.js')}}"></script>
            <script src="{{asset('admins/js/pages/tables/jquery-datatable.js')}}"></script>
            
            <!-- Demo Js -->
            <script src="{{asset('admins/js/demo.js')}}"></script>
        </main>
    </div>
</body>
</html>
