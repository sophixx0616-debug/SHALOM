@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5"
        style="color:#6f7f5d;font-size:50px;">

        <i class="bi bi-pencil-square"></i>
        Editar Servicio

    </h1>

    <div class="row justify-content-center">

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;">

                <div class="card-body text-center p-4">

                    <i class="bi bi-stars"
                       style="font-size:100px;color:#e7a6b6;">
                    </i>

                    <h4 class="mt-3" style="color:#6f7f5d;">
                        {{ $service->name }}
                    </h4>

                    <p class="text-muted">
                        Modifica la información del servicio.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;overflow:hidden;">

                <div class="card-header text-white py-3"
                     style="background:#8fae73;">

                    <h4 class="mb-0">
                        <i class="bi bi-pencil-fill"></i>
                        Actualizar Servicio
                    </h4>

                </div>

                <div class="card-body p-4">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('services.update', $service) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Nombre del Servicio
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name', $service->name) }}"
                                   required
                                   maxlength="255"
                                   pattern=".*\S.*">

                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Descripción
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror"
                                      required>{{ old('description', $service->description) }}</textarea>

                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

<h4 class="mb-0">

<i class="bi bi-pencil-fill"></i>

Actualizar Información

                                <label class="fw-bold mb-2">
                                    Precio
                                </label>

                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       name="price"
                                       class="form-control form-control-lg @error('price') is-invalid @enderror"
                                       value="{{ old('price', $service->price) }}"
                                       required>

                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

<div class="card-body">

<form
action="{{ route('services.update',$service) }}"
method="POST"
enctype="multipart/form-data">

                                <label class="fw-bold mb-2">
                                    Duración (minutos)
                                </label>

                                <input type="number"
                                       name="duration"
                                       min="1"
                                       max="480"
                                       class="form-control form-control-lg @error('duration') is-invalid @enderror"
                                       value="{{ old('duration', $service->duration) }}"
                                       required>

                                @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

    <input
        type="text"
        name="name"
        class="form-control form-control-lg"
        value="{{ old('name',$service->name) }}"
        required>

</div>

                        <div class="d-flex gap-3">

                            <button type="submit"
                                    class="btn btn-lg text-white"
                                    style="background:#6f7f5d;border:none;">

                                <i class="bi bi-check-circle-fill"></i>
                                Guardar Cambios

                            </button>

                            <a href="{{ route('services.index') }}"
                               class="btn btn-lg btn-outline-secondary">

                                <i class="bi bi-x-circle"></i>
                                Cancelar

                            </a>

</div>

<div class="row">

    <div class="col-md-6 mb-4">

        <label class="fw-bold mb-2">
            Precio
        </label>

        <input
            type="number"
            step="0.01"
            name="price"
            class="form-control form-control-lg"
            value="{{ old('price',$service->price) }}"
            required>

    </div>

    <div class="col-md-6 mb-4">

        <label class="fw-bold mb-2">
            Duración (minutos)
        </label>

        <input
            type="number"
            name="duration"
            class="form-control form-control-lg"
            value="{{ old('duration',$service->duration) }}"
            required>

    </div>

</div>

<div class="mb-4">

    <label class="fw-bold mb-2">
        Estado
    </label>

    <select
        name="status"
        class="form-select form-select-lg">

        <option value="1"
            {{ $service->status ? 'selected' : '' }}>
            Activo
        </option>

        <option value="0"
            {{ !$service->status ? 'selected' : '' }}>
            Inactivo
        </option>

    </select>

</div>

<div class="mb-4">

    <label class="fw-bold mb-2">
        Imagen del Servicio
    </label>

    @if($service->image)

        <div class="mb-3">

            <img
                src="{{ asset('storage/'.$service->image) }}"
                class="img-fluid rounded shadow"
                style="max-width:250px;">

        </div>
        @if($service->image)

    <div class="form-check mb-3">
        <input class="form-check-input"
               type="checkbox"
               name="remove_image"
               value="1"
               id="remove_image">

        <label class="form-check-label" for="remove_image">
            Eliminar imagen actual
        </label>
    </div>

@endif

    @endif

    <input
        type="file"
        name="image"
        class="form-control"
        accept="image/png,image/jpeg,image/jpg">

    <small class="text-muted">
        Si no deseas cambiar la imagen, deja este campo vacío.
    </small>

</div>
<div class="d-flex gap-3 mt-4">

    <button
        type="submit"
        class="btn btn-lg btn-spa">

        <i class="bi bi-check-circle-fill"></i>

        Guardar Cambios

    </button>

    <a
        href="{{ route('services.index') }}"
        class="btn btn-lg btn-outline-secondary">

        <i class="bi bi-x-circle"></i>

        Cancelar

    </a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

@endsection