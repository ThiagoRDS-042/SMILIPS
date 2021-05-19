const file = document.querySelector("#cad");
const preview = document.querySelector(".cad_anuncio img");
const icon = document.querySelector(".cad_anuncio i");
const span = document.querySelector(".cad_anuncio span");

//acionado um evento ao ocorrer uma alteração de valor do elemento pelo usuário
file.addEventListener("change", (e) => {
  // e = evento, e.target o input de type file, e.target.files.item(0) a imagem selecionada
  //add a variavel fileToUpload o imagem selecionada
  const fileToUpload = e.target.files.item(0);
  if (fileToUpload) {
    if (/\.(jpe?g|png)$/i.test(fileToUpload.name)) {
      if (fileToUpload.size <= 1022924) {
        icon.style.display = "none";
        preview.style.display = "block";
        span.style.display = "none";
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
        location =
          "/SMILIPS/controller/DAO/propaganda/propagandaDAO.php?img_propaganda=Tamanho de Arquivo Inválido!";
      }
    } else {
      // caso o formato seja invalido, redireciona para a pagina usuarioDAO.php, passando um variavel get
      location =
        "/SMILIPS/controller/DAO/propaganda/propagandaDAO.php?img_propaganda=Formato de Arquivo Inválido!";
    }
  } else {
    // caso n selecione nenhuma img, redireciona para a pagina usuarioDAO.php, passando um variavel get, e alterando a img do preview para a q esta no DB
    preview.src = "";
    preview.style.display = "none";
    icon.style.display = "block";
    span.style.display = "block";
  }
});
