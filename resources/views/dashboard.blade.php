@extends('layouts.app')

@section('content')

<style>
/* =========================
   FONDO GENERAL
========================= */
body{
    background:#faf8f5;
    font-family:'Segoe UI',sans-serif;
}

/* =========================
   HEADER DASHBOARD
========================= */
.dashboard-header{
    background:linear-gradient(
        135deg,
        #e7a6b6,
        #f1c7d2
    );
    color:white;
    padding:40px;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(231,166,182,.25);
}

.dashboard-header h1,
.dashboard-header h2,
.dashboard-header h3{
    font-weight:700;
    margin-bottom:10px;
}

.dashboard-header p{
    font-size:1rem;
    opacity:.95;
}

/* =========================
   TARJETAS ESTADÍSTICAS
========================= */
.dashboard-card{
    background:white;
    border:none;
    border-radius:25px;
    box-shadow:0 6px 20px rgba(0,0,0,.06);
    transition:.3s;
}

.dashboard-card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 30px rgba(231,166,182,.18);
}

.card-icon{
    font-size:3rem;
    color:#6f7f5d !important;
}

.dashboard-card h2{
    color:#5f6f52;
    font-size:2.5rem;
    font-weight:700;
}

.dashboard-card p{
    color:#6c757d;
}

/* =========================
   TÍTULOS
========================= */
.section-title{
    color:#6f7f5d;
    font-weight:700;
    margin-bottom:20px;
}

/* =========================
   CONTENEDORES
========================= */
.appointments-card{
    background:white;
    border-radius:25px;
    padding:25px;
    box-shadow:0 6px 20px rgba(0,0,0,.06);
}

/* =========================
   BOTONES ACCESO RÁPIDO
========================= */
.quick-btn{
    background:#6f7f5d !important;
    border:none !important;
    color:white !important;
    border-radius:18px;
    padding:14px;
    font-weight:600;
    transition:.3s;
}

.quick-btn:hover{
    background:#e7a6b6 !important;
    color:white !important;
    transform:translateY(-3px);
}

/* =========================
   TABLAS
========================= */
.table{
    margin-bottom:0;
}

.table thead{
    background:#f8e6eb;
}

.table thead th{
    color:#6f7f5d;
    font-weight:700;
    border:none;
}

.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover{
    background:#fdf4f7;
}

.table td{
    vertical-align:middle;
}

/* =========================
   CABECERAS DE TARJETAS
========================= */
.card-header{
    background:#6f7f5d !important;
    color:white !important;
    border:none !important;
    font-weight:600;
}

/* =========================
   ALERTAS
========================= */
.alert-info{
    background:#eef7f1;
    border:1px solid #d5e5d7;
    color:#5f6f52;
    border-radius:15px;
}

/* =========================
   BADGES
========================= */
.badge-confirmada{
    background:#6f7f5d;
    color:white;
    padding:8px 14px;
    border-radius:20px;
}

.badge-pendiente{
    background:#e7a6b6;
    color:white;
    padding:8px 14px;
    border-radius:20px;
}

.badge-cancelada{
    background:#c85c5c;
    color:white;
    padding:8px 14px;
    border-radius:20px;
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:768px){

    .dashboard-header{
        padding:25px;
        text-align:center;
    }

    .dashboard-card h2{
        font-size:2rem;
    }

    .quick-btn{
        margin-bottom:10px;
    }
}
</style>



<div class="container-lg py-4">

    @if(Auth::user()->role && Auth::user()->role->name === 'admin')

<div class="dashboard-header mb-4">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-2">
                <i class="bi bi-speedometer2"></i>
                Panel Administrativo
            </h1>

            <p class="mb-0">
                Bienvenido, {{ Auth::user()->name }}
            </p>

        </div>

        <i class="bi bi-stars"
           style="font-size:60px;"></i>

    </div>

</div>

<!-- TARJETAS -->
<div class="row g-4">

    <div class="col-md-3">

        <div class="card dashboard-card">

            <div class="card-body text-center">

                <i class="bi bi-people-fill card-icon"></i>

                <h2 class="mt-3">
                    {{ $usuarios }}
                </h2>

                <p>Usuarios</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card dashboard-card">

            <div class="card-body text-center">

                <i class="bi bi-calendar-check-fill card-icon"></i>

                <h2 class="mt-3">
                    {{ $citas }}
                </h2>

                <p>Citas</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card dashboard-card">

            <div class="card-body text-center">

                <i class="bi bi-stars card-icon"></i>

                <h2 class="mt-3">
                    {{ $servicios }}
                </h2>

                <p>Servicios</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card dashboard-card">

            <div class="card-body text-center">

                <i class="bi bi-box-seam-fill card-icon"></i>

                <h2 class="mt-3">
                    {{ $productos }}
                </h2>

                <p>Inventario</p>

            </div>

        </div>

    </div>

</div>

<!-- ACCESOS RAPIDOS -->
<div class="appointments-card mt-4">

    <h4 class="section-title">

        <i class="bi bi-lightning-charge-fill"></i>
        Accesos rápidos

    </h4>

    <div class="row g-3">

        <div class="col-md-3">
            <a href="{{ route('users.index') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-people-fill"></i>
                Usuarios

            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('appointments.index') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-calendar-check-fill"></i>
                Citas

            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('services.index') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-stars"></i>
                Servicios

            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('inventory.index') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-box-seam-fill"></i>
                Inventario

            </a>
        </div>

    </div>

</div>

<!-- REPORTES -->
<div class="appointments-card mt-4">

    <h4 class="section-title">
        <i class="bi bi-file-earmark-bar-graph-fill"></i>
        Reportes
    </h4>

    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ route('reportes.citas') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-calendar-check"></i>
                Últimas Citas

            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('reportes.servicios') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-stars"></i>
                Servicios Más Solicitados

            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('reportes.especialistas') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-person-heart"></i>
                Especialistas Más Solicitadas

            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('reportes.inventario') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-exclamation-triangle-fill"></i>
                Inventario Bajo

            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('reportes.ingresos') }}"
               class="btn quick-btn w-100">

                <i class="bi bi-cash-stack"></i>
                Ingresos Estimados

            </a>
        </div>

    </div>

</div>

<!-- ULTIMAS CITAS -->
<div class="appointments-card mt-4">

    <h4 class="section-title">
        <i class="bi bi-calendar-heart"></i>
        Últimas citas registradas
    </h4>

    @if($ultimasCitas->count())

    <div class="table-responsive">

        <table class="table">

            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>

            @foreach($ultimasCitas as $cita)

                <tr>
                    <td>{{ $cita->user->name ?? 'N/A' }}</td>
                    <td>{{ $cita->service->name ?? 'N/A' }}</td>
                    <td>{{ $cita->date }}</td>
                    <td>{{ $cita->time }}</td>

                    <td>

                        @if(strtolower($cita->status) == 'confirmada')

                            <span class="badge-confirmada">
                                Confirmada
                            </span>

                        @elseif(strtolower($cita->status) == 'pendiente')

                            <span class="badge-pendiente">
                                Pendiente
                            </span>

                        @else

                            <span class="badge-cancelada">
                                Cancelada
                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="text-end mt-3">
        <a href="{{ route('reportes.citas') }}"
           class="btn btn-success">
            <i class="bi bi-file-earmark-text"></i>
            Ver reporte detallado
        </a>
    </div>

    @else

    <div class="alert alert-info">
        No hay citas registradas.
    </div>

    @endif

</div>

        </div>

    @else

     <!-- Dashboard Cliente -->

<div class="dashboard-header mb-5">

    <h1>
        <i class="bi bi-heart-fill"></i>
        Bienvenida a SPA LAS DIVINAS
    </h1>

    <p>
        Hola {{ Auth::user()->name }},
        administra tus citas y tu perfil desde aquí.
    </p>

</div>

<div class="row g-4 justify-content-center">

    <!-- PERFIL -->
    <div class="col-md-4">

        <div class="card dashboard-card text-center h-100">

            <div class="card-body p-4">

                <i class="bi bi-person-circle"
                   style="font-size:70px;color:#e7a6b6;">
                </i>

                <h3 class="mt-3">
                    Mi Perfil
                </h3>

                <p>
                    Actualiza tus datos personales.
                </p>

                <a href="{{ route('profile.edit') }}"
                   class="btn quick-btn">

                    Ver Perfil

                </a>

            </div>

        </div>

    </div>

    <!-- MIS CITAS -->
    <div class="col-md-4">

        <div class="card dashboard-card text-center h-100">

            <div class="card-body p-4">

                <i class="bi bi-calendar-heart"
                   style="font-size:70px;color:#e7a6b6;">
                </i>

                <h3 class="mt-3">
                    Mis Citas
                </h3>

                <p>
                    Consulta tus reservas.
                </p>

                <a href="{{ route('appointments.index') }}"
                   class="btn quick-btn">

                    Ver Citas

                </a>

            </div>

        </div>

    </div>

    <!-- SERVICIOS -->
    <div class="col-md-4">

        <div class="card dashboard-card text-center h-100">

            <div class="card-body p-4">

                <i class="bi bi-gem"
                   style="font-size:70px;color:#e7a6b6;">
                </i>

                <h3 class="mt-3">
                    Servicios
                </h3>

                <p>
                    Explora nuestro catálogo.
                </p>

                <a href="{{ route('services.index') }}"
                   class="btn quick-btn">

                    Ver Catálogo

                </a>

            </div>

        </div>

    </div>

    <!-- BOLSA -->
    <div class="col-md-4">

        <div class="card dashboard-card text-center h-100">

            <div class="card-body p-4">

                <i class="bi bi-bag-heart-fill"
                   style="font-size:70px;color:#e7a6b6;">
                </i>

                <h3 class="mt-3">
                    Mi Bolsa
                </h3>

                <p>
                    Revisa tus productos y servicios.
                </p>

                <a href="{{ route('cart.index') }}"
                   class="btn quick-btn">

                    <i class="bi bi-bag-check"></i> Ver Bolsa

                </a>

            </div>

        </div>

    </div>

</div>

<!-- ÚLTIMAS CITAS -->

<div class="appointments-card mt-4">

    <h4 class="section-title">

        <i class="bi bi-calendar-heart"></i>
        Mis últimas citas

    </h4>

    @if(isset($misCitas) && $misCitas->count())

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($misCitas as $cita)

                        <tr>

                            <td>{{ $cita->date }}</td>

                            <td>{{ $cita->time }}</td>

                            <td>

                                @if(strtolower($cita->status) == 'confirmada')

                                    <span class="badge-confirmada">
                                        Confirmada
                                    </span>

                                @elseif(strtolower($cita->status) == 'pendiente')

                                    <span class="badge-pendiente">
                                        Pendiente
                                    </span>

                                @else

                                    <span class="badge-cancelada">
                                        Cancelada
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="alert alert-info">

            No tienes citas registradas.

        </div>

    @endif

</div>
    @endif

</div>

@endsection
