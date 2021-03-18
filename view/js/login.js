// capturando o campo de senha e o icone de visualizar
let senha = document.querySelector('.middle .field-input input[type=password]');
let btn = document.querySelector('.middle .field-input i');

// add um envento de click para mudar o tipo deinput de password para text
btn.addEventListener('click', () => {
    senha.type == 'password' ? senha.type = 'text' : senha.type = 'password';
    senha.focus();
});

// capturando todos os inputs
let inputs = document.querySelectorAll('main .middle .field-input input');

// agindo sobre cada input
inputs.forEach(input => {
    // se o input tiver focu e estiver vazio add a clase togle
    input.addEventListener('focus', () => {
        if (input.value == '') {
            input.classList.toggle('focus');
        }
    });
    // inverso da de cima ou seja quando o campo perde o focu
    input.addEventListener('blur', () => {
        if (input.value == '') {
            input.classList.toggle('focus');
        }

    });
});