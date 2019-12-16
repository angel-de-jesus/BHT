@extends('layouts.app')
@extends('header.headerHome')
@section('content')
<style>
    #header{
      text-align: center;
    }
    h3{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20pt;
    }
   
</style>
<br>
<div class="container">
    <hr>
    <div class="row ">
        <div class="col-md-12" id="header">  
            <strong><h3>Proyectos asignados</h3></strong>
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        @foreach($proyectos as $proyecto)
            <div class="col">
                <div class="card border-success mb-4" style="max-width: 20rem; min-width:18rem">
                    <div class="card-header  border-success"><h4><strong>{{$proyecto->nombre}}</strong></h4></div>
                        <div class="card-body">
                            <!-- <p class="card-text">Responsable:</p> -->
                            <p  class="card-text">{{$proyecto->descripcion}} </p>
                        </div>
                    <div class="card-footer bg-transparent border-success">
                        <a href="#" class="btn btn-success">Ver</a>
                        <a href="#" class="btn btn-danger">eliminar</a>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
      {{ $proyectos -> links() }}
    </div>
    <hr>
</div>
@endsection
