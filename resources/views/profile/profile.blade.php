@extends('layouts.app')
@extends('header.header')
@section('content')
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- <div class="card"> -->
                    <center><img src = "https://image.flaticon.com/icons/svg/236/236832.svg " style="width:150px"></center>
                    <!-- <input type="file" name="profile" id="profile"> -->
                <!-- </div> -->
                <div class="col-md-12">
                    <hr>
                    <h3>Nombre:</h3>
                    <h5>{{ Auth::user()->name }} </h5><hr>
                    <h3>Apellido paterno:</h3>
                    <h5>{{ Auth::user()->ap_pat }}</h5><hr>
                    <h3>Correo electronico:</h3>
                    <h5>{{ Auth::user()->email }}</h5><hr>
                </div>
              
            </div>  
           
        </div>
        <!-- <a class="btn btn-dark" href="/admin">volver</a> -->
    </div>
</body>
@endsection
