<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: rgb(179, 220, 221);">
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand navbar-brand-logo" href="/admin">
            <div class = "logo">
                <img src = "https://image.flaticon.com/icons/svg/25/25694.svg" style="width:30px">
                <strong><label style="font-size:11pt">home</label></strong>
            </div>
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <strong><a class="nav-link" href="/proyecto">Proyectos</a></strong>
            </li>
            <li class="nav-item">
                <strong><a class="nav-link" href="/tarea">Tareas</a></strong>
            </li>
        </ul>
      
    </div>                      
   
    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"  aria-expanded="false" v-pre style="color:black">
        <div>
            {{ Auth::user()->name }} 
            <img src = "https://image.flaticon.com/icons/svg/236/236832.svg " style="width:30px">

        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a href="/profile" class="dropdown-item line-primary">Perfil</a>
        <a class="dropdown-item outline-primary" href="/user">Administrar</a>
        <a class="dropdown-item outline-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Cerrar sesion    
        
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div> 
  
</nav>