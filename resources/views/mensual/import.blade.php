<div class="modal fade" id="import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 color" id="staticBackdropLabel">Importar Excel <i
                        class="bi bi-pencil-square"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mensual.import') }}" method="POST" enctype = "multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input class="form-control" type="file" name="mensuals_excel" id="mensuals_excel" accept=".xlsx"
                        required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>
