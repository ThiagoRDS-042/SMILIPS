// capturando o campo de senha e o icone de visualizar
let senhas = document.querySelectorAll('input[type=password]');
let btns = document.querySelectorAll('.field-senha i');

// add um envento de click para mudar o tipo de input de password para text
btns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        if (senhas[index].type == 'password') {
            senhas[index].type = 'text';
            btn.classList.remove('fa-eye');
            btn.classList.add('fa-eye-slash');
        } else {
            senhas[index].type = 'password';
            btn.classList.add('fa-eye');
            btn.classList.remove('fa-eye-slash');
        }
        senhas[index].focus();
    });
});