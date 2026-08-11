<nav class="navbar navbar-expand-lg navbar-light navbar-divinas">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            SPA LAS DIVINAS
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>
        <style>
            /* NAVBAR LAS DIVINAS */

.navbar-divinas{
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    margin: 20px auto;
    padding: 12px 25px;
    box-shadow: 0 5px 20px rgba(0,0,0,.08);
}

.navbar-brand{
    color: #6f7f5d !important;
    font-size: 28px;
    font-weight: 700;
}

.navbar-brand:hover{
    color: #e7a6b6 !important;
}

.nav-link{
    color: #5f6f52 !important;
    font-weight: 500;
    margin: 0 8px;
    transition: .3s;
}

.nav-link:hover{
    color: #e7a6b6 !important;
}

.nav-link i{
    margin-right: 8px;
}

.btn-logout{
    background: none;
    border: none;
    color: #5f6f52;
    font-weight: 500;
    transition: .3s;
}

.btn-logout:hover{
    color: #e7a6b6;
}

.navbar-toggler{
    border: none;
}

.navbar-toggler:focus{
    box-shadow: none;
}
            </style>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                @auth

                    {{-- Dashboard para todos --}}
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-chart-line"></i> Dashboard
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('profile.edit') }}">
        <i class="fas fa-user"></i> Mi Perfil
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('appointments.index') }}">
        <i class="fas fa-calendar-check"></i> Mis Citas
    </a>
</li>

<li class="nav-item position-relative">
    <a class="nav-link" href="{{ route('cart.index') }}">
        <i class="fas fa-shopping-bag"></i> Bolsa
        @if(session('cart') && count(session('cart')) > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">
                {{ count(session('cart')) }}
            </span>
        @endif
    </a>
</li>

                    {{-- Servicios y Especialistas (todos los usuarios) --}}
<li class="nav-item">
    <a class="nav-link" href="{{ route('services.index') }}">
        <i class="fas fa-spa"></i> Servicios
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('specialists.index') }}">
        <i class="fas fa-user-tie"></i> Especialistas
    </a>
</li>

                    {{-- Opciones exclusivas del administrador --}}
                    @if(Auth::user()->role && Auth::user()->role->name === 'admin')
<li class="nav-item">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-users"></i> Usuarios
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('inventory.index') }}">
        <i class="fas fa-box"></i> Inventario
    </a>
</li>
                    @endif

                    <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <button type="button" class="btn-logout nav-link" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt"></i> Salir
        </button>
    </form>
</li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Ingresar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Registrarse
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('business.whatsapp_url') }}"
                           target="_blank"
                           style="color:#25d366 !important;">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    </li>

                @endauth

            </ul>

        </div>

    </div>
</nav>