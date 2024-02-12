<div class="modal fade" id="edit{{ $coordinator->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 color" id="staticBackdropLabel">Modificar Información <i
                        class="bi bi-pencil-square"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('coordinators.update', $coordinator->id) }}" method="POST" id="formEdit{{ $coordinator->id }}" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <label for="rol" class="form-label fw-semibold">Coordinacion:</label>
                            <input type="text" class="form-control border-2 shadow-sm" name="coordinacion" id="coordinacion"  required value="{{ $coordinator->coordinacion }}"  >
                            <div class="invalid-feedback fw-medium">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('coordinacion'))
                                <div class="text-danger fw-medium">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Debe seleccionar una opción!
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">Encargado:</label>
                            <input type="text" class="form-control border-2 shadow-sm"name="encargado" id="encargado"  required value="{{ $coordinator->encargado }}"  >
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn  btn-success" onclick="validarForm({{ $coordinator->id }})">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

