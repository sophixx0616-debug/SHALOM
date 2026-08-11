@extends('layouts.app')

@section('content')

<div class="container py-5">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;">

    <i class="bi bi-pencil-square"></i>
    Editar Cita

</h1>

<div class="card border-0 shadow-lg"
     style="border-radius:25px;">

    <div class="card-body p-4">

        <form action="{{ route('appointments.update', $appointment->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Servicio
                </label>

                <select name="service_id"
                        class="form-select"
                        required>

                    @foreach($services as $service)

                        <option value="{{ $service->id }}"
                        {{ $appointment->service_id == $service->id ? 'selected' : '' }}>

                            {{ $service->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Fecha
                </label>

                <input type="date"
                       name="date"
                       class="form-control"
                       value="{{ $appointment->date }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Hora
                </label>

                <input type="time"
                       name="time"
                       class="form-control"
                       value="{{ $appointment->time }}"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label fw-bold">
                    Especialista
                </label>

                <select name="worker"
                        class="form-select"
                        required>

                    @foreach($specialists as $specialist)

                        <option value="{{ $specialist->name }}"
                        {{ $appointment->worker == $specialist->name ? 'selected' : '' }}>

                            {{ $specialist->name }}
                            - {{ $specialist->specialty }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label fw-bold">
                    Estado
                </label>

                <select name="status"
                        class="form-select">

                    <option value="pendiente"
                    {{ $appointment->status == 'pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>

                    <option value="confirmada"
                    {{ $appointment->status == 'confirmada' ? 'selected' : '' }}
                    {{ auth()->user()->role->name !== 'admin' ? 'disabled' : '' }}>
                        Confirmada
                    </option>

                    <option value="cancelada"
                    {{ $appointment->status == 'cancelada' ? 'selected' : '' }}>
                        Cancelada
                    </option>

                </select>

                @if(auth()->user()->role->name !== 'admin')
                <small class="text-muted">Solo el administrador puede confirmar citas.</small>
                @endif

            </div>

            <button type="submit"
                    class="btn text-white"
                    style="background:#8fae73;">

                <i class="bi bi-check-circle"></i>
                Guardar Cambios

            </button>

            <a href="{{ route('appointments.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

</div>

@endsection
