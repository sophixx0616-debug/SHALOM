@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

/* FONDO */
body{
    background:linear-gradient(
        135deg,
        #faf8f5,
        #fdf1f4
    );
}

/* TITULO */
.page-title{    
    color:#6f7f5d;
    font-size:55px;
    font-weight:700;
}

/* TARJETAS */
.glass-card{
    background:rgba(255,255,255,.90);
    backdrop-filter:blur(12px);
    border:none;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* TARJETA IZQUIERDA */
.spa-card{
    transition:.4s;
}

.spa-card:hover{
    transform:translateY(-8px);
}

/* HEADER FORM */
.form-header{
    background:linear-gradient(
        135deg,
        #8fae73,
        #6f7f5d
    );
}

/* INPUTS */
.form-control,
.form-select{
    border-radius:15px;
    border:1px solid #e7a6b6;
}

.form-control:focus,
.form-select:focus{
    border-color:#8fae73;
    box-shadow:0 0 0 .25rem rgba(143,174,115,.25);
}

/* BOTON */
.btn-divinas{
    background:#6f7f5d;
    color:white;
    border:none;
    border-radius:15px;
    padding:14px 30px;
    font-weight:600;
    transition:.3s;
}

.btn-divinas:hover{
    background:#e7a6b6;
    color:white;
    transform:translateY(-3px);
}

/* HORAS OCUPADAS */
option:disabled{
    color:#dc3545;
    font-weight:bold;
}

/* RESPONSIVE */
@media(max-width:768px){

    .page-title{
        font-size:38px;
    }

}

</style>

<div class="container py-4">

    <h1 class="text-center page-title mb-5">
        <i class="bi bi-calendar-heart-fill"></i>
        Reserva Tu Cita
    </h1>

    <div class="row">

        <!-- COLUMNA IZQUIERDA -->
        <div class="col-md-4 mb-4">

            <div class="card glass-card spa-card">

                <div class="card-body text-center p-4">

                    <img src="{{ asset('images/spa.jpg') }}"
                         class="img-fluid rounded-4 mb-3"
                         alt="SPA LAS DIVINAS">

                    <h4 style="color:#6f7f5d;">
                        Belleza & Bienestar
                    </h4>

                    <p class="text-muted">
                        Agenda fácilmente tu cita en
                        SPA LAS DIVINAS
                    </p>

                </div>

            </div>

        </div>

        <!-- FORMULARIO -->
        <div class="col-md-8">

            <div class="card glass-card">

                <div class="card-header text-white py-4 form-header">

                    <h4 class="mb-0">
                        <i class="bi bi-journal-check"></i>
                        Datos de la cita
                    </h4>

                </div>

                <div class="card-body p-4">

                    @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                    @endif

                    <form action="{{ route('appointments.store') }}" method="POST">

                        @csrf

                        <!-- SERVICIO -->
                        <div class="mb-4">

                            <label class="fw-bold mb-2">

                                <i class="bi bi-scissors"></i>
                                Servicio

                            </label>

                            <select name="service_id"
                                    class="form-select form-select-lg"
                                    required>

                                @foreach($services as $service)

                                    <option value="{{ $service->id }}">
                                        {{ $service->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- FECHA -->
                        <div class="mb-4">

                            <label class="fw-bold mb-2">

                                <i class="bi bi-calendar-event"></i>
                                Fecha

                            </label>

                            <input type="date"
                                   name="date"
                                   min="{{ date('Y-m-d') }}"
                                   class="form-control form-control-lg"
                                   required>

                        </div>

                        <!-- HORA -->
                        <div class="mb-4">

                            <label class="fw-bold mb-2">

                                <i class="bi bi-clock-history"></i>
                                Hora Disponible

                            </label>

                            @php
                                $hours = [
                                    '08:00',
                                    '09:00',
                                    '10:00',
                                    '11:00',
                                    '12:00',
                                    '14:00',
                                    '15:00',
                                    '16:00'
                                ];
                            @endphp

                            <select name="time"
                                    class="form-select form-select-lg"
                                    required>

                                @foreach($hours as $hour)

                                <option value="{{ $hour }}"
                                {{ in_array($hour, $takenTimes ?? []) ? 'disabled' : '' }}>

                                    {{ $hour }}

                                    {{ in_array($hour, $takenTimes ?? []) ? '(ocupado)' : '' }}

                                </option>

                                @endforeach

                            </select>

                        <!-- ESPECIALISTA -->
<div class="mb-4">

    <label class="fw-bold mb-2">

        <i class="bi bi-person-badge-fill"
           style="color:#6f7f5d;"></i>

        Especialista

    </label>

    <select name="worker"
            class="form-select form-select-lg"
            required>

        <option value="">
            Seleccione una especialista
        </option>

        @foreach($specialists as $specialist)

            <option value="{{ $specialist->name }}">
                {{ $specialist->name }} - {{ $specialist->specialty }}
            </option>

        @endforeach

    </select>

</div>

<!-- INFORMACIÓN -->
<div class="alert alert-light border mb-4">

    <h5 class="mb-3">

        <i class="bi bi-stars"
           style="color:#e7a6b6;"></i>

        Nuestras Especialistas

    </h5>

    @foreach($specialists as $specialist)

        <p class="mb-2">

            <i class="bi bi-person-heart me-2"
               style="color:#6f7f5d;"></i>

            <strong>{{ $specialist->name }}:</strong>
            {{ $specialist->specialty }}

        </p>

    @endforeach

</div>

                        <!-- BOTONES -->
                        <div class="d-flex gap-3">

                            <button type="submit"
                                    class="btn btn-divinas">

                                <i class="bi bi-check-circle-fill"></i>
                                Confirmar Reserva

                            </button>

                            <a href="{{ route('appointments.index') }}"
                               class="btn btn-outline-secondary btn-lg">

                                <i class="bi bi-x-circle"></i>
                                Cancelar

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
