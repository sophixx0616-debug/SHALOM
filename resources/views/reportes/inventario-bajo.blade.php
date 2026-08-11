@extends('layouts.app')

@section('content')

<div class="container py-4">


<h1 class="text-center mb-4"
    style="color:#6f7f5d;">

    <i class="bi bi-exclamation-triangle-fill"></i>
    Reporte de Inventario Bajo

</h1>

<div class="card border-0 shadow-lg">

    <div class="card-header text-white"
         style="background:#dc3545;">

        <h4 class="mb-0">

            <i class="bi bi-box-seam"></i>
            Productos Próximos a Agotarse

        </h4>

    </div>

    <div class="card-body">

        @if($productos->count())

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                </tr>

            </thead>

            <tbody>

            @foreach($productos as $producto)

                <tr>

                    <td>{{ $producto->id }}</td>

                    <td>{{ $producto->product_name }}</td>

                    <td>{{ $producto->stock }}</td>

                    <td>

                        <span class="badge bg-danger">

                            Stock Bajo

                        </span>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        @else

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill"></i>

            Excelente. No hay productos con inventario bajo.

        </div>

        @endif

    </div>

</div>

<div class="mt-4 d-flex gap-2">

    <a href="{{ route('reportes.inventario.pdf') }}"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>
        PDF

    </a>

    <a href="{{ route('reportes.inventario.excel') }}"
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
