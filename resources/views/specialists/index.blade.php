@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 style="color:#6f7f5d;font-weight:700;">
            <i class="fas fa-user-nurse me-2"></i>
            Gestión de Especialistas
        </h1>

        @if(Auth::user()->role && Auth::user()->role->name === 'admin')

        <a href="{{ route('specialists.create') }}"
           class="btn text-white"
           style="background:#6f7f5d;border-radius:12px;">

            <i class="fas fa-circle-plus"></i>
            Nueva Especialista

        </a>

        @endif

    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-spa"></i> Especialidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>

                </thead>
<tbody>

@forelse($specialists as $specialist)

<tr>

    <td>

        <div class="d-flex align-items-center">

            @if($specialist->image)

                <img src="{{ asset('storage/'.$specialist->image) }}"
                     width="70"
                     height="70"
                     class="rounded-circle shadow me-3"
                     style="object-fit:cover;">

                            @if(Auth::user()->role && Auth::user()->role->name === 'admin')

                            <a href="{{ route('specialists.edit',$specialist->id) }}"
                               class="btn btn-warning btn-sm">

                <img src="{{ asset('img/avatar.png') }}"
                     width="70"
                     height="70"
                     class="rounded-circle shadow me-3"
                     style="object-fit:cover;">

            @endif

            <div>

                <strong>{{ $specialist->name }}</strong>

                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        onclick="Swal.fire({icon:'warning',title:'¿Eliminar especialista?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">

        </div>

    </td>

    <td>

                            @endif

                        </td>

            {{ $specialist->specialty }}

        </span>

    </td>

    <td class="text-center">

        <a href="{{ route('specialists.edit',$specialist) }}"
           class="btn btn-warning btn-sm rounded-pill">

            <i class="fas fa-pen"></i>

        </a>

        <form action="{{ route('specialists.destroy',$specialist) }}"
              method="POST"
              class="d-inline">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm rounded-pill"
                    onclick="return confirm('¿Eliminar especialista?')">

                <i class="fas fa-trash"></i>

            </button>

        </form>

    </td>

</tr>

@empty

<tr>

    <td colspan="3" class="text-center py-5">

        <i class="fas fa-user-slash fa-3x mb-3"
           style="color:#e7a6b6;"></i>

        <h5>No hay especialistas registradas.</h5>

    </td>

</tr>

@endforelse

</tbody>

            </table>

        </div>

    </div>

</div>

@endsection
