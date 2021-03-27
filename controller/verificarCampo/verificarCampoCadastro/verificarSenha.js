let passwords = document.querySelectorAll('.senha');
let msgs = document.querySelectorAll('.msg-senha');

//mesma coisa da pagina de email porem sem usar ajax pq n pretendo fazer requisicoes ao DB
passwords.forEach((senha, index) => {
    senha.addEventListener('keyup', () => {
        //verificando se a senha possui formato valido
        if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)) {

            //se ambas as senhas n estao nulas
            if (passwords[0].value != '' && passwords[1].value != '') {

                //se ambas sao iguais
                if (passwords[0].value == passwords[1].value) {

                    // adicionando conteudo a msgSenha e estilo ao campo senha
                    msgs[0].innerHTML = '<font color="#27ae60"><b>Senhas Iguáis!</b></font>';
                    msgs[1].innerHTML = '<font color="#27ae60"><b>Senhas Iguáis!</b></font>';
                    passwords[0].style = 'box-shadow: 1px 2px 3px #2ecc71;';
                    passwords[1].style = 'box-shadow: 1px 2px 3px #2ecc71;';

                } else {
                    // adicionando conteudo a msgSenha e estilo ao campo senha
                    msgs[0].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                    msgs[1].innerHTML = '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
                    passwords[0].style = 'box-shadow: 1px 2px 3px #e74c3c;';
                    passwords[1].style = 'box-shadow: 1px 2px 3px #e74c3c;';

                }

            } else {
                msgs[index].innerHTML = '<font color="#27ae60"><b>Senha Válida!</b></font>';
                senha.style = 'box-shadow: 1px 2px 3px #2ecc71;';
            }

        } else {

            msgs[index].innerHTML = '<font color="#e74c3c"><b>Senha Inválida! (Necessário 8+ Caracteres Alfanumericos)</b></font>';
            senha.style = 'box-shadow: 1px 2px 3px #e74c3c;';

        }

    });

    //ao campo perder focu
    senha.addEventListener('blur', () => {
        if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)) {
            if (passwords[0].value != '' && passwords[1].value != '') {
                if (passwords[0].value == passwords[1].value) {
                    msgs[0].innerHTML = '';
                    msgs[1].innerHTML = '';
                    passwords[0].style = 'box-shadow: none';
                    passwords[1].style = 'box-shadow: none';
                } else {
                    msgs[0].innerHTML = '<font color="#842029"><b>Senhas Diferentes!</b></font>';
                    msgs[1].innerHTML = '<font color="#842029"><b>Senhas Diferentes!</b></font>';
                    passwords[0].style = 'box-shadow: 1px 2px 3px #e74c3c;';
                    passwords[1].style = 'box-shadow: 1px 2px 3px #e74c3c;';
                }
            } else {
                msgs[index].innerHTML = '';
                senha.style = 'box-shadow: none';
            }
        } else if (senha.value == '') {
            msgs[index].innerHTML = '';
            senha.style = 'box-shadow: none';
        } else {
            msgs[index].innerHTML = '<font color="#842029"><b>Senha Inválida! (Necessário 8+ Caracteres Alfanumericos)</b></font>';
            senha.style = 'box-shadow: 1px 2px 3px #e74c3c;';
        }
    });
});