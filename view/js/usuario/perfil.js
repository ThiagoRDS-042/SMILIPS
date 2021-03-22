// capturando todos os inputs
let inputs = document.querySelectorAll('.perfil .content .info-user .field-edit input');

// agindo sobre cada input
inputs.forEach(input => {
    // se o input tiver focu e estiver vazio add a clase togle
    input.addEventListener('focus', () => {
        if (input.value == '') {
            console.log(input);
            input.classList.toggle('focus');
        }
    });
    // inverso da de cima ou seja quando o campo perde o focu
    input.addEventListener('blur', () => {
        if (input.value == '') {
            console.log(input);
            input.classList.toggle('focus');
        }

    });
});