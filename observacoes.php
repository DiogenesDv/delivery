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
  <a href="#popup2" class="btn btn-primary">Adicionar ao carrinho <i class="bi bi-cart4"></i></a>
</div>

</body>

</html>

<div id="popup2" class="overlay_2">
  <div>
    <a class="close_2" href="#">&times;</a>
  </div>
  <div class="popup_2">
    <div class="row_2">
      <div class="col-11">
        <form action="carrinho.php" method="post" class="row">
          <label for="">Dados Importates do Cliente!</label>
          <hr class="linha">
          <div class="col-6">
            <input type="text" id="nome" name="nome" class="form-control sombra_" placeholder="Nome:" required></input>
          </div>
          <div class="col-6">
            <input type="text" id="whats-tel" name="whats-tel" class="form-control sombra_" placeholder="Whatsapp-tel:" required></input>
          </div>
          <hr class="linha">
          <div class="row btns_">
            <div class="col-6">
              <a href="index.php" class="btn btn-primary btn_">Comprar mais +</a>
            </div>
            <div class="col-6">
              <a href="carrinho_itens.php" class="btn btn-success btn_">Finalizar Pedido</a>
            </div>
            <div id="mensagem_aviso_" class="mensagem_aviso_">Prencha tudo logo oxi</div>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Mascaras JS -->
<script type="text/javascript" src="js/mascaras.js"></script>

<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
