<x-guest-layout>

<h2 class="mb-4 text-center">Registro</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Nombre -->
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input id="name" type="text" class="form-control" name="name"
            value="{{ old('name') }}" required autofocus
            maxlength="255" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
            title="Solo letras y espacios"
            oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')">
        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>

    <!-- Apellido -->
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input id="apellido" type="text" class="form-control" name="apellido"
            value="{{ old('apellido') }}" required
            maxlength="255" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
            title="Solo letras y espacios"
            oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')">
        @error('apellido') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>

    <!-- Teléfono -->
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input id="telefono" type="tel" class="form-control" name="telefono"
            value="{{ old('telefono') }}" required
            pattern="[0-9]{7,15}" maxlength="15"
            title="Solo números, entre 7 y 15 dígitos"
            oninput="this.value=this.value.replace(/[^0-9]/g,'')">
        @error('telefono') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" type="email" class="form-control" name="email"
            value="{{ old('email') }}" required>
        @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" class="form-control"
            name="password" required minlength="8">
        @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>

    <!-- Confirmar -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
        <input id="password_confirmation" type="password" class="form-control"
            name="password_confirmation" required minlength="8">
    </div>

    <!-- Botón -->
    <button type="submit" class="btn btn-primary w-100">
    Registrarme
</button>

</form>

</x-guest-layout>