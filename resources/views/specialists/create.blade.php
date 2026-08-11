@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header text-white py-3"
             style="background:#6f7f5d;">

            <h4 class="mb-0">
                <i class="fas fa-user-plus"></i>
                Registrar Especialista
            </h4>

        </div>

        <div class="card-body p-4">

            @if ($errors->any())
            <div class="alert alert-danger rounded-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('specialists.store') }}"
      method="POST"
      enctype="multipart/form-data">

                @csrf

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-user"></i>
                        Nombre Completo

                    </label>

                    <input type="text"
                           name="name"
                           class="form-control form-control-lg @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           required
                           maxlength="255"
                           pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                           title="Solo letras y espacios"
                           oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')">

                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-spa"></i>
                        Especialidad

                    </label>
                    <div class="mb-4">

    <label class="fw-bold mb-2">

        <i class="fas fa-image"></i>
        Fotografía

    </label>

    <input type="file"
           name="image"
           class="form-control form-control-lg"
           accept="image/*">

    <small class="text-muted">
        Formatos permitidos: JPG, PNG, JPEG o WEBP.
    </small>

</div>

                    <input type="text"
                           name="specialty"
                           class="form-control form-control-lg @error('specialty') is-invalid @enderror"
                           value="{{ old('specialty') }}"
                           placeholder="Ej: Manicure y Pedicure"
                           required
                           maxlength="255">

                    @error('specialty')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d;">

                    <i class="fas fa-floppy-disk"></i>
                    Guardar

                </button>

                <a href="{{ route('specialists.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Volver

                </a>

            </form>

        </div>

    </div>

</div>

@endsection