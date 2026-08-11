@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold" style="color:#6f7f5d;">
                <i class="bi bi-people-fill"></i>
                Gestión de Usuarios
            </h1>

            <p class="text-muted">
                Total registrados: {{ $users->count() }}
            </p>
        </div>

        <a href="{{ route('users.create') }}"
           class="btn text-white"
           style="background:#6f7f5d;border:none;">

            <i class="bi bi-person-plus-fill"></i>
            Nuevo Usuario

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <!-- BUSCADOR -->

    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;">

        <div class="card-body">

            <input type="text"
                   id="buscarUsuario"
                   class="form-control"
                   placeholder="Buscar usuario por nombre o correo...">

        </div>

    </div>

    <!-- TABLA -->

    <div class="card border-0 shadow-sm"
         style="border-radius:20px;overflow:hidden;">

        <div class="card-header text-white"
             style="background:#e7a6b6;">

            <h5 class="mb-0">
                Lista de Usuarios
            </h5>

        </div>

        <div class="table-responsive">

            <table class="table table-hover mb-0"
                   id="tablaUsuarios">

                <thead style="background:#fdf1f4;">

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th width="180">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>

                            <span class="badge"
                                  style="background:#6f7f5d;">

                                {{ $user->role->name ?? 'Sin rol' }}

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('users.edit', $user) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form action="{{ route('users.destroy', $user) }}"
                                  method="POST"
                                  style="display:inline-block;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault(); Swal.fire({icon:'warning',title:'¿Eliminar usuario?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

document.getElementById('buscarUsuario').addEventListener('keyup', function(){

    let filtro = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaUsuarios tbody tr');

    filas.forEach(function(fila){

        let texto = fila.innerText.toLowerCase();

        fila.style.display =
            texto.includes(filtro)
            ? ''
            : 'none';

    });

});

</script>

@endsection