const checkbox = document.querySelector("#notification");
const cards = document.querySelectorAll(".notificacao");
const content_notification = document.querySelector(
  ".card_notificacao .content p"
);
const card_notificacao = document.querySelector(".card_notificacao");
const type = document.querySelectorAll(
  ".content_notification input[name=type]"
);
const action = document.querySelector(".card_notificacao form").attributes
  .action;
const ids = document.querySelectorAll(".content_notification input[name=id]");
const id = document.querySelector(".card_notificacao .button input[name=id]");

cards.forEach((card, index) => {
  card.addEventListener("click", () => {
    content_notification.innerText = card.innerText;
    checkbox.checked = false;
    card_notificacao.classList.add("active");
    id.value = ids[index].value;

    if (type[index].value === "Imovel") {
      action.value =
        "/SMILIPS/controller/DAO/notificacaoAnaliseImovel/notificacaoAnaliseImovelDAO.php";
    } else if (type[index].value === "Plano") {
      action.value =
        "/SMILIPS/controller/DAO/notificacaoAnalisePlano/notificacaoAnalisePlanoDAO.php";
    } else if (type[index].value === "Propaganda") {
      action.value =
        "/SMILIPS/controller/DAO/notificacaoAnalisePropaganda/notificacaoAnalisePropagandaDAO.php";
    } else {
      action.value =
        "/SMILIPS/controller/DAO/notificacaoServico/notificacaoServicoDAO.php";
    }
  });
});
