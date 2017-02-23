
<!-- jQuery 2.2.3 -->
<script src="{{ asset('plantilla/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('plantilla/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plantilla/AdminLTE/plugins/morris/morris.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('plantilla/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- jvectormap -->
<script src="{{ asset('plantilla/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plantilla/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('plantilla/AdminLTE/plugins/knob/jquery.knob.js') }}"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('plantilla/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('plantilla/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plantilla/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('plantilla/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('plantilla/AdminLTE/plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('plantilla/AdminLTE/dist/js/app.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('plantilla/AdminLTE/dist/js/pages/dashboard.js') }}"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plantilla/AdminLTE/dist/js/demo.js') }}"></script>

<!-- bootstrap color picker -->
<script src="{{ asset('plantilla/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

<script>

//Colorpicker
$(".my-colorpicker1").colorpicker({
    colorSelectors: {
        negro: '#000000',
        blanco: '#ffffff',
        rojo: '#FF0000',
        gris: '#777777',
        azul: '#337ab7',
        verde: '#5cb85c',
        celeste: '#5bc0de',
        amarillo: '#f0ad4e',
        morado: '#d9534f'
    }
});
//color picker with addon
$(".my-colorpicker2").colorpicker({
    colorSelectors: {
        negro: '#000000',
        blanco: '#ffffff',
        rojo: '#FF0000',
        gris: '#777777',
        azul: '#337ab7',
        verde: '#5cb85c',
        celeste: '#5bc0de',
        amarillo: '#f0ad4e',
        morado: '#d9534f'
    }
});
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANzTkkt93m5CSxz1H5fZy18uN_sEERiu4&callback=initMap"></script>


