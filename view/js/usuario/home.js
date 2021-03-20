let toggle = document.querySelector('.toggle');
let icons = document.querySelectorAll('.toggle i');
let navegation = document.querySelector('.navigation');


toggle.addEventListener('click', () => {
    icons.forEach(icon => {
        icon.classList.toggle('hide');
    });
    toggle.classList.toggle('active');
    navegation.classList.toggle('active');
});