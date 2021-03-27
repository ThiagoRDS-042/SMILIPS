// capturando o campo de senha e o icone de visualizar
let senha = document.querySelector('.middle .field-input input[type=password]');
let btn = document.querySelector('.middle .field-input i');

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btn.addEventListener('click', () => {
    if (senha.type == 'password') {
        senha.type = 'text';
        btn.classList.remove('fa-eye');
        btn.classList.add('fa-eye-slash');
    } else {
        senha.type = 'password';
        btn.classList.add('fa-eye');
        btn.classList.remove('fa-eye-slash');
    }
    senha.focus();
});