@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-1 text-lg-center fw-semibold">Control De Evaluaciones <i
                    class="bi bi-building-fill-check"></i></h4>
            <p class="fw-semibold text-secondary mb-5">Registro y Panel de control de los entregas de los diferentes tipos de evaliaciones</p>
        </div>

        <div class="m-2">
            <form action="{{ route('evaluations.post') }}" method="POST" class="d-grid needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-4 mb-4">
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


                    <div class="col-md-4 mb-4">
                        <label for="identificacion" class="form-label fw-semibold">Fecha:</label>
                        <input type="date" class="form-control border-2 shadow-sm" id="evaluation_date"
                            name="evaluation_date" placeholder="Ingresar número de identificación" required>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('evaluation_date'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="identificacion" class="form-label fw-semibold">Plan De Trabajo:</label>
                        <input type="number" class="form-control border-2 shadow-sm" id="workplan" name="workplan"
                            placeholder="Ingresar número de identificación" required>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('workplan'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="identificacion" class="form-label fw-semibold">Parciales:</label>
                        <input type="number" class="form-control border-2 shadow-sm" id="partials" name="partials"
                            placeholder="Ingresar número de identificación" required>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('partials'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="identificacion" class="form-label fw-semibold">Finales:</label>
                        <input type="number" class="form-control border-2 shadow-sm" id="finals" name="finals"
                            placeholder="Ingresar número de identificación" required>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('finals'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="identificacion" class="form-label fw-semibold">Extraordinarias:</label>
                        <input type="number" class="form-control border-2 shadow-sm" id="extraordinary"
                            name="extraordinary" placeholder="Ingresar número de identificación" required>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('extraordinary'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                </div>



                <div class="text-center mb-3 ">
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
                            <th>Instructor</th>
                            <th>fecha</th>
                            <th>Mes</th>
                            <th>Plan de trabajo</th>
                            <th>Parciales</th>
                            <th>Finales</th>
                            <th>Extraordinaria</th>
                            <th>Funciones</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluaciones as $evaluacion)
                            <tr>
                                <td>{{ $evaluacion->funcionarios->user->name }}</td>
                                <td>{{ $evaluacion->evaluation_date }}</td>
                                <td>{{ $evaluacion->evaluation_month }}</td>
                                <td>{{ $evaluacion->workplan }}</td>
                                <td>{{ $evaluacion->partials }}</td>
                                <td>{{ $evaluacion->finals }}</td>
                                <td>{{ $evaluacion->extraordinary }}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-warning btn-sm fw-semibold me-2"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $evaluacion->id }}">
                                        Editar <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form id="eliminarForm" action="{{ route('evaluations.destroy', $evaluacion->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger modificar btn-sm"
                                            id="editarBtn" >Eliminar <i class="bi bi-trash3"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            @include('evaluations.edit')
                        @endforeach
                </table>

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
