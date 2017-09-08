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

    <form role="form" action="{{route('store_actualizarregistro')}}" method="post" id="formeditempr">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="exampleInputEmail1">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="exampleInputPassword1">
      </div>
      <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="form-check-input">Check me out</label>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Example multiple select</label>
        <select multiple class="form-control" id="exampleFormControlSelect2" name="exampleFormControlSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
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