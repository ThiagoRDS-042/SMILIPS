setInterval(() => {
  $.ajax({
    //url pra de onde virar as informacoes
    url: "/SMILIPS/controller/DAO/propaganda/alterarPropaganda.php",
    //tipo de dado
    dataType: "html",
    // funcao executada se a funcao ajax for be sucedida
    success: function (msg) {
      //passando para o campo msgEmail a mensagem retornada da url anterior
      msg = msg.split(" . ");
      $(".propaganda.p1 img").attr("src", `data:image/jpeg;base64,${msg[0]}`);
      $(".propaganda.p2 img").attr("src", `data:image/jpeg;base64,${msg[1]}`);
      $(".propaganda.p3 img").attr("src", `data:image/jpeg;base64,${msg[2]}`);
    },
  });
}, 5000);
