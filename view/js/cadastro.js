// capturando todos os inputs os contadores o campo de senha e o icone de visualizacao 
let inputs = document.querySelectorAll('.form-cad .input-container .input-field input');
let counters = document.querySelectorAll('.form-cad .input-container .input-field .counter');
let passord = document.querySelector('.form-cad .input-container .input-field input[type=password]');
let btn = document.querySelector('.form-cad .input-container .input-field i');
let maxLengths = [];

// atribuindo valores ao array maxlengths de acordo com o atributo maxkength dos inputs
inputs.forEach(input => {
    maxLengths.push(input.attributes.maxlength.value);
});

//atribuindo os valores dos contadores nos inputs
inputs.forEach((input, index) => {
    //acionando evente ao digitar no input
    input.addEventListener('keyup', () => {
        //se o index for maior q 3
        if (index < 3) {
            //converto os maxlengths para number subtraio e converto de novo para sting e add ao contador
            counters[index].innerText = String(Number(maxLengths[index]) - Number(input.value.length));
        } else if (index > 3) {
            // de o index for maior q 3 subtraio 1 pq a um input q n possui contador
            counters[index - 1].innerText = String(Number(maxLengths[index]) - Number(input.value.length));
        }
    });
});

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
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
    // se o input tiver focu e estiver vazio add a classe active
    //obs: o togle add se ja n tiver uma classe e excluir se ja existir
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