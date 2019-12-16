
@extends('layouts.app')
@section('content')
@php( $user = \App\User::all() )
@php($proyecto= \App\Proyecto::all())
<br>
<style>
    #header{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-success mb-4">
                <div class="card-header  border-success" id="header">
                    <h3><strong>Crear tarea</strong></h3> 
                </div>

                
                <form method="POST" action="{{ route('tarea.store') }}">
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Nombre:</strong>
                                <input placeholder="nombre" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Descripcion:</strong>
                                <textarea placeholder="descripcion"name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" style="width: 100%; resize: none"required autofocus></textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Fecha de entrega:</strong>
                                <input placeholder="fecha de entrega"id="fechaEntrega" type="date" class="form-control @error('fechaEntrega') is-invalid @enderror" name="fechaEntrega" required  autofocus>
                                @error('fechaEntrega')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Hora de entrega:</strong>
                                <input placeholder="horaEntrega"id="horaEntrega" type="time" class="form-control @error('horaEntrega') is-invalid @enderror" name="horaEntrega" required  autofocus>
                                @error('horaEntrega')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Responsable:</strong>
                                <select placeholder="responsable"id="responsable" type="text" class="form-control @error('responsable') is-invalid @enderror" name="responsable" required autofocus>
                                    @foreach($user as $user)
                                        <option>{{$user->name}}</option >
                                    @endforeach
                                </select>
                                @error('responsable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Proyecto:</strong>
                                <select class="form-control" name="proyecto_id">
                                    <option value="0">---Seleccionar---</option>
                                    @foreach($proyecto as $proyecto)
                                        <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                          
                        <button type="submit" class="btn btn-success">
                            crear
                        </button>
                        <a class="btn btn-danger" href="{{route('tarea.index')}}">cancelar</a>
                            
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>


@endsection