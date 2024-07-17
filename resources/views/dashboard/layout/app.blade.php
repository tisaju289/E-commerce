<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminDashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminDashboard/dist/css/adminlte.min.css')}}">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  

   

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
 
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">




    @include('dashboard.component.header')

    @include('dashboard.component.sidenav')

    @yield('content')
 
    @include('dashboard.component.footer')

 

 
  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>



<script src="{{ asset('adminDashboard/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('adminDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('adminDashboard/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('adminDashboard/dist/js/demo.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
