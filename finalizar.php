<?php
@session_start(); 
require_once("cabecalho.php");
$sessao = @$_SESSION['sessao_usuario'];

$total_carrinho = 0;
$total_carrinhoF = 0;
$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and id_sabor = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
  echo "<script>window.location='index'</script>";
  exit();
}else{
  $cliente = $res[0]['cliente'];
  for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}  

      $id = $res[$i]['id'];
    $total_item = $res[$i]['total_item'];
    $produto = $res[$i]['produto']; 

    $total_carrinho += $total_item;    
    $total_carrinhoF = number_format($total_carrinho, 2, ',', '.');

  }
}

$query2 = $pdo->query("SELECT * FROM clientes where id = '$cliente'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $nome_cliente = $res2[0]['nome'];
    $tel_cliente = $res2[0]['telefone'];
    $rua = $res2[0]['rua'];
    $numero = $res2[0]['numero'];
    $bairro = $res2[0]['bairro'];
    $complemento = $res2[0]['complemento'];


$query = $pdo->query("SELECT * FROM bairros where nome = '$bairro'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

if(@count($res) > 0){
  $taxa_entrega = $res[0]['valor'];
}else{
  $taxa_entrega = 0;
}

$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');

 ?>

  <div class="main-container">

  <nav class="navbar bg-light fixed-top" style="box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.20);">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="img/<?php echo $logo_sistema ?>" alt="" width="30" height="30" class="d-inline-block align-text-top">
       Finalizar Pedido
      </a>

      <?php require_once("icone-carrinho.php") ?>

    </div>
  </nav>

<div class="accordion" id="accordionExample" style="margin-top: 55px; margin-bottom: 130px; overflow: scroll; height:100%; scrollbar-width: thin; z-index: 100">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        1 - IDENTIFICAÇÃO
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body" align="center">
       <img src="img/user.png" width="50px" height="50px" >
       <div class="nome_user"> <?php echo $nome_cliente ?> </div>
       <div class="telefone_user"> <?php echo $tel_cliente ?> </div>
       <hr>
       <div><b>Finalizar seu Pedido?</b></div>
       <hr>
       <div class="row">
       	<div class="col-6">
           <a href="index" class="btn btn-danger botao_nao">NÃO</a>

         </div>

         <div class="col-6">

          <a class="btn btn-success botao_sim" data-bs-toggle="collapse" data-bs-target="#collapseTwo">SIM</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="accordion-item">
  <h2 class="accordion-header" id="headingTwo">
    <button id="colapse-2" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
     2 - MODO DE ENTREGA
   </button>
 </h2>
 <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
  <div class="accordion-body">
    <ul class="list-group form-check">
      <li onclick="retirar()" class="list-group-item d-flex justify-content-between align-items-center">
        Retirar no Local
        <input onchange="retirar()" class="form-check-input" type="radio" name="radio_retirar" id="radio_retirar">
      </li>
      <li onclick="local()" class="list-group-item d-flex justify-content-between align-items-center">
       Consumir no Local
       <input onchange="local()" class="form-check-input" type="radio" name="radio_local" id="radio_local">
     </li>
     <li onclick="entrega()" class="list-group-item d-flex justify-content-between align-items-center">
       Entrega Delivery
       <input onchange="entrega()" class="form-check-input" type="radio" name="radio_entrega" id="radio_entrega">
     </li>
   </ul>
 </div>
</div>
</div>
<div class="accordion-item">
  <h2 class="accordion-header" id="headingThree">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="colapse-3">
      3 - ENDEREÇO OU UNIDADE DE RETIRADA
    </button>
  </h2>
  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
    <div class="accordion-body">

      <div id="area-retirada">
     <a href="" class="" data-bs-toggle="collapse" data-bs-target="#collapse4" style="text-decoration: none; color:#000">
      <div>
      <b> <span id="consumir-local">Endereço da nossa Loja </span></b><br>
       <?php echo $endereco_sistema ?>
       <i class="bi bi-check-lg"></i>
     </div>
   </a>
 </div>


   <div id="area-endereco">

    <div class="row">
      <div class="col-8"> 
        <div class="group">
          <input type="text" class="input" name="rua" id="rua" value="<?php echo $rua ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label class="label">Rua*</label>
        </div>
      </div>


      <div class="col-4"> 
        <div class="group">
          <input type="text" class="input" name="numero" id="numero" value="<?php echo $numero ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label class="label">Número*</label>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-5"> 
        <div class="group">
          <input type="text" class="input" name="complemento" id="complemento" value="<?php echo $complemento ?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label class="label">Complemento</label>
        </div>
      </div>
      

      <div class="col-7"> 
        <div class="group">
          <select class="input" name="bairro" id="bairro" required style="background: transparent;" onchange="calcularFrete()">
            <option value="">Selecione um Bairro</option>
            <?php 
                  $query = $pdo->query("SELECT * FROM bairros ORDER BY id asc");
                  $res = $query->fetchAll(PDO::FETCH_ASSOC);
                  $total_reg = @count($res);
                  if($total_reg > 0){
                    for($i=0; $i < $total_reg; $i++){
                    foreach ($res[$i] as $key => $value){}
                      $valor = $res[$i]['valor'];
                      $valorF = 'R$ '.number_format($valor, 2, ',', '.');

                      if($res[$i]['nome'] == $bairro){
                        $classe_bairro = 'selected';
                      }else{
                        $classe_bairro = '';
                      }


                    echo '<option value="'.$res[$i]['nome'].'" '.$classe_bairro.'>'.$res[$i]['nome'].' - '.$valorF.'</option>';
                    }
                  }else{
                      echo '<option value="">Cadastre uma Categoria</option>';
                    }
                   ?>
          </select>
          <span class="highlight"></span>
          <span class="bar"></span>

        </div>

      </div>

      <div align="center" class="avancar-pgto"><a href="#" data-bs-toggle="collapse" data-bs-target="#collapse4">Avançar para Pagamento</a></div>
    </div>


  </div>

</div>
</div>
</div>
<div class="accordion-item">
  <h2 class="accordion-header" id="heading4">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
      4 - PAGAMENTO
    </button>
  </h2>
  <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
    <div class="accordion-body">

      <div class="row">

        <div class="col-3 form-check" >
         <small>Pix
          <input onchange="pix()" class="form-check-input" type="radio" name="radio_pix" id="radio_pix">
        </small>
      </div>     

      <div class="col-3 form-check">
       <small> Dinheiro
         <input onchange="dinheiro()" class="form-check-input" type="radio" name="racio_dinheiro" id="radio_dinheiro">
       </small>
     </div>     


     <div class="col-3 form-check" >
       <small>Crédito
         <input onchange="credito()" class="form-check-input" type="radio" name="radio_credito" id="radio_credito">
       </small>
     </div>    

     <div class="col-3 form-check" >
       <small>Débito
         <input onchange="debito()" class="form-check-input" type="radio" name="radio_debito" id="radio_debito">
       </small>
     </div> 

   </div>   

   <div id="pagar_pix" style="margin-top: 15px">
     <b>Pagar com Pix </b><br>
     Chave <?php echo $tipo_chave ?> : <?php echo $chave_pix ?> <a class="link-neutro" href="#" onClick="copiar()"><i class="bi bi-clipboard text-primary"></i> <small><small>Copiar Pix</small></small> </a><br>
     <small>Ao efetuar o pagamento nos encaminhar o comprovante no whatsapp <span style="margin-left: 15px"><a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_sistema ?>" class="link-neutro"><i class="bi bi-whatsapp text-success"></i> <?php echo $telefone_sistema ?></a></span> </small>
   </div>


   <div id="pagar_dinheiro" style="margin-top: 15px">
     <b>Dinheiro na Entrega </b><br>   
     <div class="row">
      <div class="col-5">
       <small>Precisa de Troco?  </small>
     </div>  
     <div class="col-7" style="margin-top: -13px">
      <div class="group">
        <input type="number" class="input" name="troco" id="troco">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label class="label">Vou precisar de troco para</label>
      </div>
    </div>
  </div>

</div>



<div id="pagar_credito" style="margin-top: 15px">
 <b>Pagar com Cartão de Crédito </b><br>       
 <small>O Pagamento será efetuado no ato da entrega com cartão de crédito</small>
</div>

<div id="pagar_debito" style="margin-top: 15px">
 <b>Pagar com Cartão de Débito </b><br>       
 <small>O Pagamento será efetuado no ato da entrega com cartão de débito</small>
</div>



</div>

<div class="group mt-4 mx-4" id="area-obs">
          <input type="text" class="input" name="obs" id="obs" value="">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label class="label">Observações do Pedido</label>
        </div>
</div>



</div>


</div>


</div>


<input type="hidden" id="entrega">
<input type="hidden" id="pagamento">
<input type="hidden" id="taxa-entrega-input">
<input type="hidden" id="chave_pix_copia" value="<?php echo $chave_pix ?>">

<div class="total-finalizar">
<div class="total-pedido">
  <span id="area-taxa">
   <span class="previsao_entrega" >Taxa de Entrega: <span class="text-danger">R$ <span id="taxa-entrega"><?php echo $taxa_entregaF ?></span> </span></span>
  <span class="previsao_entrega mx-2">Previsão <?php echo $previsao_entrega ?> Minutos</span>
 
 </span>
 <br>
  <big>
    <span><b>TOTAL À PAGAR</b></span>
    <span class="direita">  <b>R$ <span id="total-carrinho-finalizar"><?php echo $total_carrinhoF ?></span></b></span>
  </big>
</div>


<div class="d-grid gap-2 mt-4 abaixo">
  <a href='#' onclick="finalizarPedido()" class="btn btn-primary botao-carrinho">Concluir Pedido</a>
</div>
</div>


</body>
</html>




<script type="text/javascript">

  $(document).ready(function() {        
    document.getElementById('area-endereco').style.display = "none";
    document.getElementById('area-obs').style.display = "none";
    document.getElementById('area-taxa').style.display = "none";
   
    document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
} );


  function retirar(){
   document.getElementById('radio_retirar').checked = true;
   document.getElementById('radio_local').checked = false;
   document.getElementById('radio_entrega').checked = false;
   $('#colapse-3').click();
   $('#entrega').val('Retirar');
   $('#consumir-local').text('Endereço de Retirada');

   document.getElementById('area-retirada').style.display = "block";
   document.getElementById('area-endereco').style.display = "none";

   document.getElementById('area-taxa').style.display = "none";
    calcularFrete() 
  }

  function local(){
   document.getElementById('radio_retirar').checked = false;
   document.getElementById('radio_local').checked = true;
   document.getElementById('radio_entrega').checked = false;
   $('#colapse-3').click();
   $('#entrega').val('Consumir Local');
   $('#consumir-local').text('Endereço da nossa unidade');

   document.getElementById('area-retirada').style.display = "block";
   document.getElementById('area-endereco').style.display = "none";

   document.getElementById('area-taxa').style.display = "none";
    calcularFrete()
  }


    function entrega(){
   document.getElementById('radio_retirar').checked = false;
   document.getElementById('radio_local').checked = false;
   document.getElementById('radio_entrega').checked = true;
   $('#colapse-3').click();
   $('#entrega').val('Delivery');
   
   document.getElementById('area-retirada').style.display = "none";
   document.getElementById('area-endereco').style.display = "block";
  
  document.getElementById('area-taxa').style.display = "inline-block";
  calcularFrete()
 
  }





   function pix(){   
   

   document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_dinheiro').checked = false;

   $('#pagamento').val('Pix');
   
   document.getElementById('pagar_pix').style.display = "block";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }

  function dinheiro(){  

      document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_pix').checked = false;
   
   $('#pagamento').val('Dinheiro');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "block";
   document.getElementById('area-obs').style.display = "block";
  }

  function debito(){  

      document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_pix').checked = false;
   document.getElementById('radio_dinheiro').checked = false;
   
   $('#pagamento').val('Cartão de Débito');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "block";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }


  function credito(){  

      document.getElementById('radio_pix').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_dinheiro').checked = false;
   
   $('#pagamento').val('Cartão de Crédito');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "block";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }


  function finalizarPedido(){  
   
   var pagamento = $('#pagamento').val();
   var entrega = $('#entrega').val();
   var rua = $('#rua').val();
   var numero = $('#numero').val();
   var complemento = $('#complemento').val();
   var bairro = $('#bairro').val();
   var troco = $('#troco').val();
   var obs = $('#obs').val();
   var taxa_entrega = $('#taxa-entrega-input').val();
   var pedido_whatsapp = "<?=$status_whatsapp?>";

   var dataAtual = new Date();
   var horas = dataAtual.getHours();
    var minutos = dataAtual.getMinutes();
    var hora = horas + ':'+ minutos;
  
       
   var total_compra = "<?=$total_carrinho?>";

    if(entrega == ""){
    alert('Selecione uma forma de entrega');
    $('#colapse-2').click();
    return;
   }

    if(entrega == "Delivery" && rua == ""){
    alert('Preencha o Campo Rua');
    $('#colapse-3').click();
    return;
   }

    if(entrega == "Delivery" && numero == ""){
    alert('Preencha o Campo Número');
    $('#colapse-3').click();
    return;
   }

    if(entrega == "Delivery" && bairro == ""){
    alert('Escolha um Bairro');
    $('#colapse-3').click();
    return;
   }

  

   if(pagamento == ""){
    alert('Selecione uma forma de pagamento');
    return;
   }

    if(pagamento == "Dinheiro" && troco == ""){
    alert('Digite o total a ser pago para o troco');
    
    return;
   }

   var total_compra_final = parseFloat(total_compra) + parseFloat(taxa_entrega);

   var total_compra_finalF = total_compra_final.toFixed(2)
   
   if(pagamento == "Dinheiro" && troco < total_compra_final){
    alert('Digite um valor acima do total da compra!');
    
    return;
   }

  
    $.ajax({
         url: 'js/ajax/inserir-pedido.php',
        method: 'POST',
        data: {pagamento, entrega, rua, numero, bairro, complemento, troco, obs},
        dataType: "html",

        success:function(result){
         
            alert('Pedido Finalizado!');
           
           
           

           if(pedido_whatsapp == 'Sim'){

              let a= document.createElement('a');
                //a.target= '_blank';
                a.href= 'http://api.whatsapp.com/send?1=pt_BR&phone=<?=$whatsapp_sistema?>&text= *Novo Pedido*  %0A Hora: *' + hora + '* %0A Total: R$ *' + total_compra_finalF + '* %0A Entrega: *' + entrega + '* %0A Pagamento: *' + pagamento + '* %0A Cliente: *<?=$nome_cliente?>* %0A Previsão de Entrega: *' + result + '*';
                a.click();
                window.location='index.php';
           }

          
                       
        }
    });
   
  }




  function calcularFrete(){

    var bairro = $('#bairro').val();
    var total_compra = "<?=$total_carrinho?>";
    var entrega = $('#entrega').val();

    $.ajax({
         url: 'js/ajax/calcular-frete.php',
        method: 'POST',
        data: {bairro, total_compra, entrega},
        dataType: "html",

        success:function(result){
           var split = result.split("-");
          $('#taxa-entrega').text(split[0]);
          $('#total-carrinho-finalizar').text(split[1]); 
          $('#taxa-entrega-input').val(split[0]);


        }
    });
  }
</script>


<script type="text/javascript">
  function copiar(){
    document.querySelector("#chave_pix_copia").select();
    document.execCommand("copy");
  }
</script>