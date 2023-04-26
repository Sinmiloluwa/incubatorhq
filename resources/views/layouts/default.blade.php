<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body id="page-top">
<div id="wrapper">
    @include('includes.header')
    @include('includes.navbar')
<!-- Begin Page Content -->
<div class="container-fluid">
    @yield('content')
</div>
<footer class="row">
    @include('includes.footer')
</footer>
</div>

</body>
</html>
