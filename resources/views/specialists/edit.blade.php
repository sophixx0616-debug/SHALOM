@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header text-white py-3"
             style="background:#e7a6b6;">

            <h4 class="mb-0">

                <i class="fas fa-pen-to-square"></i>
                Editar Especialista

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

            <form action="{{ route('specialists.update',$specialist->id) }}"
      method="POST"
      enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-user"></i>
                        Nombre Completo

                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $specialist->name) }}"
                           class="form-control form-control-lg @error('name') is-invalid @enderror"
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

    @if($specialist->image)

        <div class="mb-3">

            <img src="{{ asset('storage/'.$specialist->image) }}"
                 class="img-fluid rounded shadow"
                 style="
                    width:220px;
                    height:220px;
                    object-fit:cover;
                    border-radius:20px;
                 ">

        </div>

    @endif

    <input type="file"
           name="image"
           class="form-control form-control-lg"
           accept="image/*">

    <small class="text-muted">
        Selecciona una nueva imagen únicamente si deseas reemplazar la actual.
    </small>

</div>

                    <input type="text"
                           name="specialty"
                           value="{{ old('specialty', $specialist->specialty) }}"
                           class="form-control form-control-lg @error('specialty') is-invalid @enderror"
                           required
                           maxlength="255">

                    @error('specialty')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d;">

                    <i class="fas fa-floppy-disk"></i>
                    Actualizar

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