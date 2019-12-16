@extends('layouts.app')
@extends('header.header')
@section('content')

<style>
    h3{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20pt;
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
    body{
      /* background-image: url(https://cdn.pixabay.com/photo/2016/11/23/15/23/cosmos-1853491_960_720.jpg);
      color:white; */
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
            <strong><h3>Lista de Proyecto</h3></strong>
        </div>
        <form class="form-inline" >
            <input class="form-control @error('buscar') is-invalid @enderror " required type="text" placeholder="buscar" name="buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
            &nbsp;
            <select id="mostrar" type="text" class="form-control @error('mostrar') is-invalid @enderror" name="mostrar" required autocomplete="mostrar">
                <option>--mostrar--</option >
                <option>Fecha de creacion</option >
                <option>Fecha de entrega</option >
                <option>Responsable</option >
                <option>Orden alfabetico</option >
            </select>
            &nbsp;
            <a class="btn btn-primary" href="{{ route('proyecto.create') }}">Nuevo proyecto</a>
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
                        <!-- <th scope="col">Descripcion</th> -->
                        <th scope="col">Responsable</th>
                        <th scope="col">fecha de creacion</th>
                        <th scope="col">fecha de entrega</th>
                        <th scope="col">tareas</th>
                        <th scope="col">status</th>
                        
                        <th scope="col">ver</th>
                        <!-- <th scope="col"></th> -->
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $proyecto)
                        <tr>
                            <th scope="row"><b>{{++$i}}.</b></th>
                            <td>{{$proyecto->nombre}}</td>
                            <!-- <td>{{$proyecto->descripcion}}</td> -->
                            <td>{{$proyecto->responsable}}</td>
                            <td>{{$proyecto->created_at}}</td>
                            <td>{{$proyecto->fechaFin}}</td>
                            <td>2/15</td>
                            <td><span class="badge badge-primary">en proceso</span></td>
                            <td>
                                <!-- <button  class="btn btn-link" id="btn"> -->
                                    <a href="{{route('proyecto.show',$proyecto->id)}}">
                                        <div>
                                            <img src="https://image.flaticon.com/icons/svg/25/25186.svg" style="width: 25px">
                                        </div>
                                    </a>
                                <!-- </button> -->
                            </td>
                            <td>
                                <!-- <button  class="btn btn-link" id="btn"> -->
                                    <a href="{{route('proyecto.edit',$proyecto->id)}}" >
                                        <div>
                                            <img src="https://image.flaticon.com/icons/svg/32/32355.svg" style="width:20px;margin-left: 10px">
                                        </div>
                                    </a>
                                <!-- </button>  -->
                            </td>
                            <!-- <td>
                                <form action="{{ route('proyecto.destroy', $proyecto->id) }}" method="POST">   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link" type="submit" id="btn2">
                                        <div >
                                            <img src="https://image.flaticon.com/icons/svg/1632/1632708.svg" style="width: 20px">
                                        </div>
                                    </button>            
                                </form> 
                            </td>   -->
                            <!-- <td></td> -->
                        </tr>
                    @endforeach
     
                </tbody>
            </table> 
            
            {{ $proyectos->links() }}
              
        </div> 
    </div>
</div>

@endsection