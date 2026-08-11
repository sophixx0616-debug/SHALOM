@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="fw-bold mb-4" style="color:#6f7f5d;">
        <i class="bi bi-pencil-fill"></i> Editar Usuario
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius:25px;">
        <div class="card-body p-4">
            <form action="{{ route('users.update', $user) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}"
                            required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" maxlength="255" title="Solo letras y espacios">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Apellido</label>
                        <input
                            type="text"
                            name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name', $user->last_name) }}"
                            required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" maxlength="255" title="Solo letras y espacios">
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}"
                            required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Teléfono</label>
                        <input
                            type="tel"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->phone) }}"
                            required pattern="[0-9]{7,15}" maxlength="15" title="Solo números, entre 7 y 15 dígitos" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Contraseña (dejar en blanco para no cambiar)
                        </label>
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            minlength="8">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">
                            Confirmar contraseña
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            minlength="8">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Rol</label>

                    <select name="role_id" class="form-select @error('role_id') is-invalid @enderror" required>

                        @foreach($roles as $role)

                            <option
                                value="{{ $role->id }}"
                                {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>

                                {{ $role->name }}

                            </option>

                        @endforeach

                    </select>
                    @error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn text-white" style="background:#6f7f5d;">
                        <i class="bi bi-check-circle-fill"></i> Actualizar
                    </button>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection