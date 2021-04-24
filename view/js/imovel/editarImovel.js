// importando as funcoes
import definirMaxLength from "/SMILIPS/view/js/modules/definirMaxLength.js";
import { focusValidElement } from "/SMILIPS/view/js/modules/focusValid.js";
import { addClass, editSelect } from "/SMILIPS/view/js/modules/select.js";
import { validarTipoNumerico } from "/SMILIPS/view/js/modules/tiposNumericos.js";
import trocarIconeSenha from "/SMILIPS/view/js/modules/trocarIconeSenha.js";

// capturando todas as div que exibirao as imgs de preview, todos os arquivos passados,
// criando um array vazio e capturando o id do imovel e armazenando sem valor na variavel id

const previewImgs = document.querySelectorAll(".preview-img");
const files = document.querySelectorAll("input[type=file]");
const array = [];
let id = document.querySelector("#id");
id = id.value;

// interando o array com o src de todos os arquivos passados
previewImgs.forEach((arr) => {
  array.push(arr.attributes.src.value);
});

// percorrendo todos os arquivos
files.forEach((file, index) => {
  // adicionando um evento de change, ou seja, quando algo no elemento mudar
  file.addEventListener("change", (e) => {
    // capturando cada arquivo esoladamente
    const fileToUpload = e.target.files.item(0);
    // verificando se algo foi realmente passado
    if (fileToUpload) {
      // verificando o formato
      if (/\.(jpe?g|png|gif)$/i.test(fileToUpload.name)) {
        // verificando o tamanho
        if (fileToUpload.size <= 1022924) {
          // cirando um onj FileReader
          const reader = new FileReader();
          // convertendo o arquivo passado para dataUrl (base64)
          reader.readAsDataURL(fileToUpload);

          // adicionando um evento de load ao reader
          reader.addEventListener("load", (e) => {
            // adicionando o codigo em base64 ao src da img
            previewImgs[index].src = e.target.result;
          });
        } else {
          // caso o tamanho seja invalido, redireciona para a pagina imovelDAO.php, passando um variavel get
          location = `/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_edicao=Tamanho de Arquivo Inválido!&&id=${id}`;
        }
      } else {
        // caso o formato seja invalido, redireciona para a pagina imovelDAO.php, passando um variavel get
        location = `/SMILIPS/controller/imovel/imovelDAO.php?notificacao_imgs_edicao=Formato de Arquivo Inválido!&&id=${id}`;
      }
    } else {
      // caso n seja selecionada nenhuma img ele retorna para a q foi cadastrada no DB
      previewImgs[index].src = array[index];
    }
  });
});

// capturando os campos de complemento e descricao(textarea)
const complemento = document.querySelector("input.complemento");
const textarea = document.querySelector("textarea#descricao");

// chamando a funcao importada passado as variaveis a cima pelo parametro
focusValidElement(complemento);
focusValidElement(textarea);

// capturando os inputs de tipo numericos
const inputsNumericos = document.querySelectorAll(".numerico");

// chamando a funcao importada passado os inputs pelo parametro
validarTipoNumerico(inputsNumericos);

// capturando os selct, a lista de options e todos os options do tipo type
const select = document.querySelector(".select");
const listsOption = document.querySelector(".list-options");
const optionsListType = document.querySelectorAll(".option.type");

// adicionando/removendo a classe active do select todo vez q ele e clicado
addClass(select, listsOption);

// sobrescrevendo o texto/valor do select pelo text/valor do option clicado, e removendo a classe active da lista de options
editSelect(optionsListType, select, listsOption);

// capturando a texarea o contador e o maxlength
const inputDescricao = document.querySelector("#descricao");
const counter = document.querySelector(".counter");
const maxlength = inputDescricao.attributes.maxlength.value;

// chamando a funcao importada passando as varivaeis a cima pelo paramentro
definirMaxLength(inputDescricao, counter, maxlength);

// buttons excluir imovel
const btnCancel = document.querySelector("button[type=button]");
const checkbox = document.querySelector("#btn_excluir");

// capturando o campo de senha e o icone de visualizar
const senhas = document.querySelectorAll(".senha input[name=senha]");
const btns = document.querySelectorAll(".senha .fa");

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
