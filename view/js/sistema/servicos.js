const qtdCards = document.querySelectorAll(".card");
const servicos = document.querySelector(".servicos");

const p1 = document.querySelector(".propaganda.p1");
const p2 = document.querySelector(".propaganda.p2");
const p3 = document.querySelector(".propaganda.p3");

if (p1) {
  let coordenadasp1 = qtdCards[0].offsetTop;
  qtdCards[0].classList.add("margin_bottom");

  document.body.onresize = function () {
    coordenadasp1 = qtdCards[0].offsetTop;
    if (document.body.clientWidth < 1350 && document.body.clientWidth > 800) {
      p1.style = `top: ${coordenadasp1 + 290}px !important;`;
    } else if (document.body.clientWidth < 801) {
      p1.style = `top: ${coordenadasp1 + 250}px !important;`;
    }

    if (qtdCards.length > 2) {
      if (p2) {
        let indece;

        if (qtdCards.length % 2 === 0) {
          indece = qtdCards.length / 2 - 1;
        } else {
          indece = Math.round(qtdCards.length / 2) - 1;
        }

        qtdCards[indece].classList.add("middle");

        let coordenadas = qtdCards[indece].offsetTop;

        if (
          document.body.clientWidth < 1350 &&
          document.body.clientWidth > 800
        ) {
          p2.style = `top: ${coordenadas + 405}px !important;`;
        } else if (document.body.clientWidth < 801) {
          p2.style = `top: ${coordenadas + 360}px !important;`;
        }
      }
    } else if (qtdCards.length === 2) {
      let coordenadas = qtdCards[1].offsetTop;

      qtdCards[1].classList.add("middle");

      if (document.body.clientWidth < 1350 && document.body.clientWidth > 800) {
        p2.style = `top: ${coordenadas + 405}px !important;`;
      } else if (document.body.clientWidth < 801) {
        p2.style = `top: ${coordenadas + 360}px !important;`;
      }
    }
  };

  if (document.body.clientWidth < 1350 && document.body.clientWidth > 800) {
    p1.style = `top: ${coordenadasp1 + 290}px !important;`;
  } else if (document.body.clientWidth < 801) {
    p1.style = `top: ${coordenadasp1 + 250}px !important;`;
  }

  if (p2) {
    let indece;

    if (qtdCards.length > 2) {
      if (qtdCards.length % 2 === 0) {
        indece = qtdCards.length / 2 - 1;
      } else {
        indece = Math.round(qtdCards.length / 2) - 1;
      }

      qtdCards[indece].classList.add("middle");

      let coordenadas = qtdCards[indece].offsetTop;

      if (document.body.clientWidth < 1350 && document.body.clientWidth > 800) {
        p2.style = `top: ${coordenadas + 710}px !important;`;
      } else if (document.body.clientWidth < 801) {
        p2.style = `top: ${coordenadas + 670}px !important;`;
      }
    } else if (qtdCards.length === 2) {
      let coordenadas = qtdCards[1].offsetTop;

      qtdCards[1].classList.add("middle");

      if (document.body.clientWidth < 1350 && document.body.clientWidth > 800) {
        p2.style = `top: ${coordenadas + 710}px !important;`;
      } else if (document.body.clientWidth < 801) {
        p2.style = `top: ${coordenadas + 670}px !important;`;
      }
    }

    if (p3) {
      if (qtdCards.length === 2) {
        p3.style.opacity = "0";
      } else if (qtdCards.length === 1) {
        p3.style.opacity = "0";
        p2.style.opacity = "0";
      }
      servicos.classList.add("bottom");
    }
  }
}
