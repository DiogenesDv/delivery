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

  <div class="titulo-itens-margins_ list-group-item d-flex justify-content-between align-items-center">
    <b><span class="nome_item_pedido_resumo">Pizza Calabresa</i></span></b>
    <div class="destaque_qtd_3">
      <strong>Qtd</strong>

      <div class="btns_up_minus_">
        <i class="bi bi-plus-circle-fill"></i>
        <span> 1 </span>
        <i class="bi bi-dash-circle-fill"></i>
      </div>

    </div>
    <div class="carrinho-qtd">

      <div class="valor_item_carrinho_">
        <span>R$ 30,00</span>
      </div>

    </div>
    <a href="#popup-excluir"><i class="bi bi-trash-fill icone_excluir_item_"></i></a>

  </div>

  <div class="titulo-itens-margins_ list-group-item d-flex justify-content-between align-items-center">
    <b><span class="nome_item_pedido_resumo">Pastel de queijo</i></span></b>
    <div class="destaque_qtd_3">
      <strong>Qtd</strong>

      <div class="btns_up_minus_">
        <i class="bi bi-plus-circle-fill"></i>
        <span> 1 </span>
        <i class="bi bi-dash-circle-fill"></i>
      </div>

    </div>
    <div class="carrinho-qtd">

      <div class="valor_item_carrinho_">
        <span>R$ 7,00</span>
      </div>

    </div>
    <a href="#popup-excluir"><i class="bi bi-trash-fill icone_excluir_item_"></i></a>

  </div>

  <div class="titulo-itens-margins_ list-group-item d-flex justify-content-between align-items-center">
    <b><span class="nome_item_pedido_resumo">Guarana</i></span></b>
    <div class="destaque_qtd_3">
      <strong>Qtd</strong>

      <div class="btns_up_minus_">
        <i class="bi bi-plus-circle-fill"></i>
        <span> 1 </span>
        <i class="bi bi-dash-circle-fill"></i>
      </div>

    </div>
    <div class="carrinho-qtd">

      <div class="valor_item_carrinho_">
        <span>R$ 9,00</span>
      </div>

    </div>
    <a href="#popup-excluir"><i class="bi bi-trash-fill icone_excluir_item_"></i></a>
    

  </div>
</div>


<div class="total_">
  <b>Sub Total R$ 46,00</b>
</div>

<div class="botao_ d-grid">
 <a href="" class="btn btn-primary">Finalizar Pedido<i class="bi bi-arrow-bar-right"></i></a>
</div>

</body>

</html>


<div id="popup-excluir" class="overlay-excluir">
    <div class="popup-excluir">
        <div class="row popup-excluir-texto">
            <div class="">
              <i>Tem certeza que quer apagar?</i>
            </div>
            <div class="">
              <a href="" class="text-danger link-neutro">Sim</a>
            </div>
            <div class="">
              <a href="#" class="close">&times;</a>
            </div>
        </div>
    </div>
</div>