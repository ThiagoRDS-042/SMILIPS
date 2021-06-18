<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
consultarPropagandasAtivas();
?>

<link rel="stylesheet" href="/SMILIPS/view/css/util/propagandas/propagandas.css">

<?php if ($propagandasAtivas->num_rows > 0) : ?>
  <?php $contador = 0; ?>
  <?php while ($row = $propagandasAtivas->fetch_assoc()) : ?>
    <?php $contador++; ?>
    <div class="propaganda p<?php echo $contador; ?>">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($row['propaganda']) ?>" alt="Imagem da Propaganda">
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/SMILIPS/controller/alterarPropaganda/alterarPropaganda.js"></script>