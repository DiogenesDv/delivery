<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>RESUMO DO PEDIDO</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="index.php" alt="Voltar" title="Botão Voltar">
        <big><i class="bi bi-arrow-left-circle icone_seta_voltar_"></i></big>
      </a>
    </div>

    <?php require_once("carrinho.php") ?>
  </div>
</nav>

<div class="list-group lista_itens_">

  <a href="adicionais.php" class="link-neutro_">
    <div class="titulo-itens-margins_ list-group-item d-flex justify-content-between align-items-center">
      <b><span class="">Pizza Calabresa</i></span></b>
      <div class="destaque_qtd_3">
        <strong>Qtd</strong>
        
        <div class="btns_up_minus_">
          <i class="bi bi-plus-circle-fill"></i>
          <span> 0 </span>
          <i class="bi bi-dash-circle-fill"></i>
        </div>

      </div>
      <div class="carrinho-qtd">
  
        <div class="valor_item_carrinho_">
          <span>R$ 15,00</span>
        </div>

      </div>
      <i class="bi bi-trash-fill icone_excluir_item_"></i>

    </div>
    <div class="titulo-itens-margins_ carrinhos_itens_qtd_">

    </div>
  </a>
</div>

</body>

</html>