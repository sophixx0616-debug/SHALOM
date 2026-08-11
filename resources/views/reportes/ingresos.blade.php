@extends('layouts.app')

@section('content')

<div class="container py-4">


<h1 class="text-center mb-4"
    style="color:#6f7f5d;">

    <i class="bi bi-cash-stack"></i>
    Reporte de Ingresos Estimados

</h1>

<div class="row">

    <div class="col-md-4">

        <div class="card border-0 shadow-lg">

            <div class="card-body text-center">

                <i class="bi bi-currency-dollar"
                   style="font-size:60px;color:#198754;">
                </i>

                <h5 class="mt-3">
                    Ingresos Totales
                </h5>

                <h2 class="fw-bold text-success">

                    ${{ number_format($ingresos, 0, ',', '.') }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card border-0 shadow-lg">

            <div class="card-header text-white"
                 style="background:#6f7f5d;">

                Servicios Facturados

            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>Servicio</th>
                            <th>Precio</th>
                        </tr>

                    </thead>

                    <tbody>

                    @foreach($citas as $cita)

                        <tr>

                            <td>
                                {{ $cita->service->name ?? 'N/A' }}
                            </td>

                            <td>

                                ${{ number_format($cita->service->price ?? 0, 0, ',', '.') }}

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<div class="mt-4 d-flex gap-2">

    <a href="{{ route('reportes.ingresos.pdf') }}"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>
        PDF

    </a>

    <a href="{{ route('reportes.ingresos.excel') }}"
       class="btn btn-success">

        <i class="fas fa-file-excel"></i>
        Excel

    </a>

    <a href="{{ route('dashboard') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Volver al Dashboard

    </a>

</div>


</div>

@endsection
