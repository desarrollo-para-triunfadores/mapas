<!DOCTYPE html>
<html>
    <head>        
        @include('partes.estilos')  
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- top nav -->
            @include('partes.navTop') 
            <!-- logo and sidebar -->
            @include('partes.sidebar') 
            <!-- page content -->
            @yield('content')
            <!-- footer -->
            @include('partes.pie')
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- scripts -->
        @include('partes.scripts')
        @yield('script')
    </body>
</html>