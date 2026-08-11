<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las Divinas Nails Spa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<style>

:root{
    --verde:#7a9471;
    --verde-oscuro:#486148;
    --rosa:#f6d6df;
    --crema:#fff8f2;
    --blanco:#ffffff;
}

body{
    font-family:'Poppins',sans-serif;

    background:
    radial-gradient(circle at 10% 20%, rgba(224,163,182,.35), transparent 40%),
    radial-gradient(circle at 85% 10%, rgba(255,220,230,.30), transparent 45%),
    radial-gradient(circle at 30% 80%, rgba(245,210,220,.25), transparent 45%),
    radial-gradient(circle at 90% 85%, rgba(240,230,215,.25), transparent 50%),

    linear-gradient(180deg, #fff8f5, #faf6f3);
}
.background-blobs{
    position:fixed;
    inset:0;
    z-index:-1;
    pointer-events:none;

    background:

    radial-gradient(
        circle at 15% 20%,
        rgba(240,190,205,.35),
        transparent 25%
    ),

    radial-gradient(
        circle at 85% 15%,
        rgba(255,220,230,.35),
        transparent 20%
    ),

    radial-gradient(
        circle at 70% 75%,
        rgba(240,210,220,.30),
        transparent 25%
    ),

    radial-gradient(
        circle at 20% 85%,
        rgba(255,230,220,.35),
        transparent 20%
    );
}


.main-wrapper{
    background:rgba(255,255,255,.85);
     backdrop-filter:blur(8px);
    max-width:1400px;
    margin:30px auto;
   border-radius:40px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    position:relative;
}
@keyframes floatFlower {
  0% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-15px) rotate(2deg); }
  100% { transform: translateY(0px) rotate(0deg); }
}

.flor-izquierda{
    position:absolute;
    left:-80px;
    top:120px;
   width:480px;
    opacity:.25;
    z-index:0;
    mix-blend-mode: multiply;
    filter: drop-shadow(0 0 40px rgba(224,163,182,.25));
     animation: floatFlower 6s ease-in-out infinite;
}

.flor-derecha{
    position:absolute;
    right:-80px;
    top:80px;
   width:480px;
    opacity:.25;
    z-index:0;
    mix-blend-mode: multiply;
    filter: drop-shadow(0 0 40px rgba(224,163,182,.25));
     animation: floatFlower 6s ease-in-out infinite;
}
h1,h2,h3,h4,h5{
    font-family:'Playfair Display',serif;
}

.navbar{
    background:white;
    border-radius:50px;
    margin:20px auto;
    max-width:1200px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.navbar-brand{
    font-family:'Playfair Display',serif;
    font-size:2rem;
    font-weight:700;
    color:var(--verde)!important;
}

.hero{
    min-height:700px;
    display:flex;
    align-items:center;
     padding-top:20px;
}
.hero-title{
    font-size:5.5rem;
    line-height:1;
    font-weight:700;
}

.hero-subtitle{
    font-size:3rem;
    color:#e0a3b6;
    font-family:'Playfair Display',serif;
    font-weight:700;
}

.slogan{
    font-family:'Great Vibes',cursive;
    font-size:4.5rem;
    color:#e0a3b6;
    margin-bottom:15px;
}

.galeria-hero{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
}

.galeria-hero img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:25px;
}

.galeria-hero img:hover{
    transform:translateY(-6px) scale(1.02);
}
.btn-divinas{
    background:var(--verde);
    color:white;
    border:none;
    border-radius:50px;
    padding:14px 35px;
}

.btn-divinas:hover{
    background:var(--verde-oscuro);
    color:white;
}

.section-title{
    font-family:'Great Vibes',cursive;
    font-size:4.5rem;
    color:#7a8a67;
    text-align:center;
    margin-bottom:50px;
    letter-spacing:1px;
}



.service-card{
    border:none;
    border-radius:35px;
    padding:40px 30px;
    background:white;
    min-height:280px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.06);

    transition:.4s ease;
}
.service-card:hover{
    transform:translateY(-12px);
    box-shadow:
    0 20px 40px rgba(0,0,0,.10);
}
.service-icon{
    font-size:4rem;
    color:#e0a3b6;
    display:block;
    margin-bottom:20px;
}
.service-card h4{
    color:#6f7f5f;
    font-weight:700;
}
.subtitle-services{
    text-align:center;
    color:#d89caf;
    font-family:'Great Vibes',cursive;
    font-size:2rem;
    margin-top:-25px;
    margin-bottom:40px;
}
.fidelidad{
    background:linear-gradient(
        135deg,
        #f6f7ef,
        #edf2e6
    );

    border-radius:30px;
    padding:35px;
    position:relative;
    overflow:hidden;
}

.fidelidad img{
    transition:.4s;
}

.fidelidad img:hover{
    transform:scale(1.03);
}
.card-testimonio{
    background:white;
    border-radius:25px;
    padding:25px;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}
.contacto{
    background:linear-gradient(
        135deg,
        var(--verde),
        #8da683
    );
    color:white;
    border-radius:30px;
}

footer{
    background:#f8f4ef;
    margin-top:80px;
    position:relative;
    padding-top:80px;
    border-top-left-radius:60px;
    border-top-right-radius:60px;
}


footer::before{
    content:"";
    position:absolute;
    top:-40px;
    left:0;
    width:100%;
    height:80px;
    background:#f8f4ef;
    border-radius:100% 100% 0 0;
}
.redes i{
    color:#7a9471;
    transition:.3s;
}

.redes i:hover{
    color:#e0a3b6;
    transform:translateY(-4px);
}
.social-icon{
    width:50px;
    height:50px;
    background:white;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}
.beneficio-card{
    background:white;
    border-radius:30px;
    padding:25px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.beneficio-card img{
    border-radius:20px;
    margin-top:15px;
}

.beneficio-card i{
    font-size:2rem;
    color:#e0a3b6;
}
img{
    border-radius:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

</style>

</head>

<body>
    <div class="background-blobs"></div>
<div class="main-wrapper">
    <img src="{{ asset('img/flores.png') }}"
     class="flor-izquierda">

<img src="{{ asset('img/flores1.png') }}"
     class="flor-derecha">
<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <img src="{{ asset('img/logo.png') }}"
     alt="Las Divinas"
     style="height:70px;">

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="#servicios" class="nav-link">
                        Servicios
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#fidelidad" class="nav-link">
                        Fidelidad
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#contacto" class="nav-link">
                        Contacto
                    </a>
                </li>
            <!-- Carrito de Compras (Fusión Las Divinas) -->
            <a href="{{ route('cart.index') }}" class="nav-link position-relative ms-3 me-2">
                <i class="bi bi-bag-heart-fill" style="font-size: 1.4rem; color: #e7a6b6;"></i>
    
                {{-- Burbuja con contador (Coherencia) --}}
                @if(session('cart') && count(session('cart')) > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
            {{ count(session('cart')) }}
            </span>
            @endif
                    </a>

                @auth

                <li class="nav-item ms-2">
                    <a href="{{ route('dashboard') }}"
                       class="btn btn-success">
                        Dashboard
                    </a>
                </li>

                @else

                <li class="nav-item ms-2">
                    <a href="{{ route('login') }}"
                       class="btn btn-success">
                        Iniciar Sesión
                    </a>
                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="container text-center">

  <div class="row align-items-center">


   <div class="col-lg-5 text-start">

       <span class="slogan">
    Resalta tu belleza ♥
</span>

<h1 class="hero-title">
    LAS DIVINAS
</h1>

<h2 class="hero-subtitle">
    NAILS SPA
</h2>

<p class="mt-4 fs-5">
    Cuidamos tus manos, realizamos tu estilo.
    <br>
    Uñas perfectas, detalles que enamoran.
</p>

<a href="#contacto" class="btn btn-divinas btn-lg mt-3">
    RESERVA TU CITA
</a>

    </div>

    <div class="col-lg-7">


   <div class="galeria-hero">

    <img src="{{ asset('img/uñas1.jpg') }}" alt="Diseño 1">

    <img src="{{ asset('img/uñas2.jpg') }}" alt="Diseño 2">

    <img src="{{ asset('img/uñas3.jpg') }}" alt="Diseño 3">

    <img src="{{ asset('img/uñas4.jpg') }}" alt="Diseño 4">

</div>
</div>

        </div>

    </div>

</div>

        <div class="redes text-center">

    <i class="bi bi-instagram fs-2 mx-2"></i>
    <i class="bi bi-facebook fs-2 mx-2"></i>
    <i class="bi bi-whatsapp fs-2 mx-2"></i>

</div>

    </div>

</section>
<section class="beneficios py-5">

<div class="container">

<div class="row g-4">

<div class="col-md-4">

<div class="beneficio-card">

<i class="bi bi-brush"></i>

<h5>Diseños Exclusivos</h5>

<p>
Creamos diseños únicos que reflejan tu personalidad.
</p>

<img src="{{ asset('img/diseño.jpg') }}"
     class="img-fluid">

</div>

</div>

<div class="col-md-4">

<div class="beneficio-card">

<i class="bi bi-gem"></i>

<h5>Productos de Calidad</h5>

<p>
Usamos productos profesionales para resultados impecables.
</p>

<img src="{{ asset('img/calidad.jpg') }}"
     class="img-fluid">

</div>

</div>

<div class="col-md-4">

<div class="beneficio-card">

<i class="bi bi-heart"></i>

<h5>Atención Personalizada</h5>

<p>
Te asesoramos para lograr el diseño perfecto.
</p>

<img src="{{ asset('img/atención.jpg') }}"
     class="img-fluid">

</div>

</div>

</div>

</div>

</section>

<!-- SERVICIOS -->

<section id="servicios" class="py-5">

    <div class="container">

        <h2 class="section-title">
            Nuestros Servicios
        </h2>
        <p class="subtitle-services">
    Porque cada detalle cuenta 
</p>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card service-card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-stars service-icon"></i>

                        <h4 class="mt-3">
                            Manicure
                        </h4>

                        <p>
                            Cuidado profesional para tus manos.
                        </p>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-heart-fill service-icon"></i>
                        <h4 class="mt-3">
                            Pedicure
                        </h4>

                        <p>
                            Relajación y belleza para tus pies.
                        </p>
                        

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card shadow h-100">

                    <div class="card-body text-center">

                       <i class="bi bi-flower1 service-icon"></i>

                        <h4 class="mt-3">
                            Depilación
                        </h4>

                        <p>
                            Resultados suaves y duraderos.
                        </p>

                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- FIDELIDAD -->

<section id="fidelidad" class="py-5">

    <div class="container">

        <div class="fidelidad shadow">

            <div class="row align-items-center">

                <div class="col-lg-6 text-center">

                    <img src="{{ asset('img/tarjeta.png') }}"
                         class="img-fluid rounded-4 shadow">

                </div>

                <div class="col-lg-6">

                   <h2 class="mb-4">
    <i class="bi bi-award-fill me-2"></i>
    Programa de Fidelidad
</h2>

<h4 class="text-success">
    Tu belleza tiene recompensa
</h4>

                    <p class="mt-3">
                        Acumula visitas y recibe premios exclusivos.
                    </p>
                    <p>
    Cada cita suma puntos para que disfrutes
    beneficios, descuentos y sorpresas especiales.
</p>

                   <div class="mt-4">
    <span class="badge rounded-pill bg-success px-4 py-3 fs-6">
        <i class="bi bi-gift-fill me-2"></i>
        Obsequio especial en tu visita número 10
        
    </span>
</div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- TESTIMONIOS -->

<section class="py-5">

    <div class="container">

        <h2 class="section-title">
            Lo que dicen nuestras clientas
            <span class="heart-decoration">♥</span>
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card-testimonio">

                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p>
                        Excelente atención y diseños hermosos.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card-testimonio">

                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p>
                        Mis uñas duran muchísimo.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card-testimonio">

                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p>
                        El lugar es hermoso y muy cómodo.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- CONTACTO -->

<section id="contacto" class="py-5">

    <div class="container">

        <div class="contacto p-5 text-center">

            <h2>Agenda tu cita</h2>

            <p class="mt-3">
                Estamos listas para atenderte.
            </p>

            @guest

            <a href="{{ route('login') }}"
               class="btn btn-light btn-lg">
                Iniciar Sesión
            </a>

            @else

            <a href="{{ route('appointments.index') }}"
               class="btn btn-light btn-lg">
                Ver Citas
            </a>

            @endguest

        </div>

    </div>

</section>

<footer class="py-4">

    <div class="container text-center">

        <h5>Las Divinas Nails Spa</h5>

        <p>Premiamos tu fidelidad</p>

        <div class="fs-3">

            <i class="bi bi-facebook me-3"></i>
            <i class="bi bi-instagram me-3"></i>
            <a href="{{ config('business.whatsapp_url') }}"
               target="_blank"
               style="color:#25d366;text-decoration:none;">
                <i class="bi bi-whatsapp"></i>
            </a>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
