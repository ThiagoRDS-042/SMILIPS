<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/planoUsuario/consultar.php');
?>

<link rel="stylesheet" href="/SMILIPS/view/css/util/detalhes/detalhesPlano.css">

<div class="plano">
  <div class="img_comprovante">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($planoUsuario['comprovante']) ?>" alt="Imagem do comprovante de pagamento">
  </div>
  <a href="/SMILIPS/controller/DAO/planoUsuario/imgComprovante.php?comprovante=<?php echo $planoUsuario['planoUsuarioID'] ?>">Baixar Comprovante <i class="fas fa-download"></i></a>
</div>