// capturando o campo de senha e o icone de visualizar
let inputs = document.querySelectorAll('.form-cad .input-container .input-field input');
let counters = document.querySelectorAll('.form-cad .input-container .input-field .counter');
let passord = document.querySelector('.form-cad .input-container .input-field input[type=password]');
let btn = document.querySelector('.form-cad .input-container .input-field i');
let maxLengths = [];

inputs.forEach(input => {
    maxLengths.push(input.attributes.maxlength.value);
});

inputs.forEach((input, index) => {
    input.addEventListener('keyup', () => {
        if (index < 3) {
            counters[index].innerText = String(Number(maxLengths[index]) - Number(input.value.length));
        } else if (index > 3) {
            counters[index - 1].innerText = String(Number(maxLengths[index]) - Number(input.value.length));
        }
    });
});

// add um envento de click para mudar o tipo deinput de password para text
btn.addEventListener('click', () => {
    if (passord.type == 'password') {
        passord.type = 'text';
        btn.classList.remove('fa-eye');
        btn.classList.add('fa-eye-slash');
    } else {
        passord.type = 'password';
        btn.classList.add('fa-eye');
        btn.classList.remove('fa-eye-slash');
    }
    passord.focus();
});



inputs.forEach(input => {
    // se o input tiver focu e estiver vazio add a classe togle
    input.addEventListener('focus', () => {
        if (input.value == '') {
            input.classList.toggle('active');
        }
    });
    // inverso da de cima ou seja quando o campo perde o focu
    input.addEventListener('blur', () => {
        if (input.value == '') {
            input.classList.toggle('active');
        }

    });
});