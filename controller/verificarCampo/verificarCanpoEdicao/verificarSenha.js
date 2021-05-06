const passwords = document.querySelectorAll(".senha");
const msgs = document.querySelectorAll(".msg");
const userID = document.querySelector("#id");
const idAdm = document.querySelector("#idAdm");

const senhaAtual = document.querySelector(".senhaAtual");
const msgSenhaAtual = document.querySelector(".msgAtual");

// verificar senha atual se é correta, verifica se e um adm ou usuario
senhaAtual.addEventListener("keyup", () => {
  const url = userID
    ? "/SMILIPS/controller/DAO/usuario/campoValidoEdicao.php"
    : "/SMILIPS/controller/DAO/administrador/campoValidoEdicao.php";
  const id = userID ? userID.value : idAdm.value;

  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: {
      senhaAtual: senhaAtual.value,
      id: id,
    },
    success: function (msg) {
      $("#msgSenhaAtual").html(msg);
    },
  });
});

senhaAtual.addEventListener("blur", () => {
  const url = userID
    ? "/SMILIPS/controller/DAO/usuario/campoValidoEdicao.php"
    : "/SMILIPS/controller/DAO/administrador/campoValidoEdicao.php";
  const id = userID ? userID.value : idAdm.value;

  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: {
      senhaAtual: senhaAtual.value,
      id: id,
    },
    success: function (msg) {
      if (msg == '<font color="#27ae60"><b>Senha Válida!</b></font>') {
        $("#msgSenhaAtual").html("");
      } else if ($("#senhaAtual").val() == "") {
        $("#msgSenhaAtual").html("");
      } else {
        $("#msgSenhaAtual").html(msg);
      }
    },
  });
});

// verficar senhas novas
passwords.forEach((senha, index) => {
  senha.addEventListener("click", () => {
    if (senhaAtual.value == "" || msgSenhaAtual.children[0]) {
      // se a senha atual e invalida ou nula
      senhaAtual.focus();
    } else {
      //ao digitar no campo
      senha.addEventListener("keyup", () => {
        if (
          /(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)
        ) {
          //se o formato da senha e valido
          if (passwords[0].value != "" && passwords[1].value != "") {
            //se ambas as senhas n estao nulas
            if (passwords[0].value == passwords[1].value) {
              //se ambas sao iguais
              msgs[0].innerHTML =
                '<font color="#2ecc71"><b>Senhas Igauis!</b></font>';
              msgs[1].innerHTML =
                '<font color="#2ecc71"><b>Senhas Igauis!</b></font>';
            } else {
              msgs[0].innerHTML =
                '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
              msgs[1].innerHTML =
                '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
            }
          } else {
            msgs[index].innerHTML =
              '<font color="#2ecc71"><b>Senha Válida!</b></font>';
          }
        } else {
          msgs[index].innerHTML =
            '<font color="#e74c3c"><b>Senha Inválida ( Necessario 8+ Caracteres Alfanuméricos )</b></font>';
        }
      });

      //ao campo perder foco
      senha.addEventListener("blur", () => {
        if (
          /(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.value)
        ) {
          if (passwords[0].value != "" && passwords[1].value != "") {
            if (passwords[0].value == passwords[1].value) {
              msgs[0].innerHTML = "";
              msgs[1].innerHTML = "";
            } else {
              msgs[0].innerHTML =
                '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
              msgs[1].innerHTML =
                '<font color="#e74c3c"><b>Senhas Diferentes!</b></font>';
            }
          } else {
            msgs[index].innerHTML = "";
          }
        } else if (senha.value == "") {
          msgs[index].innerHTML = "";
        } else {
          msgs[index].innerHTML =
            '<font color="#e74c3c"><b>Senha Inválida ( Necessario 8+ Caracteres Alfanuméricos )</b></font>';
        }
      });
    }
  });
});
