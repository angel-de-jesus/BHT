@extends('layouts.app')
@extends('header.header')
@php( $user = \App\User::all() )
@section('content')

  <style>
    #header{
      text-align: center;
    }
    h3{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20pt;
    }
    #caracteristica{
      text-align: center;
    }
  </style>

  <br>
  <div class="container">
    <div class="row" id="header">
      <div class="col-md-12">
        <strong><h3>Proyecto: {{$proyectos->nombre}}</h3></strong>

        
      </div>
    </div>
    <hr>
    <div class="row" id="caracteristica">
      <div class="col-md-12">
        <strong>Descripcion: </strong> {{$proyectos->descripcion}}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Responsable: </strong> {{$proyectos->responsable}}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>creado:</strong> {{$proyectos->created_at}}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Fecha de entrega:</strong> {{$proyectos->fechaFin}}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('proyecto.index')}}" class="btn btn-sm btn-success">Atras</a>
        <!-- <a href="{{route('tarea.create')}}" class="btn btn-sm btn-primary">Nueva tarea</a> -->
        <hr>
      </div>
    </div>
   
    <div class="container"id="header">
      <strong><h3>Tareas</h3></strong>
      <br>
      <div class="row">
        @foreach($tareas as $tarea)
          <div class="col">
            <div class="card border-success mb-4" style="max-width: 21rem; min-width:18rem">
              <div class="card-header  border-success"><h4><strong>{{$tarea->nombre}}</strong></h4></div>
              <div class="card-body">
                <p class="card-text">Responsable:</p>
                <p  class="card-text">{{$tarea->responsable}} </p>
              </div>
              <div class="card-footer bg-transparent border-success">
                <a href="#" class="btn btn-success">Ver</a>
                <a href="#" class="btn btn-danger">eliminar</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{ $tareas -> links() }}
    </div>
    <hr>
  </div>
@endsection
