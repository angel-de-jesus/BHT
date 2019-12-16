
@extends('layouts.app')
@section('content')
@php( $user = \App\User::all() )
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-signup  border-primary" >
                <div class="card-header  border-primary" style="text-align: center">
                    <strong>Crear Proyecto</strong> 
                </div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('proyecto.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Nombre:</strong>
                                <input placeholder="nombre" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <textarea placeholder="descripcion"name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" style="width: 100%; resize: none"></textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>#Buscador:</strong>
                                <input placeholder="#buscador" id="buscador" type="text" class="form-control @error('buscador') is-invalid @enderror" name="buscador" value="{{ old('buscador') }}" required autocomplete="buscador" autofocus>
                                @error('buscador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Fecha de entrega:</strong>
                                <input placeholder="fechaEntrega"id="fechaEntrega" type="date" class="form-control @error('fechaEntrega') is-invalid @enderror" name="fechaEntrega" value="{{ old('fechaEntrega') }}" required autocomplete="fechaEntrega" autofocus>
                                @error('fechaEntrega')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">  
                                <strong>Responsable:</strong>
                                <select placeholder="responsable"id="responsable" type="text" class="form-control @error('responsable') is-invalid @enderror" name="responsable" required autocomplete="responsable">
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

                        <div class="form-group row ">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">crear</button>
                                <a class="btn btn-danger"href="/proyecto">cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection