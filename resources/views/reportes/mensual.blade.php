@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-1 text-lg-center fw-semibold">Reporte Mensual <i
                    class="bi bi-building-fill-check"></i></h4>

        </div>

        <div class="m-2">
            <hr class="">

            <div class="table-responsive">
                <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Instructor</th>
                            <th>Mes</th>
                            <th>Total Entregadas</th>
                            <th>Asignacion</th>

                            <th>Carga VS Avance</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluaciones as $evaluacion)
                            <tr>
                                <td>{{ $evaluacion['funcionario']}}</td>
                                <td>{{ $evaluacion['evaluation_month'] }}</td>
                                <td>{{ $evaluacion['total_evaluations'] }}</td>
                                <td>{{ $evaluacion['month_value'] }}</td>
                                <td>{{ $evaluacion['calculated_total'] }}%</td>
                        @endforeach
                </table>

            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire('Proceso finalizado correctamente!')
        </script>
    @elseif ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error de registro...',
                text: '{{ $message }}',
            })
        </script>
    @endif
@endsection
