@extends('layouts.app')
@extends('header.header')

@section('content')

<style>
    h3{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20pt;
    }
    .center{
        text-align: center;
    }
    #btn{
       height: 3px;
       width: 5px;
    }
    #btn2{
        height: 3px;
        width: 5px;
        margin-left: 0px;
    }
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
            <strong><h3>Usuarios registrados</h3></strong>
        </div>
        <form class="form-inline" >
            <input class="form-control @error('buscar') is-invalid @enderror " required type="text" placeholder="buscar" name="buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
            &nbsp;
            <!-- <a class="btn btn-primary" href="{{ route('proyecto.create') }}">Nuevo proyecto</a> -->
        </form>
    </div>
</div>
<div class="container">
   
    <div class="row">
        <div class="table-responsive">  
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                        <tr>
                            <th scope="row"><b>{{++$i}}.</b></th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if($user->is_admin == 1)
                                <td>Administrador</td>
                            @endif
                            @if($user->is_admin !=1)
                                <td>Usuario</td>
                            @endif
                            <td><div class="btn btn-primary">editar</div></td>
                            
                        </tr>
                    @endforeach
     
                </tbody>
            </table> 
            
            {{ $usuarios->links() }}
              
        </div> 
    </div>
</div>

@endsection