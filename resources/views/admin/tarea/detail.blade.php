@extends('layouts.app')
@extends('header.header')
@section('content')

    <style>
        #header{
            text-align: center;
        }
        h3{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
    <div class="container">
        <div class="row" id="header">
            <div class="col-md-12">
                <br>
                <strong><h3> {{$tareas->nombre}}</h3></strong>
                <hr>
            </div>
        </div>
        <br>
        <strong>Descripcion: </strong> {{$tareas->descripcion}}
        <br>
        <strong>Responsable: </strong> {{$tareas->responsable}}
        <br>
        <strong>Fecha de entrega:</strong> {{$tareas->fechaFin}}
        <br>
        <strong>Hora de entrega:</strong> {{$tareas->horaEntrega}}
        <br><br>
        <strong>Status:</strong> <span id="status" class="badge badge-primary">pendiente</span>
        <br><br>
        <a href="{{route('tarea.index')}}" class="btn btn-sm btn-success">Atras</a>
        <hr> 
    </div>

@endsection