let passwords = document.querySelectorAll('.senha');
let msgs = document.querySelectorAll('.msg');

passwords.forEach((senha, index) => {
    senha.addEventListener('keyup', () => {
        if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)) {
            if (passwords[0].value != '' && passwords[1].value != '') {
                if (passwords[0].value == passwords[1].value) {
                    msgs[0].innerHTML = '<font color="#2ecc71"><b>Senhas Igauis!</b></font>';
                    msgs[1].innerHTML = '<font color="#2ecc71"><b>Senhas Igauis!</b></font>';
                } else {
                    msgs[0].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                    msgs[1].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                }

            } else {
                msgs[index].innerHTML = '<font color="#2ecc71"><b>Senha Válida!</b></font>';
            }
        } else {
            msgs[index].innerHTML = '<font color="#e74c3c"><b>Senha Inválida!</b></font>';
        }
    });

    senha.addEventListener('blur', () => {
        if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)) {
            if (passwords[0].value != '' && passwords[1].value != '') {
                if (passwords[0].value == passwords[1].value) {
                    msgs[0].innerHTML = '';
                    msgs[1].innerHTML = '';
                } else {
                    msgs[0].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                    msgs[1].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                }
            } else {
                msgs[index].innerHTML = '';
            }
        } else if (senha.value == '') {
            msgs[index].innerHTML = '';
        } else {
            msgs[index].innerHTML = '<font color="#e74c3c"><b>Senha Inválida!</b></font>';
        }
    });
});