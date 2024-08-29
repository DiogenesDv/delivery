<?php require_once("cabecalho.php") ?>

<nav class="navbar bg-body-tertiary fixed-top header_top">
  <div class="container-fluid">
    <span>Resumo do Item</span>
    <div class=".icone_seta_voltar_">
      <a class="navbar-brand" href="adicionais.php" alt="Voltar" title="Botão Voltar">
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

<div class="destaque_qtd_2">
  <strong>Observações</strong>
  <div class="form-group">
    <textarea class="form-control" type="text" name="obs"></textarea>
  </div>
</div>

<div class="total_">
  <b>Total R$ 0,0</b>
</div>

<div class="botao_ d-grid">
 <a href="#popup2" class="btn btn-primary">Adicionar ao carrinho  <i class="bi bi-cart4"></i></a>
</div>

</body>

</html>

<div id="popup2" class="overlay_2">
    <div class="popup_2">
        <div class="row">
            <div class="col-9">
                <h3 class="titulo-popup">3 Itens Adicionados</h3>
            </div>
            <div class="col-3">
                <a class="close" href="#">&times;</a>
            </div>
        </div>
        <hr class="linha">
        <div class="conteudo-popup">
            Aqui vamos colocar depois o conteúdo desse popup trazendo os itens que forem adicionados no carrinho
        </div>
    </div>
</div>