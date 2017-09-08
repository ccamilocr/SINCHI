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
	<div class="col col-md-6">
		<div class="header_plot">Encuestas por unidad territorial</div>
		<div id="departamentos_plot" style="height: 400px"></div>
	</div>
	<div class="col col-md-6">
		<div class="header_plot">Periodo de constitución del emprendimiento</div>
		<div id="constitucion_plot" style="height: 400px"></div>
	</div>
</div>
@endsection
@section('js')
@include('includes.departamentos_plot')
@include('includes.ano_emprendimiento_plot')
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
		var filtros=[depto,mpio];
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

				plot_reg_per_unidad(data.reg_per_unidad,filtros);
			},	    	
			error:function(){
				alert('error');
			}
		});
	}

</script>
@endsection