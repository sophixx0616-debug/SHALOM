@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="text-center mb-4"
        style="color:#6f7f5d;">

        <i class="bi bi-person-heart"></i>
        Especialistas Más Solicitadas

    </h1>

    <div class="card border-0 shadow">

        <div class="card-body">

            <table class="table table-hover">

                <thead>

                    <tr>
                        <th>Ranking</th>
                        <th>Especialista</th>
                        <th>Total Citas</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($especialistas as $index => $especialista)

                    <tr>

                        <td>
                            #{{ $index + 1 }}
                        </td>

                        <td>
                            {{ $especialista->worker }}
                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $especialista->total }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center">

                            No hay citas registradas.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4 d-flex gap-2">

        <a href="{{ route('reportes.especialistas.pdf') }}"
           class="btn btn-danger">

            <i class="fas fa-file-pdf"></i>
            PDF

        </a>

        <a href="{{ route('reportes.especialistas.excel') }}"
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