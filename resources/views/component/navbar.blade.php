<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-user-astronaut"></i> {{ $title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house-chimney"></i> Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('map') }}"><i class="fa-sharp-duotone fa-regular fa-map"></i> Peta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tabel') }}"><i class="fa-solid fa-table-list"></i> Tabel</a>
                </li>

                {{-- Jika user login atau tidak --}}
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-database"></i> Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('api.points') }}" target="blank"> <i
                                    class="fa-solid fa-location-dot"></i> Marker GeoJSON</a></li>

                        <li><a class="dropdown-item" href="{{ route('api.polyline') }}"> <i
                                    class="fa-solid fa-grip-lines"></i> Polyline GeoJSON</a></li>

                        <li><a class="dropdown-item" href="{{ route('api.polygon') }}"> <i
                                    class="fa-solid fa-draw-polygon"></i> Polygon GeoJSON</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
            <!-- Right side logout button -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-danger"><i
                                    class="fa-solid fa-right-from-bracket"></i> Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{route('login')}}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
