<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MadreTeresa | Admin</title>
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
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
            <h1 class="m-0 text-dark">Cierre de Caja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cierre de Caja</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    @include('flash-message')

      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
             
                          <form method="get" action="cierre-caja">					
                  <label for="exampleInputEmail1">Filtros de Busqueda</label>

                    <div class="row">
                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Inicio</label>
                    <input type="date" class="form-control" value="{{$fecha1}}" name="fecha" placeholder="Buscar por dni" onsubmit="datapac()">
                  </div>

                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fin</label>
                    <input type="date" class="form-control" value="{{$fecha2}}" name="fecha2" placeholder="Buscar por dni" onsubmit="datapac()">
                  </div>
                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </div>

               
                
                  </form>
                  <br>
                  <div class="row">
                    <form action="/cierre-caja-create" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$total}}" name="total">
                    <input type="submit" class="btn btn-danger" value="Cerrar Turno" onclick="return confirm('¿Desea Cerrar este turno?')">
                </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Primer Turno</th>
                    <th>Segundo Turno</th>
                    <th>Total</th>
                    <th>Estatus</th>
                    <th>Registrado Por</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($caja as $c)
                  <tr>
                    <td>{{$c->created_at}}</td>
                    <td>{{$c->primer_turno}}</td>
                    <td>{{$c->segundo_turno}}</td>  
                    <td>{{$c->total}}</td>
                    @if($c->estatus == 1)
                    <td><span class="badge bg-primary">Abierto</span></td>
                    @else
                    <td><span class="badge bg-success">Cerrado</span></td>
                    @endif         
                    <td>{{$c->name}}</td>
                  

                    <td>

                   
                    @if($c->primer_turno > 0)
                    <a target="_blank" class="btn btn-primary btn-sm" href="caja-consolidado-{{$c->id}}">
                        <i class="fas fa-print">
                        </i>
                        Consolidado
                    </a>
                    @else
                    <a target="_blank" class="btn btn-primary btn-sm" href="caja-consolidado2/{{$c->id}}/{{$c->fecha}}/{{$c->fecha}}">
                        <i class="fas fa-print">
                        </i>
                        Consolidado
                    </a>
                    @endif

                    @if(Auth::user()->rol == 1)
                  
                    <a class="btn btn-danger btn-sm" href="caja-delete-{{$c->id}}" onclick="return confirm('¿Desea Reversar este Cierre?')">
                        <i class="fas fa-trash">
                        </i>
                        Reversar
                    </a>
                    @endif</td>
                      
                  </td>
                  </tr>
                  @endforeach
                 
                 
               
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Primer Turno</th>
                    <th>Segundo Turno</th>
                    <th>Total</th>
                    <th>Estatus</th>
                    <th>Registrado Por</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Resumen del Turno</h4>
              </div>
              <div class="modal-body"></div>
            </div>
          </div>
        </div>

   
  </section>
  
<script type="text/javascript">
	function view(e){
        var id = $(e).attr('data-id');
        
        $.ajax({
            type: "GET",
            url: "/saldo/view/"+id,
            success: function (data) {
                $(".modal-body").html(data);
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    };

	
	</script>

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
<!--<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>-->
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<style type="text/css">
		.modal-backdrop.in {
		    filter: alpha(opacity=50);
		    opacity: 0;
		    z-index: 0;
		}

		.modal {
			top:35px;
		}
</style>
<script type="text/javascript">
		function view(e){
		    var id = $(e).attr('id');
		    
		    $.ajax({
		        type: "GET",
		        url: "/tickets/view/"+id,
            console.log(id);
		        success: function (data) {
		            $("#viewTicket .modal-body").html(data);
		            $('#viewTicket').modal('show');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}

		function eliminar(e) {
			var id = $(e).attr('id');
			var r = confirm("Seguro que deseas eliminar este material!");
			if (r) {
				//$(e).parent('div').hide('slow');
				$.ajax({
		        type: "GET",
			        url: "/servicio/material_eliminar/"+id,
			        success: function (data) {
			        	if (data == 1) {
			        		$(e).parent('div').hide('slow');
			            	toastr.success('El materia ha sido eliminado.', 'Servicios!');
			        	} else {
			        		toastr.error('El material no pudo ser eliminado.', 'Servicios!')
			        	}
			        },
			        error: function (data) {
			            toastr.error('Se genero un problema al momento de realizar el proceso de eliminación.', 'Servicios!')
			        }
			    });
			}
			
		}
	</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>