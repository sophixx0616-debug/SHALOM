@extends('layouts.app')

@section('content')
<!-- Cargamos las fuentes y los iconos para mantener tu identidad visual -->
<link href="https://googleapis.com" rel="stylesheet">
<link rel="stylesheet" href="https://jsdelivr.net">

<style>
    body {
        background: linear-gradient(to bottom, #ffffff, #fdf1f4);
        font-family: 'Poppins', sans-serif;
    }

    .fuente-elegante {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #6f7f5d; /* El verde olivo de ellas */
    }

    .carrito-card {
        border: none;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(225, 190, 231, 0.3);
    }

    .btn-confirmar {
        background-color: #6f7f5d;
        color: white !important;
        border-radius: 50px;
        padding: 12px 40px;
        transition: 0.3s;
    }

    .btn-confirmar:hover {
        background-color: #5a6a4a;
        transform: scale(1.02);
    }
</style>

<div class="container py-5">

    <!-- Encabezado del Carrito -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold fuente-elegante">Mi Bolsa de Compras</h1>
        <div class="mx-auto" style="width: 60px; height: 3px; background-color: #e7a6b6; border-radius: 10px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card carrito-card shadow-lg">
                <div class="card-body p-5">

                    {{-- CASO A: El carrito SI tiene productos o servicios --}}
                    @if($cart && count($cart) > 0)
                        
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="text-muted small text-uppercase border-bottom">
                                    <tr>
                                        <th>Insumo / Servicio</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-end">Precio Unitario</th>
                                        <th class="text-end">Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach($cart as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="background-color: #fdf1f4; width: 40px; height: 40px;">
                                                        @if(str_starts_with($id, 'service_'))
                                                            <i class="bi bi-gem" style="color: #e7a6b6;"></i>
                                                        @else
                                                            <i class="bi bi-flower1" style="color: #e7a6b6;"></i>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span class="fw-bold text-secondary d-block">{{ $details['name'] }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-light text-dark px-3 py-2 border rounded-pill fs-6">
                                                    {{ $details['quantity'] }}
                                                </span>
                                            </td>
                                            <td class="text-end text-muted">
                                                ${{ number_format($details['price'], 0, ',', '.') }}
                                            </td>
                                            <td class="text-end fw-bold" style="color: #6f7f5d;">
                                                ${{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                                            </td>
                                            <td class="text-end">
                                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm text-danger opacity-70 hover:opacity-100" onclick="Swal.fire({icon:'warning',title:'¿Quitar de la bolsa?',text:'Este producto será eliminado de tu bolsa.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, quitar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                                        <i class="bi bi-trash3-fill fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Resumen y Acciones Finales -->
                        <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                            <div>
                                <p class="text-muted mb-0 small text-uppercase">Total a pagar</p>
                                <h2 class="fw-bold" style="color: #6f7f5d;">${{ number_format($total, 0, ',', '.') }}</h2>
                            </div>
                            <div class="gap-2 d-flex">
                                <a href="{{ route('services.index') }}" class="btn btn-outline-secondary rounded-pill px-4 align-self-center text-decoration-none">
                                    <i class="bi bi-arrow-left me-1"></i> Seguir Viendo
                                </a>
                                <form action="{{ route('cart.checkout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="button" class="btn btn-confirmar shadow-sm fw-bold" onclick="Swal.fire({icon:'question',title:'¿Finalizar pedido?',text:'Los productos y servicios seleccionados serán procesados.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, finalizar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-credit-card-2-back-fill me-2"></i> Finalizar Pedido
                                    </button>
                                </form>
                            </div>
                        </div>

                    {{-- CASO B: El carrito ESTÁ VACÍO --}}
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="bi bi-bag-x" style="font-size: 80px; color: #e7a6b6; opacity: 0.5;"></i>
                            </div>
                            <h4 class="text-muted fw-bold">Tu bolsa está vacía por ahora</h4>
                            <p class="text-muted small mb-4">¿Qué tal si exploras nuestro catálogo de experiencias premium?</p>
                            <a href="{{ route('services.index') }}" class="btn btn-confirmar shadow-sm fw-bold text-decoration-none">
                                <i class="bi bi-gem me-2"></i> Ver Servicios
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
