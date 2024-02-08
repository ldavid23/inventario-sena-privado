(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()



const inputs = document.getElementsByTagName('input');
const mayuscula = function (e) {
    e.value = e.value.toUpperCase();
}

for (i = 1; i < inputs.length; i++) {
    if (inputs[i].getAttribute('type') == 'text' && inputs[i].id !== 'password') {
        let id = inputs[i].getAttribute('id');
        let input = document.getElementById(id);
        inputs[i].onkeyup = function () {
            mayuscula(input);
        }
    }
}
