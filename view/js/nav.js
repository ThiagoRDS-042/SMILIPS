let icons = document.querySelectorAll('.icon i');
let check = document.querySelector('#btn');


icons[0].addEventListener('click', () => {
    icons[0].classList.toggle('hide');
    icons[1].classList.toggle('hide');
});

icons[1].addEventListener('click', () => {
    icons[0].classList.toggle('hide');
    icons[1].classList.toggle('hide');
});