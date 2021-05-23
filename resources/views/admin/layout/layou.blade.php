<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bordash - Admin Dashboard Template</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon.png')}}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">
    <!-- datatable -->
    <link rel="stylesheet" href="{{asset('vendors/dataTable/dataTables.min.css')}}" type="text/css">
    
 <!-- Prism -->
 <link rel="stylesheet" href="{{asset('vendors/prism/prism.css')}}" type="text/css">

    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('vendors/vmap/jqvmap.min.css')}}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}" type="text/css">
</head>
<body>


 
{{View::make('admin/layout/header') }} 
{{View::make('admin/layout/side_bar') }} 

@yield('content')
@yield('script')
@yield('edit')
@yield('delete')




<!-- Plugin scripts -->
<script src="{{asset('vendors/bundle.js')}}"></script>

<!-- Chartjs -->
<script src="{{asset('vendors/charts/chartjs/chart.min.js')}}"></script>

<!-- Apex chart -->
<script src="{{asset('vendors/charts/apex/apexcharts.min.js')}}"></script>

<!-- Circle progress -->
<script src="{{asset('vendors/circle-progress/circle-progress.min.js')}}"></script>

<!-- Peity -->
<script src="{{asset('vendors/charts/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/js/examples/charts/peity.js')}}"></script>
<!-- DataTable -->
<script src="{{asset('vendors/dataTable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/dataTable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/examples/datatable.js')}}"></script>

<!-- Slick -->
<script src="{{asset('vendors/slick/slick.min.js')}}"></script>

<!-- Vamp -->
<script src="{{asset('vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('assets/js/examples/vmap.js')}}"></script>

<!-- Dashboard scripts -->
<script src="{{asset('assets/js/examples/dashboard.j')}}s"></script>
<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<!-- App scripts -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('vendors/prism/prism.js')}}"></script>
</body>
</html>