
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historia Clínica Med General | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  @include('layouts.navbar')
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
  @include('layouts.sidebar')

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Historia de Paciente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historia</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row" style="margin-left:25px;">
                     <div class="col-md-3">
                    <label for="exampleInputEmail1">PACIENTE</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" disabled id="nombre" value="{{$paciente->apellidos}} {{$paciente->nombres}}" name="gestas" placeholder="">
                   </div>
                  
                    </div>

                            <br>

              <div class="card-body">
              
              @if($hist)

                   <label for="exampleInputEmail1" style="margin-left:15px;">HISTORIAL BASE</label>

                   <div class="row" style="margin-left:10px;">
                
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Personales</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="{{$hist->ant_per}}">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Familiares</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="{{$hist->ant_fam}}">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Quirurgicos</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="{{$hist->ant_pat}}">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="{{$hist->sex}}">
                   </div>
                    </div>

                    @else

                    <div class="row" style = "margin-bottom: -20px;">

                    <div class="col-md-12" style="margin-left: 20px; color: red;">
                    <label for="exampleInputEmail1">NO TIENE HISTORIAL BASE, DEBE PROCEDER A CREARLO</label>
                    </div>

                    </div>
                    <br>
                    
                    <form role="form" method="post" action="historiab/guardar">
                {{ csrf_field() }}  
                      <div class="row" style="margin-left:10px;">

                      <div class="col-md-4">
                      <label for="exampleInputEmail1">Antecedentes Personales</label>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre"  name="per">
                      </div>
                      <div class="col-md-4">
                      <label for="exampleInputEmail1">Antecedentes Familiares</label>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre"  name="fam">
                      </div>
                      <div class="col-md-4">
                      <label for="exampleInputEmail1">Antecedentes Quirurgicos</label>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre"  name="pat">
                      </div>
                      <div class="col-md-4">
                      <label for="exampleInputEmail1">Otros</label>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre"  name="sexo">
                      </div>
                      </div>

                      <input type="hidden" name="consulta" value="{{$consulta->id}}">

                 
                                                      

                  <br>
                  <input type="hidden" name="control" value="">

               

                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>

                    @endif

              
                    @foreach($historias as $hist)

              <div class="card-body">
                    <label for="exampleInputEmail1">Fecha: {{$hist->created_at}}</label>
                    <br>

                    <label for="exampleInputEmail1">Examen Físico y Clínico</label>
                   <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Piel/Mucosas</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="piel" placeholder="" disabled value="{{$hist->piel}}">
                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">Torax</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="torax" placeholder="" disabled value="{{$hist->torax}}">
                   </div>
                  
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Corazon</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="corazon" placeholder="" disabled value="{{$hist->corazon}}">
                   </div>
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Abdomen</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="abdomen" placeholder="" disabled value="{{$hist->abdomen}}">
                   </div>
            
                    </div>
                    <br>

                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="" disabled value="{{$hist->otros}}">
                   </div>
                  
            
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Examen Auxiliar</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="ex_aux" placeholder="Examen Auxiliar" disabled>{{$hist->ex_aux}}</textarea>
                  </div>
                    </div>
 
                    <br>
                  
                    <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="diag_fin" placeholder="Diagnóstico Final" disabled>{{$hist->diag_fin}}</textarea>

                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">CIE X</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="" disabled value="{{$hist->cie_df}}">
         
                    </div>
                
                    </div>
                    <br>
                 
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Plan de Tratamiento</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="plan" placeholder="Plan de Tratamiento" disabled>{{$hist->plan}}</textarea>

                  </div>
                    </div>
                    <br>
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Observaciones</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="observaciones" placeholder="Observaciones" disabled>{{$hist->observaciones}}</textarea>
                   </div>
                    </div>
                    <br>
                   


                </div>
                @endforeach
                <!-- /.card-body -->

            </div>
            

              <form role="form" method="post" action="historiamm/guardar">
              {{ csrf_field() }}                

                    <div class="card-body" style="margin-left:15px;">
                  
                  
                    <label for="exampleInputEmail1">Examen Físico y Clínico</label>
                   <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Piel/Mucosas</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="piel" placeholder="">
                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">Torax</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="torax" placeholder="">
                   </div>
                  
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Corazon</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="corazon" placeholder="">
                   </div>
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Abdomen</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="abdomen" placeholder="">
                   </div>
            
                    </div>
                    <br>

                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="">
                   </div>
                  
            
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Examen Auxiliar</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="ex_aux" placeholder="Examen Auxiliar"></textarea>
                  </div>
                    </div>
 
                    <br>
                  
                    <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="diag_fin" placeholder="Diagnóstico Final"></textarea>

                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">CIE X</label>
                    <select class="form-control select2" name="cie_df">
                                       </select>           
                    </div>
                
                    </div>
                    <br>
                 
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Plan de Tratamiento</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="plan" placeholder="Plan de Tratamiento"></textarea>

                  </div>
                    </div>
                    <br>
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Observaciones</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="observaciones" placeholder="Observaciones"></textarea>
                   </div>
                    </div>
                    <br>
                 


                 
                                                      

                  <br>
                  <input type="hidden" name="consulta" value="{{$consulta->id}}">


               

                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         
            <!-- /.card -->

           
           
               


           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <div class="modal fade" id="viewTicket">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div><!-- /.container-fluid -->
    </section>
    

  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script language="javascript">

function disableEnterKey(e) 
{ 
  var key; 
  if(window.event) 
     key = window.event.keyCode; 
   else key = e.which; //firefox 
   return (key != 13); 
  }

</script>

<script type="text/javascript">
		function viewh(e){
		    var id = $(e).attr('id');
		    
		    $.ajax({
		        type: "GET",
		        url: "/historia/reevaluar/"+id,
		        success: function (data) {
		            $("#viewTicket .modal-body").html(data);
		            $('#viewTicket').modal('show');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}

	
	</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<!-- page script -->

</body>
</html>