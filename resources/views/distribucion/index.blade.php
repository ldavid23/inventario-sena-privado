@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-3 text-lg-center fw-semibold">Distribuciones Seguimiento</h4>
        </div>
        <div class="formulario">
            <form action="{{ route('distribucion.post') }}" method="post" class="row needs-validation" novalidate>
                @csrf

                <div class="col-md-3 mb-3">
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

                <div class="col-md-3 mb-3">
                    <label for="rol" class="form-label fw-semibold">Mes:</label>
                    <select class="form-select border-2 shadow-sm" id="mes" name="mes" required>
                        <option selected disabled value="">Seleccionar Opción...</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                    </select>
                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('mes'))
                        <div class="text-danger fw-medium">
                            <i class="bi bi-exclamation-circle"></i>
                            Debe seleccionar una opción!
                        </div>
                    @endif
                </div>

                <div class="col-md-3 mb-3">
                    <label for="identificacion" class="form-label fw-semibold">Contrato De Aprendizaje:</label>
                    <input type="number" class="form-control border-2 shadow-sm" id="contratos" name="contratos"
                        placeholder="Ingresar valor mensual" required>
                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('contratos'))
                        <div class="text-danger fw-medium">
                            <i class="bi bi-exclamation-circle"></i>
                            Este campo es obligatorio!
                        </div>
                    @endif
                </div>

                <div class="col-md-3 mb-3">
                    <label for="identificacion" class="form-label fw-semibold">Otras Alternativas:</label>
                    <input type="number" class="form-control border-2 shadow-sm" id="alternativas" name="alternativas"
                        placeholder="Ingresar valor mensual" required>
                    <div class="invalid-feedback fw-medium">
                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                    </div>
                    @if ($errors->has('alternativas'))
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
                            <th>Mes</th>
                            <th>Contratos De Aprendizaje</th>
                            <th>Otras Alternativas</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($valores as $row)
                            <tr>
                                <td>{{ $row->funcionarios->user->name }}</td>
                                <td>{{ $row->mes }}</td>
                                <td> {{ $row->contratos }}</td>
                                <td> {{ $row->alternativas }}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-warning btn-sm fw-semibold me-2"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}">
                                        Editar <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form id="eliminarForm" action="{{ route('distribucion.destroy', $row->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger modificar btn-sm"
                                        id="editarBtn">Eliminar <i class="bi bi-trash3"></i> </button>
                                    </form>
                                </td>

                            </tr>
                            @include('distribucion.edit')
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
