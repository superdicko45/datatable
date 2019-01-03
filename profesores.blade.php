@extends('layouts.app')

@section('htmlheader_title')
	Profesores
@endsection

@section('htmlheader_css')
    <link rel="stylesheet" href="{!! asset('/plugins/datatables/dataTables.bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('/plugins/datepicker/datepicker3.css') !!}">
    <link rel="stylesheet" href="{!! asset('/plugins/typsy/tipsy.css') !!}">
    <script src= "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
@endsection

@section('main-content')
  
<div class="row">

    <div class="col-md-12"> 
            
        <div class="panel panel-default panel-fade">
        
            <!-- Cabecera del Panel -->        
            <div class="panel-heading">
           
                <span class="panel-title">
                
                    <div class="pull-left">
                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#alumnos" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Listado de Profesores </a></li>
                        <li><a href="#agregar" data-toggle="tab"><i class="fa fa-user-plus"></i> Agregar Profesor </a></li>
                        <li><a href="#estadisticas" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Estadisticas </a></li>
                    </ul>
                        
                    </div>
                    
                    <div class="clearfix"></div>

                </span>
                
            </div>
            <!-- termina Cabecera del Panel --> 

            <!-- Cuerpo del Panel--> 
            <div class="panel-body">         
                <div class="tab-content">
                    <!--  tabla profesores  -->
                    <div class="tab-pane fade in active" id="alumnos">
                        <h3>Profesores</h3>

                         <div class="table-responsive">
                        <TABLE class="table table-striped table-bordered" cellspacing="0" width="100%" id="tableProfesores">
                        <THEAD>
                            <TR>
                                <TH>Cedula</TH>
                                <TH>Area</TH>
                                <TH>Apellidos</TH>
                                <TH>Nombre</TH>
                                <TH>Status</TH>
                                <TH></TH>
                                
                            </TR>
                        </THEAD>
                        <TFOOT>
                            <TR>
                                <TH>Cedula</TH>
                                <TH>Area</TH>
                                <TH>Apellidos</TH>
                                <TH>Nombre</TH>
                                <TH>Status</TH>
                                <TH></TH>
                            </TR>
                        </TFOOT>
                        <TBODY>
                            @foreach($profesores as $profesor)
                                    <tr>
                                        <td>{{$profesor->cedula}}</td>
                                        <td>Ciencias Sociales</td>
                                        <td>{{$profesor->ape_paterno}} {{$profesor->ape_materno}}</td>
                                        <td>{{$profesor->nombre}}</td>
                                        <td>{{$profesor->id_cat_status}}</td>
                                        <td><a href="{{ url('profesor/'.$profesor->id_profesor) }}" class="btn btn-info">Ver mas</a>
                                            <a id="{{ $profesor->id_profesor }}" class="btn delete" style="background-color: #ea0d02; color: white">X</a></td>
                                    </tr>
                                @endforeach
                        </TBODY>
                        </TABLE>
                        
                        </div>
                      <!--  Termina el Primer Tab alumnos  -->

                    </div>
                    <!--  termina tabla profesores  -->

                    <!--  Segundo Tab agregar  --> 
                                        
                    <div class="tab-pane fade" id="agregar">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <h3>Ingrese los datos </h3>    
                            </div>   
                        </div>
                                                    
                        <hr/>
                    
                        @include('layouts.detalle')
                     <!--  Termina  Tab agregar  -->
                    </div>
                    
                    <!--  Tercer Tab estadisticas  -->
                    <div class="tab-pane fade" id="estadisticas">
                    


                        <!--  Termina Tab estadisticas  -->
                        @if(isset($graficas['nom_ciclo']))
                        <h3>Estadisticas correspondietes al ciclo... {{ $graficas['nom_ciclo'] }}</h3>  
                        @endif    
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="turno_pro" style="height: 400px; width: 100%;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div id="carrera" style="height: 400px; width: 100%;"></div>
                            </div>        
                        </div>    
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="situacion" style="height: 400px; width: 100%;"></div>
                            </div>       
                        </div>        
                                                   
                    </div>

                </div>
                
            </div>
            <!-- termina Cuerpo del Panel --> 
        </div>
    </div>
 </div>   
                                  
@endsection

@section('htmlheader_js')
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/jszip.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js " type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/extensions/Buttons/js/buttons.print.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/phone/bootstrap-formhelpers-phone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/typsy/jquery.tipsy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/canvas/canvasjs.min.js') }}" type="text/javascript"></script>
           

@endsection

@section('htmlheader_js_custom')
    <script type="text/javascript"> 
        $(document).ready(function() {

            var table = $('#tableProfesores').DataTable({
                  "columns": [{ "width":"10%"},{ "width":"15%"},{ "width":"25%"},{ "width":"25%"},{ "width":"10%"},{ "width":"15%"}],
                  buttons: [
                        'copy',
                        'excel',
                        'pdf',
                        'csv',
                        { extend: 'print', text: 'Imprimir' ,message: 'Listado total de Profesores', footer:true }
                    ],         
                  "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Todos"]],
                  
                  "language": {
                    "lengthMenu": "Mostrar: _MENU_ por página",
                    "zeroRecords": "No existen solicitudes",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No existen solicitudes",
                    "infoFiltered": "(Filtrados de _MAX_ totales)",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "search": "Buscar"
                  }

                });
        
            table.buttons().container().appendTo( $('.col-sm-6:eq(0) ', table.table().container() ) );


            $('.date').datepicker({
                timepicker: false,
                format: 'yyyy-mm-dd'
            });

            var chart = new CanvasJS.Chart("situacion",{
                            
                title:{
                    text: "Situación de Profesores"
                },     
                        animationEnabled: true,     
                data: [
                {        
                    type: "doughnut",
                    startAngle: 60,                          
                    toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",                  
                    showInLegend: true,
                    dataPoints: [

                        @foreach($graficas['status'] as $value)
                            {y: {!! $value->status !!}, indexLabel: "{!! $value->id_cat_status !!} #percent%", legendText: "{!! $value->id_cat_status !!}" },
                        @endforeach          
                    ]
                }
                ]
            });

            

            var chart2 = new CanvasJS.Chart("carrera",{
                            
                title:{
                    text: "Profesores activos por área"
                },     
                        animationEnabled: true,     
                data: [
                {        
                    type: "doughnut",
                    startAngle: 60,                          
                    toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",                  
                    showInLegend: true,
                    dataPoints: [
                        @foreach($graficas['areas'] as $value)
                            {y: {!! $value->areas !!}, indexLabel: "{!! $value->area !!} #percent%", legendText: "{!! $value->area !!}" },
                        @endforeach  
                    ]
                }
                ]
            });

            var chart3 = new CanvasJS.Chart("turno_pro",{
                            
                title:{
                    text: "Turnos de Profesores"
                },     
                        animationEnabled: true,     
                data: [
                {        
                    type: "doughnut",
                    startAngle: 60,                          
                    toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",                  
                    showInLegend: true,
                    dataPoints: [
                        @foreach($graficas['turnos'] as $value)
                            {y: {!! $value->turnos !!}, indexLabel: "{!! $value->turno !!} #percent%", legendText: "{!! $value->turno !!}" },
                        @endforeach  
                    ]
                }
                ]
            });

            
            chart3.render();
            chart.render();
            chart2.render();
            

        });

        $('.delete').on('click', function () {

              swal({
              title: "¿Esta Usted Seguro ?",
              text: "Una vez eliminado, usted no podra recuperar este profesor",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              closeOnClickOutside: false,
            })
            .then((willDelete) => {
              if (willDelete) {
                var comx        =   $(this).attr('id');
                var formData    =   {
                'id'                  : comx,
                '_token'              : $('input[name=_token]').val()
              };

                $.ajax({
                type        : 'POST',
                url         : '{{url('/less_pfr')}}',
                data        : formData,
                dataType    : 'json',
                  success: function(response){
                    if (response.response) {
                        swal("ÉXITO", "Borrado con éxito", "success")
                        .then((value) => {
                          location.reload();

                        });
                    }else{
                        swal("Se presento un error, intentelo mas tarde");
                    }
                    
                  }
                });
        

              } else {
                
              }
            });
        });

    </script>
    

@endsection