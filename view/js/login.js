// capturando o campo de senha e o icone de visualizar
let senha = document.querySelector('.middle .field-input input[type=password]');
let btn = document.querySelector('.middle .field-input i');

// add um envento de click para mudar o tipo deinput de password para text
btn.addEventListener('click', () => {
    senha.type == 'password' ? senha.type = 'text' : senha.type = 'password';
    senha.focus();
});