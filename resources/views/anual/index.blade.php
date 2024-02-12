@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-3 text-lg-center fw-semibold">Asignaciones Anual</h4>
        </div>
        <div class="formulario">
            <form action="{{ route('anual.post') }}" method="post" class="row needs-validation" novalidate>
                @csrf

                <div class="col-md-4 mb-3">
                    <label for="rol" class="form-label fw-semibold">Funcionario:</label>
                    <select class="form-select border-2 shadow-sm" id="funcionario_id" name="funcionario_id" required>
                        <option selected disabled value="">Seleccionar Opción...</option>
                        @foreach ($funcionarios as $row)
                            <option value="{{ $row->id }}">{{ $row->user->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('funcionario_id'))
                        <div class="text-danger fw-medium">
                            <i class="bi bi-exclamation-circle"></i>
                            Debe seleccionar una opción!
                        </div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="rol" class="form-label fw-semibold">Año:</label>
                    <input type="number" class="form-control border-2 shadow-sm" id="year" name="year" placeholder="Ingresar número de identificación" required>

                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('year'))
                        <div class="text-danger fw-medium">
                            <i class="bi bi-exclamation-circle"></i>
                            Debe seleccionar una opción!
                        </div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="identificacion" class="form-label fw-semibold">Valor:</label>
                    <input type="number" class="form-control border-2 shadow-sm" id="year_value" name="year_value"
                        placeholder="Ingresar número de identificación" required>
                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('year_value'))
                        <div class="text-danger fw-medium">
                            <i class="bi bi-exclamation-circle"></i>
                            Este campo es obligatorio!
                        </div>
                    @endif
                </div>
                <div class="text-center mb-2">
                    <button type="submit" class="btn btn-success fw-medium sahdow-sm ">Registrar
                        Asignacion <i class="bi bi-person-fill-check"></i></button>
                </div>
            </form>

            <hr class="">

            <div class="table-responsive">
                <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Funcionario</th>
                            <th>Año</th>
                            <th>Asignacion</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anuals as $row)
                            <tr>
                                <td>{{ $row->funcionarios->user->name }}</td>
                                <td>{{ $row->year }}</td>
                                <td> {{ $row->year_value }}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-warning btn-sm fw-semibold me-2"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}">
                                        Editar <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form id="eliminarForm" action="{{ route('anual.destroy', $row->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-danger modificar btn-sm"
                                            id="editarBtn">Eliminar <i class="bi bi-trash3"></i> </button>
                                    </form>
                                </td>

                            </tr>
                            @include('anual.edit')
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
