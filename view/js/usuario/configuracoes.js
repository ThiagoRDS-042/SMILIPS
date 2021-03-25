let btnCancel = document.querySelector('.cancel');
let checkbox = document.querySelector('input[type=checkbox]');

btnCancel.addEventListener('click', () => {
    checkbox.checked = false;
});