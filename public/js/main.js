const validarForm = (form) => {
    event.preventDefault();
    let formulario = document.getElementById(`formEdit${form}`)
    if (!formulario.checkValidity()) {
        let elements = formulario.elements;
        let arr = [].slice.call(elements);
        arr.forEach(element => {
            let mensaje = document.getElementsByClassName(element.id)
            if (!element.checkValidity()) {
                mensaje[0].classList.remove('d-none');
                element.classList.add('border-danger');
            } else {
                if (mensaje[0] && !mensaje[0].classList.contains('d-none')) {
                    mensaje[0].classList.add('d-none');
                    element.classList.remove('border-danger');
                }
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Seguro que deseas realizar esta acción?',
            showCancelButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                formulario.submit();
            }
        })
    }
}


new DataTable('.table-datatable', {
    responsive: true,
    info: false,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por páginas",
        "zeroRecords": "No se encontro ningun registro - Disculpa",
        "infoEmpty": "No records available",
        "search": "Buscar Registros:",
        "loadingRecords": "Cargando Registros...",
        "paginate": {
            "first": "Primera",
            "last": "Última",
            "next": "Siguiente",
            "previous": "Previa"
        }
    },
});


var modalId = document.getElementsByClassName('modal');

modalId.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget;
    let recipient = button.getAttribute('data-bs-whatever');
});


function mayus(e) {
    e.value = e.value.toUpperCase();
}

function cambiarEstilos() {
    var botones = document.getElementsByClassName('fc-button-primary');
    for (var i = 0; i < botones.length; i++) {
        botones[i].classList.add('clicked');
    }
}
