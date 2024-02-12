<div class="modal fade" id="edit{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 color" id="staticBackdropLabel">Modificar Información <i
                        class="bi bi-pencil-square"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mensual.update', $row->id) }}" method="POST"id="formEdit{{ $row->id }}"
                class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row me-0">
                        <div class="col-md-12 mb-3">
                            <label for="rol" class="form-label fw-semibold">Funcionario:</label>
                            <select class="form-select border-2 shadow-sm" id="funcionario_id" name="funcionario_id"
                                required>
                                <option selected value="{{ $row->funcionario_id }}">{{ $row->funcionarios->user->name }}
                                </option>
                                @foreach ($funcionarios as $rows)
                                    @if ($rows->id !== $row->funcionario_id)
                                        <option value="{{ $rows->id }}">{{ $rows->user->name }}</option>
                                    @endif
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

                        <div class="col-md-6 mb-3">
                            <label for="rol" class="form-label fw-semibold">Mes:</label>
                            <select class="form-select border-2 shadow-sm" id="month" name="month" required>
                                <option selected value="{{$row->month}}">{{$row->month}}</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                            <div class="invalid-feedback fw-medium">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('month'))
                                <div class="text-danger fw-medium">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Debe seleccionar una opción!
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Fecha Inicio:</label>
                            <input type="number" class="form-control border-2 shadow-sm" id="month_value"
                                name="month_value" value="{{ $row->month_value }}"
                                placeholder="Ingresar nombre y apellidos" required>
                            <div class="invalid-feedback fw-medium" class="">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('month_value'))
                                <div class="text-danger fw-medium small">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Este campo es obligatorio!
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success"
                        onclick="validarForm({{ $row->id }})">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
