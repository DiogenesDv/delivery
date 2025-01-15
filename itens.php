<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>Pizzas</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="index.php" alt="Voltar" title="Botão Voltar">
        <big><i class="bi bi-arrow-left-circle icone_seta_voltar_"></i></big>
      </a>
    </div>

    <?php require_once("carrinho.php") ?>
  </div>
</nav>

<ol class="list-group list-group-numbered lista_itens_">
<div class="itens_topo_">
  <span>ITENS</span>
</div>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <a href="variacoes.php" class="link-neutro_">
        <div class="fw-bold">Pizza de Calabresa</div>
        <span class="fw-bold valor_item_">(P)R$ 25,00  (M)R$ 30,00 (G)R$35,00</span>
        <spam class="descricao_item_">Broda de queijo vermelho</spam>
    </div>
    </a>
  </li>

  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <a href="variacoes.php" class="link-neutro_">
        <div class="fw-bold">Pizza queijo</div>
        <span class="fw-bold valor_item_">(P)R$ 30,00  (M)R$ 35,00 (G)R$40,00</span>
        <spam class="descricao_item_">Borda de queijo branco</spam>
    </div>
    </a>
  </li>

</ol>



</body>

</html>