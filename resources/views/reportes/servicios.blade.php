@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="mb-4 text-center"
        style="color:#6f7f5d;">

        <i class="bi bi-stars"></i>
        Servicios Más Solicitados

    </h1>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Total Reservas</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($servicios as $index => $servicio)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>
                            {{ $servicio->service->name ?? 'N/A' }}
                        </td>

                        <td>

                            <span class="badge bg-success">
                                {{ $servicio->total }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3 d-flex gap-2">

        <a href="{{ route('reportes.servicios.pdf') }}"
           class="btn btn-danger">

            <i class="fas fa-file-pdf"></i>
            PDF

        </a>

        <a href="{{ route('reportes.servicios.excel') }}"
           class="btn btn-success">

            <i class="fas fa-file-excel"></i>
            Excel

        </a>

        <a href="{{ route('dashboard') }}"
           class="btn btn-secondary">

            Volver

        </a>

    </div>

</div>

@endsection