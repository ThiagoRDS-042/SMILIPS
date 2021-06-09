<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
?>
<link rel="stylesheet" href="/SMILIPS/view/css/util/detalhes/detalhesPropaganda.css">

<div class="propaganda">
  <div class="img_propaganda">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($propagandaUsuario['propaganda']) ?>" alt="Imagem da propaganda">
  </div>
</div>