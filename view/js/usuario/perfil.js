// capturando todos os inputs
const inputs = document.querySelectorAll(
  ".perfil .content .info-user .field-edit input"
);

// capturando o id
let id = document.querySelector("#id");
id = id.value;

if (inputs[6].value == "") {
  //removendo a classe focus do 7 input
  inputs[6].classList.remove("focus");
}

// agindo sobre cada input
inputs.forEach((input) => {
  // se o input tiver focu e estiver vazio add a clase togle
  input.addEventListener("focus", () => {
    if (input.value == "") {
      input.classList.add("focus");
    }
  });
  // inverso da de cima ou seja quando o campo perde o focu
  input.addEventListener("blur", () => {
    if (input.value == "") {
      input.classList.remove("focus");
    }
  });
});

// capturando a div de preview e o input do tipo file
const previewImg = document.querySelector(".preview-img");
const fileChooser = document.querySelector(".file-chooser");

//acionado um evento ao ocorrer uma alteração de valor do elemento pelo usuário
fileChooser.addEventListener("change", (e) => {
  // e = evento, e.target o input de type file, e.target.files.item(0) a imagem selecionada
  //add a variavel fileToUpload o imagem selecionada
  const fileToUpload = e.target.files.item(0);
  if (fileToUpload) {
    if (/\.(jpe?g|png)$/i.test(fileToUpload.name)) {
      //ler o conteudo do arquivo selecionado, lembrando q de maneira assincrona
      const reader = new FileReader();

      // evento disparado quando o reader terminar de ler
      reader.addEventListener("load", (e) => {
        //dps de ler e converter o arquivo para DataURL joga dentro do src da img
        previewImg.src = e.target.result;
      });
      // solicita ao reader que leia o arquivo
      // transformando-o para DataURL.
      // Isso disparará o evento reader.onload.
      reader.readAsDataURL(fileToUpload);
    } else {
      // caso o formato seja invalido, redireciona para a pagina usuarioDAO.php, passando um variavel get
      location = `/SMILIPS/controller/DAO/usuario/usuarioDAO.php?notificacao_imgs_perfil=Formato de Arquivo Inválido!&&id=${id}`;
    }
  } else {
    // caso n selecione nenhuma img, redireciona para a pagina usuarioDAO.php, passando um variavel get, e alterando a img do preview para a q esta no DB
    previewImg.src = "/SMILIPS/controller/usuario/imgPerfil.php";
    location = `/SMILIPS/controller/DAO/usuario/usuarioDAO.php?notificacao_imgs_perfil=Selecione uma Imagem!&&id=${id}`;
  }
});
