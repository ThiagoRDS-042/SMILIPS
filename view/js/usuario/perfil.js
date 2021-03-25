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


let previewImg = document.querySelector('.preview-img');
let fileChooser = document.querySelector('.file-chooser');

fileChooser.addEventListener('change', e => {
    let fileToUpload = e.target.files.item(0);
    let reader = new FileReader();

    // evento disparado quando o reader terminar de ler 
    reader.addEventListener('load', e => {
        previewImg.src = e.target.result;
    });
    // solicita ao reader que leia o arquivo 
    // transformando-o para DataURL. 
    // Isso disparará o evento reader.onload.
    reader.readAsDataURL(fileToUpload);
});