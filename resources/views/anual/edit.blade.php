<div class="modal fade" id="edit{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 color" id="staticBackdropLabel">Modificar Información <i
                        class="bi bi-pencil-square"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('anual.update', $row->id) }}" method="POST"id="formEdit{{ $row->id }}"
                class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row me-0">
                        <div class="col-md-12 mb-3">
                            <label for="rol" class="form-label fw-semibold">Funcionario:</label>
                            <select class="form-select border-2 shadow-sm" id="funcionario_id" name="funcionario_id" required>
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

                        <div class="col-md-12 mb-4">
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

                        <div class="col-md-6 mb-4">
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
                        <div class="col-md-6 mb-4">
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

                        <div class="col-md-6 mb-4">
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

                        <div class="col-md-6 mb-4">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-success"
                        onclick="validarForm({{ $row->id }})">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
