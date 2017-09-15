@if(Auth::check())<!--muestra el contenido de la página si esta autenticado-->
@extends('layout')
@section('style')

<style type="text/css">
  
</style>
@endsection
@section('content')
    </br>
    <h3 class="text-center">Edición Emprendimiento</h3>   
    </br>
@foreach($arraydombobox[0] as $emprendimientoeditar)                      
@endforeach
    <form role="form" action="{{route('updateregistro')}}" method="post" id="formeditempr">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="emprendimiento">Nombre del encuestador</label>
        <select class="form-control" id="selectencuestador" name="selectencuestador" required>            
          @foreach($arraydombobox[1] as $encuestador)
            @if ($encuestador->iniciales==$emprendimientoeditar->encuestador)
              <option value="{{$encuestador->iniciales}}" selected="selected">{{$encuestador->name}}</option>
            @else
              <option value="{{$encuestador->iniciales}}">{{$encuestador->name}}</option>
            @endif            
          @endforeach                    
        </select>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Fecha de la encuesta</label>
        <input id="fechaenc" type="text" class="form-control" name="fechaenc" value='{{$emprendimientoeditar->fechaencuesta}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Nombres del encuestado</label>
        <input id="nombreenc" type="text" class="form-control" name="nombreenc" value='{{$emprendimientoeditar->nombresencuestado}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Apellidos del encuestado</label>
        <input id="apellidoenc" type="text" class="form-control" name="apellidoenc" value='{{$emprendimientoeditar->apellidosencuestado}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Número de documento de identificacion</label>
        <input id="identifienc" type="text" class="form-control" name="identifienc" value='{{$emprendimientoeditar->cedulaencuestado}}' required>
      </div>      
      <div class="form-group">
        <label for="emprendimiento">Correo electrónico</label>
        <input id="correoenc" type="email" class="form-control" name="correoenc" value='{{$emprendimientoeditar->correoencuestado}}'>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Departamento</label>
        <select class="form-control" id="selectdepto" name="selectdepto" required>            
          @foreach($arraydombobox[2] as $departamento)
            @if ($departamento->cod_dpto==$emprendimientoeditar->departamento)
              <option value="{{$departamento->cod_dpto}}" selected="selected">{{$departamento->nom_dpto}}</option>
            @else
              <option value="{{$departamento->cod_dpto}}">{{$departamento->nom_dpto}}</option>
            @endif            
          @endforeach                    
        </select>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Municipio</label>
        <select class="form-control" id="selectmpio" name="selectmpio" required>            
          @foreach($arraydombobox[3] as $municipio)
            @if ($municipio->cod_dane==$emprendimientoeditar->municipio)
              <option value="{{$municipio->cod_dane}}" selected="selected">{{$municipio->nom_mpio}}</option>
            @else
              <option value="{{$municipio->cod_dane}}">{{$municipio->nom_mpio}}</option>
            @endif            
          @endforeach                    
        </select>
      </div>
      <div class="form-group">                    
        <label for="emprendimiento">Tipo de territorio</label></br>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->tipodeterritorio=='vereda')
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri1" value="vereda" checked> Vereda
          @else
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri1" value="vereda"> Vereda
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->tipodeterritorio=='resguardo')
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri2" value="resguardo" checked> Resguardo
          @else
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri2" value="resguardo"> Resguardo
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->tipodeterritorio=='centro_poblado')
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri3" value="centro_poblado" checked> Centro Poblado
          @else
            <input class="form-check-input" type="radio" name="tipoterri" id="tipoterri3" value="centro_poblado"> Centro Poblado
          @endif
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Coordenadas</label></br>      
        <label for="emprendimiento" class="control-label">Latitud:</label>
        <input id="modlat" type="number" step="any" class="form-control" name="modlat" value='{{(double)$emprendimientoeditar->latitud}}' required>      
        <label for="emprendimiento" class="control-label">Longitud:</label>
        <input id="modlong" type="number" step="any" class="form-control" name="modlong" value='{{(double)$emprendimientoeditar->longitud}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Nombres del emprendimiento</label>
        <input id="nombreemp" type="text" class="form-control" name="nombreemp" value='{{$emprendimientoeditar->nombreemprendimiento}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Año de construcción del emprendimiento</label>
        <input id="anoemp" type="text" class="form-control" name="anoemp" value='{{$emprendimientoeditar->anoconstruccemprend}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Información del representante legal</label></br>      
        <label for="emprendimiento" class="control-label">Nombres:</label>
        <input id="nombrereplegal" type="text" class="form-control" name="nombrereplegal" value='{{$emprendimientoeditar->nombrereplegal}}' required>
        <label for="emprendimiento" class="control-label">Apellidos:</label>
        <input id="apellidoreplegal" type="text" class="form-control" name="apellidoreplegal" value='{{$emprendimientoeditar->apellidoreplegal}}' required>
        <label for="emprendimiento" class="control-label">Tipo documento:</label>
        <select class="form-control" id="selectdocureplegal" name="selectdocureplegal" required>            
          @foreach($arraydombobox[4] as $tipoducu)
            @if ($tipoducu->tipdoc==$emprendimientoeditar->tipodocreplegal)
              <option value="{{$tipoducu->tipdoc}}" selected="selected">{{$tipoducu->nombre}}</option>
            @else
              <option value="{{$tipoducu->tipdoc}}">{{$tipoducu->nombre}}</option>
            @endif            
          @endforeach                    
        </select>
        <label for="emprendimiento">Número de documento</label>
        <input id="numdocreplegal" type="text" class="form-control" name="numdocreplegal" value='{{$emprendimientoeditar->numeroreplegal}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">¿ A que se dedica el emprendimiento? </label></br>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->dedicaempren==1)
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren1" value="1" checked> Producir 
          @else
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren1" value="1"> Producir 
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->dedicaempren==2)
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren2" value="2" checked> Colectar 
          @else
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren2" value="2"> Colectar 
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->dedicaempren==3)
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren3" value="3" checked> Procesar 
          @else
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren3" value="3"> Procesar 
          @endif
          </label>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->dedicaempren==4)
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren4" value="4" checked> Comercializar 
          @else
            <input class="form-check-input" type="radio" name="dedicaempren" id="dedicaempren4" value="4"> Comercializar 
          @endif
          </label>
        </div>      
      </div>
      <div class="form-group">
        <label for="emprendimiento">Productos comercializados (separe con una , cada producto)</label>
        <input id="productos" type="text" class="form-control" name="productos" value='{{$emprendimientoeditar->productos}}' required>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Especie utilizada</label>
        <select class="form-control" id="selectespecie" name="selectespecie" required>            
          @foreach($arraydombobox[5] as $especie)
            @if ($especie->id==$emprendimientoeditar->especie)
              <option value="{{$especie->id}}" selected="selected">{{$especie->nom_comun}} ({{$especie->nom_cientifico}})</option>
            @else
              <option value="{{$especie->id}}">{{$especie->nom_comun}} ({{$especie->nom_cientifico}})</option>
            @endif            
          @endforeach                    
        </select>
      </div>
      <div class="form-group">
        <label for="emprendimiento">Tipo producto</label></br>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->tipoproducto==1)
            <input class="form-check-input" type="radio" name="tipoproducto" id="tipoproducto1" value="1" checked> Cultivado 
          @else
            <input class="form-check-input" type="radio" name="tipoproducto" id="tipoproducto1" value="1"> Cultivado 
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
          @if($emprendimientoeditar->tipoproducto==2)
            <input class="form-check-input" type="radio" name="tipoproducto" id="tipoproducto2" value="2" checked> Silvestre 
          @else
            <input class="form-check-input" type="radio" name="tipoproducto" id="tipoproducto2" value="2"> Silvestre 
          @endif
          </label>
        </div>                   
      </div>

      <div class="form-group">
        <label for="emprendimiento">¿ Cuál es la frecuencia de estacionalidad del producto?</label></br>
        <div class="form-check form-check-inline">          
          <label class="form-check-label">
          @if($arraydombobox[6][0]->VALUE==1)
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia1" value="1" checked> Enero
          @else
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia1" value="1"> Enero
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">          
          <label class="form-check-label">
          @if($arraydombobox[6][1]->VALUE==2)
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia2" value="2" checked> Febrero
          @else
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia2" value="2"> Febrero
          @endif
          </label>
        </div>
        <div class="form-check form-check-inline">          
          <label class="form-check-label">
          @if($arraydombobox[6][2]->VALUE==3)
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia3" value="3" checked> Marzo
          @else
            <input class="form-check-input" name= 'frecuencia[]' type="checkbox" id="frecuencia3" value="3"> Marzo
          @endif
          </label>
        </div>
      </div>



      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="exampleFormControlTextarea1"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
@section('js')
	

@endsection
@endif<!--Cierra el if de mostrar el contenido de la página si esta autenticado-->