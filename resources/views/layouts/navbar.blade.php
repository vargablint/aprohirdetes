<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mx-auto" href="{{ url('/') }}">
    <h1 class="hub-text">HUB</h1>
  </a>
  <div class="container">
   
    <!-- Kategóriák -->
    <ul class="navbar-nav ml-auto">
      <form class="d-flex" action="#" method="GET">
        <input class="form-control me-2" type="search" placeholder="Keresés..." aria-label="Keresés" name="query">
        <button class="btn btn-outline-success" type="submit">Keresés</button>
      </form>
      
      <!-- Női kategória dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Nő
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{route('kategoria','1')}}">Ruha</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','2')}}">Parfüm</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','3')}}">Kiegészítők</a></li>
        </ul>
      </li>

      <!-- Férfi kategória dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Férfi
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{route('kategoria','4')}}">Ruha</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','5')}}">Parfüm</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','6')}}">Kiegészítők</a></li>
        </ul>
      </li>

      <!-- Otthon kategória dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Otthon
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{route('kategoria','7')}}">Bútor</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','8')}}">Dekoráció</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','9')}}">Háztartási eszközök</a></li>
        </ul>
      </li>

      <!-- Elektronikai eszközök kategória dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Elektronikai eszközök
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{route('kategoria','10')}}">Mobiltelefonok</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','11')}}">Laptopok</a></li>
          <li><a class="dropdown-item" href="{{route('kategoria','12')}}">Kiegészítők</a></li>
        </ul>
      </li>

      <!-- Rólunk fül -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('rolunk')}}">Rólunk</a>
      </li>
      
      <!-- Login és Regisztráció gombok / vagy Logout -->
      @if (Auth::check())
      <!-- Ha a felhasználó be van jelentkezve -->
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </li>
      @else
      <!-- Ha a felhasználó nincs bejelentkezve -->
      <li class="nav-item">
        <a class="nav-link btn btn-primary text-white" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-secondary text-white" href="{{ route('register') }}">Regisztráció</a>
      </li>
      @endif
    </ul>
  </div>
</nav>
