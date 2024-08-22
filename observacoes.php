<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>Resumo do Pedido</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="index.php" alt="Voltar" title="Botão Voltar">
        <big><i class="bi bi-arrow-left-circle icone_seta_voltar_"></i></big>
      </a>
    </div>

    <?php require_once("carrinho.php") ?>
  </div>
</nav>

<div class="destaque_">
  <strong>Pizza calabresa pequena</strong>
</div>
<div class="destaque_qtd_">
  <strong>Quantidade</strong>
  <span> 0 </span>
  <div class="btns_up_minus_">
    <i class="bi bi-plus-circle-fill"></i>
    <i class="bi bi-dash-circle-fill"></i>
  </div>

</div>

</body>

</html>