import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

const file = document.querySelector("#edity");
const preview = document.querySelector(".edity img");
const imgSrc = preview.src;
let id = document.querySelector("#id");
id = id.value;
let idUser = document.querySelector("#idUser");
idUser = idUser.value;

//acionado um evento ao ocorrer uma alteração de valor do elemento pelo usuário
file.addEventListener("change", (e) => {
  // e = evento, e.target o input de type file, e.target.files.item(0) a imagem selecionada
  //add a variavel fileToUpload o imagem selecionada
  const fileToUpload = e.target.files.item(0);
  if (fileToUpload) {
    if (/\.(jpe?g|png)$/i.test(fileToUpload.name)) {
      if (fileToUpload.size <= 1022924) {
        //ler o conteudo do arquivo selecionado, lembrando q de maneira assincrona
        const reader = new FileReader();

        // evento disparado quando o reader terminar de ler
        reader.addEventListener("load", (e) => {
          //dps de ler e converter o arquivo para DataURL joga dentro do src da img
          preview.src = e.target.result;
        });
        // solicita ao reader que leia o arquivo
        // transformando-o para DataURL.
        // Isso disparará o evento reader.onload.
        reader.readAsDataURL(fileToUpload);
      } else {
        // caso o tamanho seja invalido, redireciona, passando um variavel get
        location = `/SMILIPS/controller/DAO/propaganda/propagandaDAO.php?img_propaganda=Tamanho de Arquivo Inválido!&&editar=${id}&&usuarioID=${idUser}`;
      }
    } else {
      // caso o formato seja invalido, passando um variavel get
      location = `/SMILIPS/controller/DAO/propaganda/propagandaDAO.php?img_propaganda=Formato de Arquivo Inválido!&&editar=${id}&&usuarioID=${idUser}`;
    }
  } else {
    // caso n seja selecionada nenhuma img ele retorna para a q foi cadastrada no DB
    preview.src = imgSrc;
  }
});

// buttons excluir imovel
const btnCancel = document.querySelector(".delete button[type=button]");
const checkbox = document.querySelector("#delete");

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(".delete input[name=senha]");
const btns = document.querySelectorAll(".delete .icon_senha i");

// se clicar no botao cancelar o checkbox e desmarcado
btnCancel.addEventListener("click", () => {
  checkbox.checked = false;
  senhas.forEach((senha, index) => {
    senha.value = "";
    senha.type = "password";
    btns[index].classList.add("fa-eye");
    btns[index].classList.remove("fa-eye-slash");
  });
});

// add um envento de click para mudar o tipo de input de password para text e alternando o icone de visualizacao
btns.forEach((btn, index) =>
  btn.addEventListener("click", () => trocarIconeSenha(senhas, index, btn))
);

senhas.forEach((senha) => {
  senha.addEventListener("focus", () => {
    senha.classList.add("active");
  });

  senha.addEventListener("blur", () => {
    if (senha.value == "") {
      senha.classList.remove("active");
    }
  });
});
