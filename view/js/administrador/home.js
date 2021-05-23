// capturando todos os cards
const cards = document.querySelectorAll("main .card");

// redirecionando ao clicar nos cards na tela inicial do usuario
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/administrador/plano/manterPlanos.php")
      : card === cards[1]
      ? (location =
          "/SMILIPS/view/pages/administrador/tipoServico/manterServicos.php")
      : card === cards[2]
      ? (location = "/SMILIPS/view/pages/administrador/usuario/usuarios.php")
      : card === cards[3]
      ? (location = "/SMILIPS/view/pages/administrador/imovel/imoveis.php")
      : card === cards[4]
      ? (location = "/SMILIPS/view/pages/administrador/plano/planos.php")
      : (location =
          "/SMILIPS/view/pages/administrador/propaganda/propagandas.php");
  });
});
