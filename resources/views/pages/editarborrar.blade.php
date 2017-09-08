@if(Auth::check())<!--muestra el contenido de la página si esta autenticado-->
@extends('layout')
@section('style')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap4.min.css" rel="stylesheet">

<style type="text/css">
  
</style>
@endsection
@section('content')
    </br>
    <h3 class="text-center">Emprendimientos</h3>   
    </br>

    <form role="form" action="{{route('store_actualizarregistro')}}" method="post" id="formeditempr">
        {{ csrf_field() }}	   
       <input id="emprendimientokey" type="hidden" class="form-control" name="emprendimientokey">
       <button id="btnempren" disabled="disabled" data-target="#editar_emprendimiento"  data-toggle="modal" type="submit" class="btn btn-secondary">Editar Emprendimiento</button>
       <button id="btnemprenborrar" disabled="disabled" data-target="#borrar_emprendimiento"  data-toggle="modal" type="button" class="btn btn-danger">Borrar Emprendimiento</button>       
    </form>
    
    </br>        
	<table id="tabla" class="table  table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>                
                <th>Nombre Enprendimiento</th>
                <th>Año Construcción</th>
                <th>Representante Legal</th>                
            </tr>
        </thead>
        <tbody>
            @foreach($emprendimientos as $emprendimiento)
            <tr id="{{$emprendimiento->key}}">                
                <td>{{$emprendimiento->nombreemprendimiento}}</td>
                <td>{{$emprendimiento->anoconstruccemprend}}</td>
                <td>{{$emprendimiento->nombrereplegal}} {{$emprendimiento->apellidoreplegal}}</td>
            </tr>            
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="borrar_emprendimiento" tabindex="-1" role="dialog" aria-labelledby="emprendimientoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="emprendimientoModalLabel">Borrar Emprendimiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{route('borrarregistro')}}" method="post" id="borrarempr" enctype="multipart/form-data">
                {{ csrf_field() }}

                  <!--El siguiente input es invisible para el usuario. Cotiene el id del proyecto a modificar-->
                  <input type="hidden" id="id_borrar" name="id_borrar"  class="form-control" >
            ¿Esta seguro de borrar el emprendimiento seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('js')
	
<script type="text/javascript">
	$(document).ready(function() {        
    	var table = $('#tabla').DataTable();
        $('#tabla tbody').on('click', 'tr', function(){
          if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            $("#btnempren").prop('disabled', true);
            $("#btnemprenborrar").prop('disabled', true);
          }
          else {
            table.$('tr.table-active').removeClass('table-active');
            $(this).addClass('table-active');
            $("#btnempren").prop('disabled', false);
            $("#btnemprenborrar").prop('disabled', false);
            //$( "#emprendimientokey" ).val($('td', this).eq(0).text());
            var id=$(this);
            var num=id[0].id;
            $("#emprendimientokey").val(num);
            $("#id_borrar").val(num);
          }
        }); 
	});
</script>
	<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap4.min.js"></script>
@endsection
@endif<!--Cierra el if de mostrar el contenido de la página si esta autenticado-->