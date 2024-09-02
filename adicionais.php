<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>Pizza Calabresa(P)</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="itens.php" alt="Voltar" title="Botão Voltar">
        <big><i class="bi bi-arrow-left-circle icone_seta_voltar_"></i></big>
      </a>
    </div>
    <?php require_once("carrinho.php") ?>
  </div>
</nav>

<ol class="list-group lista_itens_">

  <div class="itens_topo_">
    <span>Itens - variasções - ADICIONAIS</span>
  </div>

  <div class="titulo-itens-margins_ list-group-item">
    <span>Inserir Adicionais?</span>
  </div>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Borda de chocolate <i class="fw-bold valor_item_">+ R$ 5,00</i></span>
      <i class="bi bi-square"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Borda de Catupiri <i class="fw-bold valor_item_">+ R$ 4,00</i></span>
      <i class="bi bi-square"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Palmito <i class="fw-bold valor_item_">+ R$ 2,00</i></span>
      <i class="bi bi-square"></i>
    </li>
  </a>

</ol>

<div class="total_">
  <b>R$ 0,0</b>
</div>

<ol class="list-group lista_itens_2">

  <div class="list-group titulo-itens-margins_ list-group-item">
    <span>Remover ingredientes?</span>
  </div>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Tomate</span>
      <i class="bi bi-check-square-fill"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Azeitona</span>
      <i class="bi bi-check-square-fill"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Oregano</span>
      <i class="bi bi-check-square-fill"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Oregano</span>
      <i class="bi bi-check-square-fill"></i>
    </li>
  </a>

  <a href="adicionais.php" class="link-neutro_">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="">Oregano</span>
      <i class="bi bi-check-square-fill"></i>
    </li>
  </a>
</ol>

<div class="botao_ d-grid">
 <a href="observacoes.php" class="btn btn-primary">Avançar<i class="bi bi-arrow-bar-right"></i></a>
</div>
</body>

</html>