const previewImgs = document.querySelectorAll(".preview-img");
const files = document.querySelectorAll("input[type=file]");
const array = [];
let id = document.querySelector("#id");
id = id.value;

previewImgs.forEach((arr) => {
  array.push(arr.attributes.src.value);
});

files.forEach((file, index) => {
  file.addEventListener("change", (e) => {
    const fileToUpload = e.target.files.item(0);
    if (fileToUpload) {
      if (/\.(jpe?g|png|gif)$/i.test(fileToUpload.name)) {
        if (fileToUpload.size <= 1022924) {
          const reader = new FileReader();
          reader.readAsDataURL(fileToUpload);

          reader.addEventListener("load", (e) => {
            previewImgs[index].src = e.target.result;
          });
        } else {
          console.log(id);
          // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Formato de Arquivo Inválido!&&id=${id}`;
        }
      } else {
        console.log(id);
        // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Formato de Arquivo Inválido!&&id=${id}`;
      }
    } else {
      console.log(id);
      previewImgs[index].src = array[index];
      // location = `/SMILIPS/controller/usuario/usuarioDAO.php?notificacao_imgs=Selecione uma Imagem!&&id=${id}`;
    }
  });
});
