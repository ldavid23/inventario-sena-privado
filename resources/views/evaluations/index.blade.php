@extends('layouts.app')
@section('content')


<div class="contenedor">
    <div class="formulario">
        <form action="#" method="POST">
            <div class="campo">
                <label for="campo1">Plan de trabajo</label>
                <input type="number" id="campo1" name="campo1" placeholder="Digite plan de trabajo" required>
            </div>
            <div class="campo">
                <label for="campo2">Fecha</label>
                <input type="date" id="campo2" name="campo2" placeholder="Ingrese fecha" required>
            </div>
            <div class="campo">
                <label for="campo3">Mes</label>
                <input type="text" id="campo3" name="campo3" placeholder="Digite Mes" required>
            </div>
            <div class="campo">
                <label for="campo4">Parciales</label>
                <input type="number" id="campo4" name="campo4" placeholder="Digite Parciales" required>
            </div>
            <div class="campo">
                <label for="campo5">Finales</label>
                <input type="text" id="campo5" name="campo5" placeholder="Digite Finales" required>
            </div>
            <div class="campo">
                <label for="campo6">Extraordinaria</label>
                <input type="number" id="campo6" name="campo6" placeholder="Digite Extraordinaria" required>
            </div>

            <div class="campo">
                <label for="campo2">Instructor</label>
                <select class="form-select" name="campo3" id="campo3">
                    <option value="">Instructor1</option>
                    <option value="">Instructor2</option>
                    <option value="">Instructor3</option>
                </select>
            </div>
            <button type="submit" class="boton">Enviar</button>
        </form>

        <hr class="">

        <div class="table-responsive">
            <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Plan de trabajo</th>
                        <th>fecha</th>
                        <th>Mes</th>
                        <th>Parciales</th>
                        <th>Finales</th>
                        <th>Extraordinaria</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($coordinators as $coordinator)
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
</div>
@endsection
