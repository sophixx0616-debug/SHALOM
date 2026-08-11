@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5" style="color:#6f7f5d;font-size:50px;">
        <i class="bi bi-calendar3"></i>
        Calendario de Citas
    </h1>

    <div class="card border-0 shadow-sm" style="border-radius:25px;">
        <div class="card-body p-4">
            <div id="calendar"></div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        events: @json($events),
        eventColor: '#8fae73',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        }
    });

    calendar.render();
});
</script>

@endsection
