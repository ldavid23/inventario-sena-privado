@extends('layouts.app')

@section('content')

@endsection



{{-- <h1>HOLA INDEX</h1>

@if ($coordinators->isEmpty())
    <h2>No se encontraron evaluaciones registradas</h2>
@else
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Usuario</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($coordinators as $coordinator)
                <tr>
                    <td>{{ $coordinator['coordinator_name'] }}</td>
                    <td>{{ $coordinator['user_id'] }}</td>
                    <td>
                      <button onclick="editCoordinator($coordinator['coordinator_id'])">edit</button>
                      <button>delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<button onclick="editCoordinator(1)">edit</button>

<script>
  const editCoordinator = (coordinatorId) => {
    window.location.href = `/coordinators/${coordinatorId}`
  }
</script> --}}
