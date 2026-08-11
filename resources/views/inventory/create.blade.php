@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="fw-bold mb-4" style="color:#6f7f5d;">
        <i class="bi bi-box-seam-fill"></i> Nuevo Producto
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
            <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del producto</label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                           value="{{ old('product_name') }}" required maxlength="255">
                    @error('product_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Marca</label>
                    <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
                           value="{{ old('brand') }}" maxlength="255">
                    @error('brand') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Stock</label>
                        <input type="number" name="stock" min="0" class="form-control @error('stock') is-invalid @enderror"
                               value="{{ old('stock') }}" required>
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Categoría</label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="facil" {{ old('category') == 'facil' ? 'selected' : '' }}>Facial</option>
                            <option value="manicure" {{ old('category') == 'manicure' ? 'selected' : '' }}>Manicure</option>
                            <option value="otros" {{ old('category') == 'otros' ? 'selected' : '' }}>Otros</option>
                        </select>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Precio</label>
                    <input type="number" step="0.01" min="0" name="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price') }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Imagen del producto</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-text">Formatos: jpeg, png, webp. Máximo 2MB.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn text-white" style="background:#6f7f5d;">
                        <i class="bi bi-check-circle-fill"></i> Guardar
                    </button>
                    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection