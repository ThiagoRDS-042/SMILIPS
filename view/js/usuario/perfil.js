// capturando todos os inputs
let inputs = document.querySelectorAll(
  ".perfil .content .info-user .field-edit input"
);

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

let previewImg = document.querySelector(".preview-img");
let fileChooser = document.querySelector(".file-chooser");

//acionado um evento ao ocorrer uma alteração de valor do elemento pelo usuário
fileChooser.addEventListener("change", (e) => {
  // e = evento, e.target o input de type file, e.target.files.item(0) a imagem selecionada
  //add a variavel fileToUpload o imagem selecionada
  let fileToUpload = e.target.files.item(0);
  if (fileToUpload) {
    if (/\.(jpe?g|png|gif)$/i.test(fileToUpload.name)) {
      //ler o conteudo do arquivo selecionado, lembrando q de maneira assincrona
      let reader = new FileReader();

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
      let id = document.querySelector("#id");
      id = id.value;
      location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Formato de Arquivo Inválido!&&id=${id}`;
    }
  } else {
    let id = document.querySelector("#id");
    id = id.value;
    previewImg.src = "/SMILIPS/controller/usuario/imgPerfil.php";
    location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Selecione uma Imagem!&&id=${id}`;
  }
});
