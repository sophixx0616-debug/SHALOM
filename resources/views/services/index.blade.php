@extends('layouts.app')

@section('content')

<link href="https://googleapis.com" rel="stylesheet">

<link rel="stylesheet" href="https://jsdelivr.net">

<style>

body{
    background:linear-gradient(to bottom,#ffffff,#fdf1f4);
    font-family:'Poppins',sans-serif;
}

.fuente-elegante{
    font-family:'Playfair Display',serif;
    font-style:italic;
    color:#6f7f5d;
}

.spa-card{
    border:none;
    border-radius:30px;
    background:rgba(255,255,255,.95);
    transition:.3s;
    overflow:hidden;
}

.spa-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.btn-nuevo{
    background:#6f7f5d;
    color:white;
    padding:12px 25px;
    border-radius:15px;
    text-decoration:none;
}

.btn-nuevo:hover{
    background:#5a694b;
    color:white;
}

.precio{
    color:#6f7f5d;
    font-size:28px;
    font-weight:bold;
}

.imagen-servicio{
    width:100%;
    height:220px;
    object-fit:cover;
}

</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="display-4 fuente-elegante">
                Nuestros Servicios
            </h1>

            <p class="text-muted">
                <i class="bi bi-stars"></i>
                Total servicios: {{ $services->count() }}
            </p>

        </div>

        @if(Auth::user()->role->name == 'admin')

            <a href="{{ route('services.create') }}" class="btn-nuevo">

                <i class="bi bi-plus-circle-fill"></i>

                Nuevo Servicio

            </a>

        @endif

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="row">

        @foreach($services as $service)

        @php

                <div class="card h-100 spa-card shadow-sm p-4 text-center d-flex flex-column">
                    
                    <div class="icono-contenedor">

                'Manicure Permanente' => 'manicure permanente.jpg',

                'Pedicure Spa' => 'pedicure.jpg',

                'Uñas Acrílicas (Set Completo)' => 'uñasacrilicas.jpg',

                'Baño de Acrílico' => 'bañoenacrilico.jpg',

                'Retiro de Permanente' => 'retirodepermanente.jpg',

                'Diseño a Mano Alzada' => 'diseñoamanoalzada.jpg',

            ];

            $imagen = $imagenes[$service->name] ?? 'manicure.jpg';

        @endphp

        <div class="col-md-4 mb-4">

            <div class="card spa-card shadow-sm h-100">

                <img src="{{ asset('img/'.$imagen) }}"
                     class="imagen-servicio"
                     alt="{{ $service->name }}">

                <div class="card-body text-center">

                    <h4 class="fuente-elegante">

                        {{ $service->name }}

                    </h4>

                    <p style="color:#e7a6b6;">

                        <i class="bi bi-clock-fill"></i>

                        {{ $service->duration }} min

                    </p>

                    <p class="text-muted">

                        {{ $service->description }}

                    </p>

                    <div class="precio mb-3">

                        ${{ number_format($service->price,0,',','.') }}

                    </div>

                    @if(Auth::user()->role->name=='admin')

                    <div class="d-flex justify-content-center gap-2">

                        <a href="{{ route('services.edit',$service) }}"
                           class="btn btn-outline-secondary rounded-pill">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger rounded-pill px-3" 
                                        onclick="event.preventDefault(); Swal.fire({icon:'warning',title:'¿Eliminar servicio?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger rounded-pill"
                                    onclick="return confirm('¿Eliminar servicio?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </div>

                    @else

                        <div class="d-grid mt-auto pt-3 border-top border-light">

                            <form action="{{ route('cart.addService', $service->id) }}" method="POST" 
                                   class="d-inline">
                                
                                @csrf
                                
                                <button type="submit" class="btn text-white w-100 rounded-pill shadow-sm py-2 fw-bold" 
                                        style="background-color: #e7a6b6; transition: 0.3s;"
                                        onclick="event.preventDefault(); Swal.fire({icon:'question',title:'Agregar servicio',text:'¿Deseas agregar este servicio a tu bolsa?',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, agregar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                    <i class="bi bi-bag-plus-fill me-2"></i> Reservar Servicio
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <div class="text-center mt-5">

        <a href="{{ route('dashboard') }}"
           class="btn btn-link text-decoration-none text-muted">

            <i class="bi bi-arrow-left"></i>

            Volver al Panel

        </a>

    </div>

</div>

@endsection