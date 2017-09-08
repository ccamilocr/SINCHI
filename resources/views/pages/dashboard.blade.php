@extends('layout')
@section('style')
<style type="text/css">
.header_plot{
	text-align: center;
	padding: 10px;
	background-color: rgb(148, 58, 74);
	color: white;
	font-size: 20px;	
}

.select_queries{
	margin: 10px 0 20px 0;
}

.legend {
    line-height: 18px;
    color: #555;
}
.legend i {
    width: 14px;
    height: 14px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}

.info {
    padding: 6px 8px;
    font: 12px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
}
.info h4 {
    margin: 0 0 5px;
    color: #777;
}
</style>
@endsection
@section('content')
<br>
<!-- <h1 style="text-align: center;">Dashboard</h1><br> -->
<!-- En esta secccion inician los filtros de la informacion -->
<div id="accordion" role="tablist">
  	<div class="card">
	    <div class="card-header" role="tab" id="headingOne">
	      	<h5 class="mb-0">
	        	<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          		Aplicar filtros
	        	</a>
	      	</h5>
	    </div>
	    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
	      	<div class="card-body">
	        	<div class="row">
					<div class="col-sm-6">
						<label id="labeldpto" for="Proceso" class="control-label">Departamento:</label>
						<select id="select_depto" class="form-control" onchange="list_municipios(this)">
							<option value="00">Seleccione un departamento</option>
							@foreach($departamento as $pro)		
								<option value="{{$pro->departamento}}">{{$pro->nom_dpto}}</option>
							@endforeach
						</select>		
					</div>
					<div class="col-sm-6">
						<label id="labelmpio" for="Proceso" class="control-label">Municipio:</label>
						<select id="select_mpio" class="form-control">
							<option value="00">Seleccione un municipio</option>			
						</select>		
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">
						<label id="labeldpto" for="Proceso" class="control-label">A qué se dedica el emprendimiento</label>
						<select id="select_dedica" class="form-control" onchange="list_municipios(this)">
							<option value="00">Seleccione una opción</option>
							<option value="1">Producir</option>
							<option value="2">Colectar</option>
							<option value="3">Procesar</option>
							<option value="4">Comercializar </option>
						</select>		
					</div>
					<div class="col-sm-6">
						<label id="labelmpio" for="Proceso" class="control-label">Año de constitución del emprendimiento</label>
						<select id="select_year" class="form-control">
							<option value="00">Seleccione un año</option>
							@foreach($anio_constitucion_select as $pro)		
								<option value="{{$pro->anoconstruccemprend}}">{{$pro->year}}</option>
							@endforeach			
						</select>		
					</div>
				</div>
				<br><button type="button" class="btn btn-primary" style="float: right;" onclick="filtros()">Aplicar filtro</button><br>
	      	</div>
	    </div>
	</div>
</div><br>
<!-- Fin de os filtros -->
<!-- Inicio del reporte --> 
<h1 id="tittle_dashboard" style="text-align: center;">Reporte Nacional</h1><br>
<div class="row">
	<div class="col col-md-12">
		<div class="header_plot">Encuestas por unidad territorial</div>
		<div id='map' style="height: 500px"></div>
	</div>	
</div><br>
<div class="row">
	<div class="col col-md-6">
		<div class="header_plot">Encuestas por unidad territorial</div>
		<div id="departamentos_plot" style="height: 400px"></div>
	</div>
	<div class="col col-md-6">
		<div class="header_plot">¿A qué se dedica el emprendimiento?</div>
		<div id="dedicacion_plot" style="height: 400px"></div>
	</div>
</div><br>
<div class="row">
	<div class="col col-md-12">
		<div class="header_plot">Listado de emprendimientos</div>
		<div id="table_div"></div>
	</div>	
</div><br>
@endsection
@section('js')
<script type='text/javascript' src="{{ URL::asset('assets/js/colombia_line.js')}}"></script>
<script type='text/javascript' src="{{ URL::asset('assets/js/deptos.js')}}"></script>
<script type='text/javascript' src="{{ URL::asset('assets/js/mpios.js')}}"></script>

@include('includes.departamentos_plot')
@include('includes.dedicacion_plot')
@include('includes.map_dashboard')
@include('includes.listado')

<script type="text/javascript">
	$( document ).ready(function() {
		//EJECUTA LA FUNCION FILTRO PARA QUE CARGUE LOS DATOS NACIONALES
		filtros();
	});

	function list_municipios(element){
		var depto=$('#select_depto').prop('selected', 'selected').val();
		
		$.ajax({// update deforest vs agriculture overview plot
	  		url:"municipios_list",   // the url where we want to POST
	  		type:"POST",   // define the type of HTTP verb we want to use (P
			beforeSend: function (xhr) {//This function is necessary to ajax 
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
	  		data:{depto:depto},  // our data object
	  		//dataType:'json',  //what type of data do we expect back from the server
			success:function(data){ //return array of controller URL
				$('#select_mpio').empty();
				$('#select_mpio').append('<option value="00">Seleccione un municipio</option>');
				$(data).each(function(i){
					$('#select_mpio').append('<option value="'+data[i].cod_dane+'">'+data[i].nom_mpio+'</option>')
				});
			},	    	
			error:function(){
				alert('error');
			}
		});
	}

	function filtros(){
		var depto=$('#select_depto').prop('selected', 'selected').val();
		var mpio=$('#select_mpio').prop('selected', 'selected').val();
		var dedica=$('#select_dedica').prop('selected', 'selected').val();
		var year=$('#select_year').prop('selected','selected').val();
		var filtros=[depto,mpio,dedica,year];
		$.ajax({// update deforest vs agriculture overview plot
	  		url:"filtros",   // the url where we want to POST
	  		type:"POST",   // define the type of HTTP verb we want to use (P
			beforeSend: function (xhr) {//This function is necessary to ajax 
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
	  		data:{filtros:filtros},  // our data object
	  		//dataType:'json',  //what type of data do we expect back from the server
			success:function(data){ //return array of controller URL
				
				if(filtros[0]!='00'){
					if(filtros[1]!="00"){
						$('#tittle_dashboard').html('Reporte del municipio de ' + $('#select_mpio option[value='+filtros[1]+']').text() + ", " + $('#select_depto option[value='+filtros[0]+']').text())
					} else{
						$('#tittle_dashboard').html('Reporte del departamento de ' + $('#select_depto option[value='+filtros[0]+']').text());
					}
				} 
				load_map(data.reg_per_unidad,filtros);
				plot_reg_per_unidad(data.reg_per_unidad,filtros);
				dedicacion(data.dedicacion_query,filtros);
				listado_emprendimientos(data.emprendimientos_query,filtros);
			},	    	
			error:function(){
				alert('error');
			}
		});
	}

</script>
@endsection