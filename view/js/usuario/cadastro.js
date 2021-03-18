// capturando o campo de senha e o icone de visualizar
let senha = document.querySelector('.form-cad .input-container .input-field input[type=password]');
let btn = document.querySelector('.form-cad .input-container .input-field i');

// add um envento de click para mudar o tipo deinput de password para text
btn.addEventListener('click', () => {
    senha.type == 'password' ? senha.type = 'text' : senha.type = 'password';
    senha.focus();
});

// se o input tiver focu e estiver vazio add a clase togle
senha.addEventListener('focus', () => {
    if (senha.value == '') {
        senha.classList.toggle('active');
    }
});
// inverso da de cima ou seja quando o campo perde o focu
senha.addEventListener('blur', () => {
    if (senha.value == '') {
        senha.classList.toggle('active');
    }

});