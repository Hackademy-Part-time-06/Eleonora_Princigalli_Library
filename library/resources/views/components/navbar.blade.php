<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="#">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('books.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('categories.index')}}">Categorie</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Clicca qua
                        </a>

                        @auth

                            <ul class="dropdown-menu">

                                Ciao, {{ Auth::user()->name }}
                                <form id="form-logout" method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                    </li>

                                </form>
                            @else
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                </ul>
                            </ul>
                        @endauth
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
