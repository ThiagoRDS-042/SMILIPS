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

let img = document.querySelector('.perfil .img-user');

img.addEventListener('click', () => {
    let largura = (screen.width * 40) / 100;
    let altura = (screen.height * 50) / 100;
    let topo = (screen.height * 25) / 100;
    let esquerda = (screen.width * 30) / 100;

    window.open('/SMILIPS/view/pages/usuario/escolherImg.php', '', 'width=' + largura + ',height=' + altura + ',top=' + topo + ',left=' + esquerda + ',right=' + esquerda);
});