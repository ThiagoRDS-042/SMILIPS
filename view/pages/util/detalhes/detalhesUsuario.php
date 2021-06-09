<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');

if (isset($_SESSION['detalhesPropaganda'])) {
  $usuario = $propagandaUsuario;
} else if (isset($_SESSION['detalhesPlano'])) {
  $usuario = $planoUsuario;
} else if (isset($_SESSION['detalhesDenuncia'])) {
  if (isset($_SESSION['imovel'])) {
    $usuario = $denunciaImovel;
  } else {
    $usuario = $denunciaServico;
  }
} else {
  // chamando a funcao consultarImgsImovel
  consultarImgsImovel();
}
?>

<link rel="stylesheet" href="/SMILIPS/view/css/util/detalhes/detalhesUsuario.css">

<div class="usuario">
  <?php if (isset($_SESSION['imovel']) or isset($_SESSION['servico'])) : ?>
    <h1>Detalhes do Redator</h1>
  <?php else : ?>
    <h1>Detalhes do Usuário</h1>
  <?php endif; ?>
  <div class="detalhes_usuario">
    <div class="img-perfil">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($usuario['ftPerfil']) ?>" alt="">
    </div>
    <div class="info-user">
      <div class="field-duo">
        <div class="nome">
          <p><?php echo $usuario['nomeUsuario'] ?></p>
          <span>Nome</span>
        </div>
        <div class="telefone">
          <p><?php echo $usuario['telefone'] ?></p>
          <span>Telefone</span>
        </div>
      </div>

      <div class="field-duo">
        <div class="rua">
          <p><?php echo $usuario['rua'] ?></p>
          <span>Rua</span>
        </div>
        <div class="numero">
          <p><?php echo $usuario['numero'] ?></p>
          <span>Número</span>
        </div>
      </div>

      <div class="field-duo">
        <div class="bairro">
          <p><?php echo $usuario['bairro'] ?></p>
          <span>Bairro</span>
        </div>
        <div class="complemento">
          <?php if ($usuario['complemento'] == '') : ?>
            <p>Não Informado!</p>
          <?php else : ?>
            <p><?php echo $usuario['complemento'] ?></p>
          <?php endif; ?>
          <span>Complemento</span>
        </div>
      </div>

      <div class="field-duo">
        <div class="email">
          <p><?php echo $usuario['emailUsuario'] ?></p>
          <span>E-mail</span>
        </div>
      </div>
    </div>
  </div>
</div>