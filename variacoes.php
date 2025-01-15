<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>Pizza Calabresa</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="itens.php" alt="Voltar" title="Botão Voltar">
        <big><i class="bi bi-arrow-left-circle icone_seta_voltar_"></i></big>
      </a>
    </div>
    <?php require_once("carrinho.php") ?>
  </div>
</nav>

<ol class="list-group list-group-numbered lista_itens_">
<div class="itens_topo_">
  <span>Itens - VARIAÇÕES</span>
</div>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <a href="adicionais.php" class="link-neutro_">
        <div class="fw-bold">Pequena</div>
        <span class="fw-bold valor_item_">R$ 25,00</span>
        <spam class="descricao_item_"></spam>
    </div>
    </a>
  </li>

  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <a href="variacoes.php" class="link-neutro_">
        <div class="fw-bold">Media</div>
        <span class="fw-bold valor_item_">R$ 30,00</span>
        <spam class="descricao_item_"></spam>
    </div>
    </a>
  </li>

  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <a href="variacoes.php" class="link-neutro_">
        <div class="fw-bold">Grande</div>
        <span class="fw-bold valor_item_">R$ 35,00</span>
        <spam class="descricao_item_"></spam>
    </div>
    </a>
  </li>

</ol>
<hr class="hr_">
<div class="titulo_descricao_item_">
  <span>Descrição Pizza  Calabresa</span> 
  <br>
  <i class="descricao_item_">
    Pizza de calabresa com calabresa, e calabresa de calabre com tempero de calabresa, com molho de calabresa e recheiro de calabresa calabresada!
  </i>
</div>
<div>
  <img class="imagem-produtos_" src="img/produtos/calabresa.jpg" alt="">
</div>


</body>

</html>