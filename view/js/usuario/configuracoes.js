let btnCancel = document.querySelector('.cancel');
let checkbox = document.querySelector('input[type=checkbox]');

// se clicar no botao cancelar o checkbox e desmarcado
btnCancel.addEventListener('click', () => {
    checkbox.checked = false;
});