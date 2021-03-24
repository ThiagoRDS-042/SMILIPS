// capturando todos os inputs
let inputs = document.querySelectorAll('.perfil .content .info-user .field-edit input');

if (inputs[6].value == '') {
    inputs[6].classList.remove('focus')
}

// agindo sobre cada input
inputs.forEach(input => {
    // se o input tiver focu e estiver vazio add a clase togle
    input.addEventListener('focus', () => {
        if (input.value == '') {
            input.classList.add('focus');
        }
    });
    // inverso da de cima ou seja quando o campo perde o focu
    input.addEventListener('blur', () => {
        if (input.value == '') {
            input.classList.remove('focus');
        }
    });
});

let btnCancel = document.querySelector('.btn-cancelar');
let btnFechar = document.querySelector('.title-escolher-img i');
let checkbox = document.querySelector('input[type=checkbox]');

btnCancel.addEventListener('click', () => {
    checkbox.checked = false;
});

btnFechar.addEventListener('click', () => {
    checkbox.checked = false;
});