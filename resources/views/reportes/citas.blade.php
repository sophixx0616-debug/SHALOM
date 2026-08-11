@extends('layouts.app')

@section('content')

<div class="container py-5">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;">

    <i class="fas fa-chart-bar"></i>
    Reporte de Últimas Citas

</h1>

<div class="card border-0 shadow-lg"
     style="border-radius:25px;">

    <div class="card-header text-white"
         style="background:#8fae73;">

        <h4 class="mb-0">
            <i class="fas fa-calendar-check"></i>
            Historial de Citas Registradas
        </h4>

    </div>

    <div class="card-body">

        @if($citas->count() > 0)

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Especialista</th>
                        <th>Estado</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($citas as $cita)

                    <tr>

                        <td>
                            {{ $cita->id }}
                        </td>

                        <td>
                            <i class="fas fa-user me-2 text-success"></i>
                            {{ $cita->user->name ?? 'Sin usuario' }}
                        </td>

                        <td>
                            <i class="fas fa-spa me-2 text-success"></i>
                            {{ $cita->service->name ?? 'Sin servicio' }}
                        </td>

                        <td>
                            {{ $cita->date }}
                        </td>

                        <td>
                            {{ $cita->time }}
                        </td>

                        <td>
                            <i class="fas fa-user-nurse me-2 text-success"></i>
                            {{ $cita->worker }}
                        </td>

                        <td>

                            @php
                                $badgeClass = match($cita->status) {
                                    'confirmada' => 'badge-confirmada',
                                    'pendiente'  => 'badge-pendiente',
                                    default      => 'badge-cancelada',
                                };
                            @endphp

                            <span class="{{ $badgeClass }}">
                                {{ $cita->status }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="alert alert-info text-center">

            <i class="fas fa-info-circle"></i>

            No hay citas registradas.

        </div>

        @endif

    </div>

</div>

<div class="text-center mt-4 d-flex gap-2 justify-content-center flex-wrap">

    <a href="{{ route('reportes.citas.pdf') }}"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>
        Exportar PDF

    </a>

    <a href="{{ route('reportes.citas.excel') }}"
       class="btn btn-success">

        <i class="fas fa-file-excel"></i>
        Exportar Excel

    </a>

    <a href="{{ route('dashboard') }}"
       class="btn text-white"
       style="background:#6f7f5d;">

        <i class="fas fa-arrow-left"></i>
        Volver al Dashboard

    </a>

</div>
</div>

@endsection
