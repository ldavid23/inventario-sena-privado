@extends('layouts.app')

@section('content')

<div class="contenedor">
    <div class="container mt-5">
        <div id="calendario">

        </div>
    </div>
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');

            var eventos = [
                @foreach ($fechas as $fecha)
                    {
                        title: 'Evento',
                        start: '{{ $fecha->evaluation_date }}',
                        allDay: true

                    },
                @endforeach
            ];

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: eventos,
                locale : 'es'
            });

            calendar.render();
        });
    </script>


@endsection
