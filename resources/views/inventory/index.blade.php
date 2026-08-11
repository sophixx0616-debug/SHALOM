@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

<div class="d-flex justify-content-between align-items-center mb-5">

    <div>

        <h1 class="fw-bold"
            style="color:#6f7f5d;">

            <i class="bi bi-box-seam-fill"></i>
            Inventario

        </h1>

        <p class="text-muted">
            Productos registrados: {{ $items->count() }}
        </p>

    </div>

    @if(Auth::user()->role && Auth::user()->role->name === 'admin')

    <a href="{{ route('inventory.create') }}"
       class="btn text-white px-4 py-2"
       style="
            background:#6f7f5d;
            border:none;
            border-radius:15px;
       ">

        <i class="bi bi-plus-circle-fill"></i>
        Nuevo Producto

    </a>

    @endif

</div>

@if($items->where('stock','<=',3)->count())

    <div class="alert alert-warning">

        <i class="bi bi-exclamation-triangle-fill"></i>

        Hay productos con stock bajo.

    </div>

@endif

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="row">

    @forelse($items as $item)

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:25px;">
             <div class="text-center">

            <div class="text-center py-4"
                 style="background:#fdf1f4;height:180px;display:flex;align-items:center;justify-content:center;overflow:hidden;">

                @if($item->image_url)
                    <img src="{{ $item->image_url }}"
                         alt="{{ $item->product_name }}"
                         style="height:100%;width:100%;object-fit:cover;">
                @else
                    <i class="bi bi-box-seam"
                       style="font-size:80px;color:#e7a6b6;">
                    </i>
                @endif

    @else

        <i class="bi bi-box-seam"
           style="font-size:80px; color:#e7a6b6;"></i>

    @endif

</div>

            <div class="card-body">

                <h4 class="fw-bold"
                    style="color:#6f7f5d;">

                    {{ $item->product_name }}

                </h4>

                <p>

                    <strong>Precio:</strong>

                    ${{ number_format($item->price,2) }}

                </p>

                <p>

                    <strong>Existencias:</strong>

                    @if($item->stock <= 3)

                        <span class="badge bg-danger">
                            {{ $item->stock }}
                        </span>

                    @elseif($item->stock <= 10)

                        <span class="badge bg-warning text-dark">
                            {{ $item->stock }}
                        </span>

@else

                        <span class="badge bg-success">
                            {{ $item->stock }}
                        </span>

@endif

                </p>

                @if($item->stock <= 3)

<div class="alert alert-danger py-2">

    <i class="bi bi-exclamation-triangle-fill"></i>

    Stock bajo

</div>

@endif

            </div>

            @if(Auth::user()->role && Auth::user()->role->name === 'admin')

            <div class="card-footer bg-white border-0 pb-4">

                <a href="{{ route('inventory.edit',$item->id) }}"
                   class="btn btn-warning">

                    <i class="bi bi-pencil-fill"></i>

                </a>

                <form action="{{ route('inventory.destroy',$item->id) }}"
                      method="POST"
                      style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger"
                            onclick="event.preventDefault(); Swal.fire({icon:'warning',title:'¿Eliminar producto?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">

                        <i class="bi bi-trash-fill"></i>

                    </button>

                </form>

            </div>

            @endif

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert text-center"
             style="
                background:#fdf1f4;
                color:#6f7f5d;
             ">

            <i class="bi bi-box-seam fs-1"></i>

            <h4 class="mt-3">
                No hay productos registrados
            </h4>

        </div>

    </div>

    @endforelse

</div>

</div>

@endsection
