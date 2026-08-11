@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="fw-bold mb-4" style="color:#6f7f5d;">
        <i class="bi bi-pencil-fill"></i> Editar Producto
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
            <form action="{{ route('inventory.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del producto</label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                           value="{{ old('product_name', $item->product_name) }}" required maxlength="255">
                    @error('product_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Marca</label>
                    <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
                           value="{{ old('brand', $item->brand) }}" maxlength="255">
                    @error('brand') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Stock</label>
                        <input type="number" name="stock" min="0" class="form-control @error('stock') is-invalid @enderror"
                               value="{{ old('stock', $item->stock) }}" required>
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Categoría</label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="facil" {{ old('category', $item->category) == 'facil' ? 'selected' : '' }}>Facial</option>
                            <option value="manicure" {{ old('category', $item->category) == 'manicure' ? 'selected' : '' }}>Manicure</option>
                            <option value="otros" {{ old('category', $item->category) == 'otros' ? 'selected' : '' }}>Otros</option>
                        </select>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $item->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Precio</label>
                    <input type="number" step="0.01" min="0" name="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $item->price) }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Imagen del producto</label>
                    @if($item->image_url)
                    <div class="mb-2">
                        <img src="{{ $item->image_url }}" alt="{{ $item->product_name }}"
                             style="height:100px;width:100px;object-fit:cover;border-radius:12px;border:1px solid #e7a6b6;">
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-text">Formatos: jpeg, png, webp. Máximo 2MB. Dejar vacío para mantener la imagen actual.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn text-white" style="background:#6f7f5d;">
                        <i class="bi bi-check-circle-fill"></i> Actualizar
                    </button>
                    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection