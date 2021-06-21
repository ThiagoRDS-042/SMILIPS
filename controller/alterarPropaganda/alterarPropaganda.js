// funcao pra executar a cada 5 sec
setInterval(() => {
  $.ajax({
    // url pra de onde virar as informacoes
    url: "/SMILIPS/controller/DAO/propaganda/alterarPropaganda.php",
    // tipo de dado
    dataType: "html",
    // funcao executada se a funcao ajax for bem sucedida
    success: function (msg) {
      // separando a msg em 3 por " . "
      msg = msg.split(" . ");
      // atribuindo o serc das 3 propagandas
      $(".propaganda.p1 img").attr("src", `data:image/jpeg;base64,${msg[0]}`);
      $(".propaganda.p2 img").attr("src", `data:image/jpeg;base64,${msg[1]}`);
      $(".propaganda.p3 img").attr("src", `data:image/jpeg;base64,${msg[2]}`);
    },
  });
}, 5000);
