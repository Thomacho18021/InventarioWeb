<!-- REQUIRED JS SCRIPTS -->
{!! Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons') !!}
<script type="text/javascript">
  var baseurl ="{!! url('/') !!}/";
  var urlpagina1 ="{!! Request::segment(1) !!}";
  var urlpagina2 ="{!! Request::segment(2) !!}";
  var urlpagina3 ="{!! Request::segment(3) !!}";
</script>

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url('public/js/app.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script src="{{ url('public/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
      $(document).ready(function() {
            $("#tabla_general_datatable").DataTable({
                  "language": {
                        url: baseurl+"public/js/Spanish.json"
                  },
            });
      });
</script>
@if(Session::has('msj'))
<script type="text/javascript">
      $.notify({icon: "add_alert", message: '<?php echo Session::get('msj')?>'},{type: 'info', timer: 1000})
</script>
@endif
@if(Session::has('msjError'))
<script type="text/javascript">
      $.notify({icon: "add_alert", message: '<?php echo Session::get('msjError')?>'},{type: 'danger', timer: 1000})
</script>
@endif
@if(Session::has('msjAlert'))
<script type="text/javascript">
      $.notify({icon: "add_alert", message: '<?php echo Session::get('msjAlert')?>'},{type: 'warning', timer: 1000})
</script>
@endif
@yield('extrasjavascript')
