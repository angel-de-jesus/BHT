
@extends('layouts.app')
@extends('header.header')
@section('content')

  <style>
    h3{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20pt;
      /* color: white; */
    }
    #status{
      margin-left: 60%;
      
    }
    /* body{
      background-image: url(https://cdn.pixabay.com/photo/2016/11/23/15/23/cosmos-1853491_960_720.jpg);
    } */
  </style>
  <br><br>
  <div class="container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    <div class="row">
      <div class="col">
        <strong><h3>Tareas</h3></strong>
      </div>
      <a class="btn btn-primary" href="{{ route('tarea.create') }}">agregar nuevo</a>
    </div>
    <hr>
  </div>
 
  <div class="container">
    <div class="row">
      @foreach($tareas as $tarea)
        <div class="col">
          <div class="card border-success mb-4" style="max-width: 20rem; min-width:18rem">
            <div class="card-header  border-success">
              <div class="row">
                <div class="col-md-6"><strong>{{$tarea->nombre}}</strong></div>
                <div class="col-md-6"><span id="status" class="badge badge-primary">pendiente</span></div>
              </div> 
            </div>
            <div class="card-body">
              <p class="card-text"><strong>Responsable:</strong> </p>
              <p  class="card-text">{{$tarea->responsable}} </p>
              <p class="card-text"><strong>Proyecto:</strong></p>
              <p  class="card-text">{{$tarea->proyecto_id}} </p>
            </div>
            <div class="card-footer bg-transparent border-success">
              <a href="{{route('tarea.show', $tarea->id)}}" class="btn ">Ver</a>
              <a href="{{route('tarea.edit',$tarea->id)}}" class="btn ">Editar</a>
              <a href="#" class="btn">eliminar</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{ $tareas -> links() }}
  </div>
@endsection