@extends('layouts.app')
@section('content')

<div class="contenedor">
    <div class="mt-2 text-lg-center">
        <h4 class="card-title color mb-3 text-lg-center fw-semibold">Coordinaciones - Encargados <i class="bi bi-building-fill-check"></i></h4>
        <p class="fw-semibold text-secondary">Registro y Panel de control de los diferentes coordinaciones</p>
    </div>
    <div class="formulario">
        <form action="{{route('coordinators.post')}}" method="post" class="row needs-validation" novalidate>
            @csrf
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-semibold">Coordinacion:</label>
                <input type="text" class="form-control border-2 shadow-sm" id="coordinacion" name="coordinacion"
                    placeholder="Ingresar nombre y apellidos" required>
                <div class="invalid-feedback fw-medium" class="">
                    <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                </div>
                @if ($errors->has('coordinacion'))
                    <div class="text-danger fw-medium small">
                        <i class="bi bi-exclamation-circle"></i>
                        Este campo es obligatorio!
                    </div>
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-semibold">Encargado:</label>
                <input type="text" class="form-control border-2 shadow-sm" id="encargado" name="encargado"
                    placeholder="Ingresar nombre y apellidos" required>
                <div class="invalid-feedback fw-medium" class="">
                    <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                </div>
                @if ($errors->has('encargado'))
                    <div class="text-danger fw-medium small">
                        <i class="bi bi-exclamation-circle"></i>
                        Este campo es obligatorio!
                    </div>
                @endif
            </div>



            <div class="text-center mb-2">
                <button type="submit" class="btn btn-success fw-medium sahdow-sm ">Registrar
                    Funcionario <i class="bi bi-person-fill-check"></i></button>
            </div>
        </form>

        <hr class="">

        <div class="table-responsive">
            <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Coordinacion</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coordinators as $coordinator)
                    <tr>
                        <td>{{ $coordinator->coordinacion }}</td>
                        <td>{{ $coordinator->encargado }}</td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-warning btn-sm fw-semibold me-2"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $coordinator->id }}">
                                Editar <i class="bi bi-pencil-square"></i>
                            </button>
                            <form id="eliminarForm" action="{{ route('coordinators.destroy', $coordinator->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger modificar btn-sm" id="editarBtn">Eliminar <i  class="bi bi-trash3"></i> </button>
                              </form>
                        </td>
                    </tr>
                    @include('coordinators.edit')
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
