@extends('layouts.app')
@extends('header.header')
@php( $user = \App\User::all() )
@section('content')
 
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops! </strong> Nose a podido guardar los cambios.<br>
      <ul>
        @foreach ($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-success mb-4">
          <div class="card-header  border-success" id="header">
            <h4><strong>Editar proyecto</strong></h4> 
          </div>
          <form action="{{route('proyecto.update',$proyecto->id)}}" method="post">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-md-12">
                  <strong><label>Nombre:</label></strong>
                  <input value={{$proyecto-> nombre}} id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"required  >
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <strong><label>Descripcion:</label></strong>
                  <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" style="width: 100%; resize: none">{{$proyecto->descripcion}}</textarea>
                  @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                <strong><label>#Buscador:</label></strong>
                <input id="buscador" type="text" class="form-control @error('buscador') is-invalid @enderror" name="buscador"  required value={{$proyecto->buscador}}>
                @error('buscador')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-group row">
                <div class="col-md-12">
                  <br>
                  <strong><label>Fecha de entrega:</label></strong>
                  <input  id="fechaEntrega" type="date" class="form-control @error('fechaEntrega') is-invalid @enderror" name="fechaEntrega"  required value= {{$proyecto->fechaFin}}>
                  @error('fechaEntrega')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-group row">
                <div class="col-md-12">  
                  <br>   
                 <strong><label>Responsable:</label></strong>          
                  <select  id="responsable" type="text" class="form-control @error('responsable') is-invalid @enderror" name="responsable" value={{$proyecto->responsable}}>
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
              <div class="form-group row" style="height: 8px;">
                <div class="col-md-12"> 
                  &nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-success">Guardar</button>
                  &nbsp;&nbsp;
                  <a class="btn btn-danger"href="/proyecto">cancelar</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
