<nav class="navbar navbar-expand-lg navbar-light bg-light m-3">
  <h1 class="navbar-brand" href="#">The Aulab Post</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @auth
      <li class="nav-item dropdown active col-2">
        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="NavbarDropdown" style="margin-right:50px;">
          Ciao {{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu " aria-Labelledby="NavbarDropdown">
          <li ><a class="dropdown-item" href="#" >Profilo</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li ><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();" id="multiCollapse1">Logout</a></li>
          <form method="POST" action="{{route('logout')}}" id="form-logout">
            @csrf 
          </form>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
      </li>
      @endauth
      @guest
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="NavbarDropdown" style="margin-right:50px;">
          Benvenuto ospite
        </a>
        <ul class="dropdown-menu " aria-Labelledby="NavbarDropdown">
          <li ><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="{{route('login')}}" >Accedi</a></li>
        </ul>
      @endguest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline d-flex my-2 my-lg-0" style="background-origin:border-box;">
      <input class="form-control  mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
    </form>
  </div>
</nav>


