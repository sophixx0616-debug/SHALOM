<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Las Divinas Nails Spa</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body{
            background:#fdf8f8;
            min-height:100vh;
        }
        .whatsapp-float{
            position:fixed;
            bottom:25px;
            right:25px;
            width:60px;
            height:60px;
            background:#25d366;
            color:white;
            border-radius:50%;
            text-align:center;
            font-size:32px;
            line-height:60px;
            box-shadow:0 4px 15px rgba(37,211,102,.4);
            z-index:999;
            transition:.3s;
            text-decoration:none;
        }
        .whatsapp-float:hover{
            transform:scale(1.1);
            color:white;
            box-shadow:0 6px 20px rgba(37,211,102,.6);
        }
        .is-invalid{
            border-color:#dc3545 !important;
            box-shadow:0 0 0 0.2rem rgba(220,53,69,.25) !important;
        }
        .invalid-feedback{
            color:#dc3545;
            font-size:0.875em;
            margin-top:0.25rem;
        }
        .badge-confirmada{
            background:#6f7f5d;
            color:white;
            padding:8px 14px;
            border-radius:20px;
            font-size:15px;
        }
        .badge-pendiente{
            background:#e7a6b6;
            color:white;
            padding:8px 14px;
            border-radius:20px;
            font-size:15px;
        }
        .badge-cancelada{
            background:#c85c5c;
            color:white;
            padding:8px 14px;
            border-radius:20px;
            font-size:15px;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <a href="{{ config('business.whatsapp_url') }}"
       target="_blank"
       class="whatsapp-float"
       title="Contáctanos por WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#6f7f5d',
                timer: 3000,
                timerProgressBar: true,
                customClass: { popup: 'rounded-4' }
            });
        @endif
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#6f7f5d',
                timer: 3000,
                timerProgressBar: true,
                customClass: { popup: 'rounded-4' }
            });
        @endif
        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: '{{ session('warning') }}',
                confirmButtonColor: '#6f7f5d',
                customClass: { popup: 'rounded-4' }
            });
        @endif
        @if(session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Información',
                text: '{{ session('info') }}',
                confirmButtonColor: '#6f7f5d',
                customClass: { popup: 'rounded-4' }
            });
        @endif
    });

    function confirmLogout() {
        Swal.fire({
            icon: 'question',
            title: '¿Cerrar sesión?',
            text: 'Estás a punto de salir del sistema.',
            showCancelButton: true,
            confirmButtonColor: '#6f7f5d',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Sí, salir',
            cancelButtonText: 'Cancelar',
            customClass: { popup: 'rounded-4' }
        }).then((r) => {
            if (r.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
    </script>

</body>
</html>
