@extends('layouts.app')

@section('content')
<div class="contenedor">
    <div class="mt-2 text-lg-center">
        <h4 class="card-title color mb-3 text-lg-center fw-semibold">Funcionarios De Seguimiento <i
                class="bi bi-person"></i></h4>
        <p class="fw-semibold text-secondary">Registro y Panel de control de los diferentes coordinaciones</p>
    </div>

    <div class="ms-4 mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success fw-medium sahdow-sm" data-bs-toggle="modal" data-bs-target="#modalId">
            Registrar Funcionario <i class="bi bi-person-fill-add"></i>
        </button>

    </div>
    <hr class="m-3">

    <div class="table-responsive m-3">
        <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
            style="width:100%">
            <thead>
                <tr>
                    <th>Funcionario</th>
                    <th>Identificación</th>
                    <th>Coordinacion</th>
                    <th>Funciones</th>
                </tr>
            </thead>
            <tbody>
                {{--   @foreach ($coordinators as $coordinator)
                <tr>
                    <td>{{ $coordinator['coordinator_name'] }}</td>
                    <td>{{ $coordinator['user_id'] }}</td>
                    <td> coordinacion</td>
                    <td> funciones
                      <button onclick="editCoordinator($coordinator['coordinator_id'])">edit</button>
                      <button>delete</button>
                    </td>
                </tr>
            @endforeach --}}
        </table>
    </div>

@include('funcionarios.create')



</div>
@endsection


