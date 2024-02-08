@extends('layouts.app')

@section('content')

@endsection


{{-- <h1>HOLA INDEX</h1>

@if ($evaluations->isEmpty())
    <h2>No se encontraron evaluaciones registradas</h2>
@else
    <table>
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Mes</td>
                <td>Plan de trabajo</td>
                <td>Parcial</td>
                <td>Finales</td>
                <td>Extraordinario</td>
                <td>Instructor</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation['evaluation_date'] }}</td>
                    <td>{{ $evaluation['evaluation_month'] }}</td>
                    <td>{{ $evaluation['workplan'] }}</td>
                    <td>{{ $evaluation['partials'] }}</td>
                    <td>{{ $evaluation['finals'] }}</td>
                    <td>{{ $evaluation['extraordinary'] }}</td>
                    <td>{{ $evaluation['instructors_id'] }}</td>
                    <td>
                      <button onclick="editEvaluation($evaluation['evaluation_id'])">edit</button>
                      <button>delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<button onclick="editEvaluation(1)">edit</button>

<script>
  const editEvaluation = (evaluationId) => {
    window.location.href = `/evaluations/${evaluationId}`
  }
</script> --}}
