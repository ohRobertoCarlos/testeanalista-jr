
<nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-sm mb-5">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav ms-auto text-white">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item">
                        <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    <li class="nav-item mx-4">
                        <a class="nav-link" id="name-user-logged" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary mr-3" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary mr-3" href="{{ route('admin') }}">Área administrativa</a>
                    </li>

                @endguest
            </ul>
        </div>

</nav>
