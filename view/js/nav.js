// pegando o span que contem os dois icones
let icon = document.querySelector('.icon');
let icons = document.querySelectorAll('.icon i');

// add um evento de click no span para alternar de icone
icon.addEventListener('click', () => {
    icons[0].classList.toggle('hide');
    icons[1].classList.toggle('hide');
});