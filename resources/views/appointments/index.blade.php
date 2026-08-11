@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;font-size:50px;">
    <i class="bi bi-calendar-heart"></i>
    Mis Citas
</h1>

<div class="row">

    <div class="col-lg-8">

        @forelse($appointments as $a)

        <div class="card border-0 shadow-sm mb-4"
             style="border-radius:25px;overflow:hidden;">

            <div class="card-header text-white"
                 style="background:#8fae73;">

                <h5 class="mb-0">
                    <i class="bi bi-stars"></i>
                    Cita Agendada
                </h5>

            </div>

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-md-8">

                        <p>
                            <strong>Servicio:</strong>
                            {{ $a->service->name }}
                        </p>
                        <p>
    <strong>Servicio:</strong>
    {{ $a->service->name }}
</p>

<p>
    <strong>Precio:</strong>
    ${{ number_format($a->service->price, 0, ',', '.') }}
</p>

<p>
    <strong>Fecha:</strong>
    {{ \Carbon\Carbon::parse($a->date)->format('d/m/Y') }}
</p>

<p>
    <strong>Hora:</strong>
    {{ \Carbon\Carbon::parse($a->time)->format('h:i A') }}
</p>

                        <p>
                            <strong>Fecha:</strong>
                            {{ \Carbon\Carbon::parse($a->date)->format('d/m/Y') }}
                        </p>

                        <p>
                            <strong>Hora:</strong>
                            {{ \Carbon\Carbon::parse($a->time)->format('h:i A') }}
                        </p>

                        <p>
                            <strong>Cliente:</strong>

                            @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                                {{ $a->user->name ?? 'Sin usuario' }}
                            @else
                                {{ auth()->user()->name }}
                            @endif
                        </p>

                        <p>
                            <strong>Especialista:</strong>

                            <span class="fw-bold" style="color:#8fae73;">
                                <i class="bi bi-person-heart"></i>
                                {{ $a->worker }}
                            </span>
                        </p>
                        <span class="badge px-4 py-2
@if($a->status=='pendiente') bg-warning
@elseif($a->status=='confirmada') bg-success
@elseif($a->status=='cancelada') bg-danger
@endif"
style="font-size:15px;">

                        @php
                            $badgeClass = match($a->status) {
                                'confirmada' => 'badge-confirmada',
                                'pendiente'  => 'badge-pendiente',
                                default      => 'badge-cancelada',
                            };
                        @endphp

                        <span class="{{ $badgeClass }}" style="font-size:15px;">
                            {{ $a->status }}
                        </span>

                        <div class="mt-3 d-flex gap-2 flex-wrap">

                            @if(auth()->user()->role && auth()->user()->role->name === 'admin')

                                @if($a->status !== 'pendiente')
                                <form action="{{ route('appointments.status', $a->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="pendiente">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="Swal.fire({icon:'question',title:'¿Marcar como Pendiente?',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí',cancelButtonText:'No',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-clock"></i> Pendiente
                                    </button>
                                </form>
                                @endif

                                @if($a->status !== 'confirmada')
                                <form action="{{ route('appointments.status', $a->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmada">
                                    <button type="button" class="btn btn-outline-success"
                                        onclick="Swal.fire({icon:'question',title:'¿Confirmar cita?',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí',cancelButtonText:'No',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-check-circle"></i> Confirmar
                                    </button>
                                </form>
                                @endif

                                @if($a->status !== 'cancelada')
                                <form action="{{ route('appointments.status', $a->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelada">
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Cancelar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, cancelar',cancelButtonText:'Volver',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </button>
                                </form>
                                @endif

                                <a href="{{ route('appointments.edit', $a->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <form action="{{ route('appointments.destroy', $a->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Eliminar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>

                            @else

                                @if($a->status !== 'cancelada')
                                <form action="{{ route('appointments.status', $a->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelada">
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Cancelar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, cancelar',cancelButtonText:'Volver',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </button>
                                </form>
                                @endif

                                <a href="{{ route('appointments.edit', $a->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                            @endif

            @csrf
            @method('DELETE')

                    </div>
                    <div class="col-md-4 text-center">

    @if($a->service->image)

        <img src="{{ asset('storage/'.$a->service->image) }}"
             class="img-fluid rounded shadow-sm"
             style="height:180px;width:100%;object-fit:cover;">

    @else

        <i class="bi bi-heart-fill"
           style="font-size:70px;color:#e7a6b6;">
        </i>

    @endif

    <h6 class="mt-3 fw-bold"
        style="color:#6f7f5d;">

        {{ $a->service->name }}

    </h6>

</div>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="alert text-center"
             style="background:#fdf1f4;border:none;color:#6f7f5d;">

            <i class="bi bi-calendar-x fs-3"></i>

            <h5 class="mt-2">
                No tienes citas registradas
            </h5>

        </div>

        @endforelse

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm"
             style="border-radius:25px;">

            <div class="card-body text-center">

                <i class="bi bi-calendar3"
                   style="font-size:60px;color:#8fae73;">
                </i>

                <h4 class="mt-3"
                    style="color:#6f7f5d;">
                    Calendario
                </h4>

                <input type="date"
                       class="form-control mt-3">

            </div>

        </div>

        <a href="{{ route('appointments.create') }}"
           class="btn w-100 mt-4 text-white py-3"
           style="
                background:#8fae73;
                border:none;
                border-radius:15px;
                font-weight:600;
           ">

            <i class="bi bi-plus-circle"></i>
            Nueva Cita

        </a>

    </div>

</div>

</div>

@endsection
