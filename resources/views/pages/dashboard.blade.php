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
					<select id="select_depto" class="form-control" onchange="filtro_departamento(this)">
						<option value="">Seleccione un departamento</option>
						@foreach($departamento as $pro)		
							<option value="{{$pro->departamento}}">{{$pro->nom_dpto}}</option>
						@endforeach
					</select>		
				</div>
				<div class="col-sm-6">
					<label id="labelmpio" for="Proceso" class="control-label">Municipio:</label>
					<select class="form-control">
						<option value="">Seleccione un municipio</option>			
					</select>		
				</div>
			</div>
      	</div>
    </div>
  </div>
</div><br>
<!-- Fin de os filtros -->
<!-- Inicio del reporte --> 
<h1 id="tittle_dashboard" style="text-align: center;">Reporte Nacional</h1><br>
<div class="row">
	<div class="col col-md-6">
		<div class="header_plot">Encuestas por departamento</div>
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
	function filtro_departamento(element){
		var depto=$('#select_depto').prop('selected', 'selected').val();
		console.log(depto);
	}
</script>
@endsection