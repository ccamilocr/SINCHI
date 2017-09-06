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
<h1 style="text-align: center;">Dashboard</h1>
<div class="select_queries col-sm-12">
	<div class="col-sm-4">
		<label id="labeldpto" for="Proceso" class="control-label">Departamento:</label>
		<select class="form-control">
			<option value="">Seleccione un departamento</option>
			@foreach($reg_per_depto as $pro)		
				<option value="{{$pro->departamento}}">{{$pro->nom_dpto}}</option>
			@endforeach
		</select>
	</div>
</div>
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
@endsection