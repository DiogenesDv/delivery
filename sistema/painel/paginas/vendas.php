<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$pag = 'vendas';


$data_hoje = date('Y-m-d');
$data_ontem = date('Y-m-d', strtotime("-1 days",strtotime($data_hoje)));

$mes_atual = Date('m');
$ano_atual = Date('Y');
$data_inicio_mes = $ano_atual."-".$mes_atual."-01";

if($mes_atual == '4' || $mes_atual == '6' || $mes_atual == '9' || $mes_atual == '11'){
	$dia_final_mes = '30';
}else if($mes_atual == '2'){
	$dia_final_mes = '28';
}else{
	$dia_final_mes = '31';
}

$data_final_mes = $ano_atual."-".$mes_atual."-".$dia_final_mes;


?>



<div class="bs-example widget-shadow" style="padding:15px">

	<div class="row">
		<div class="col-md-5" style="margin-bottom:5px;">
			<div style="float:left; margin-right:10px"><span><small><i title="Data  Inicial" class="fa fa-calendar-o"></i></small></span></div>
			<div  style="float:left; margin-right:20px">
				<input type="date" class="form-control " name="data-inicial"  id="data-inicial-caixa" value="<?php echo $data_hoje ?>" required>
			</div>

			<div style="float:left; margin-right:10px"><span><small><i title="Data  Final" class="fa fa-calendar-o"></i></small></span></div>
			<div  style="float:left; margin-right:30px">
				<input type="date" class="form-control " name="data-final"  id="data-final-caixa" value="<?php echo $data_hoje ?>" required>
			</div>
		</div>


		
		<div class="col-md-2" style="margin-top:5px;" align="center">	
			<div > 
				<small >
					<a title="Conta de Ontem" class="text-muted" href="#" onclick="valorData('<?php echo $data_ontem ?>', '<?php echo $data_ontem ?>')"><span>Ontem</span></a> / 
					<a title="Conta de Hoje" class="text-muted" href="#" onclick="valorData('<?php echo $data_hoje ?>', '<?php echo $data_hoje ?>')"><span>Hoje</span></a> / 
					<a title="Conta do Mês" class="text-muted" href="#" onclick="valorData('<?php echo $data_inicio_mes ?>', '<?php echo $data_final_mes ?>')"><span>Mês</span></a>
				</small>
			</div>
		</div>



		<div class="col-md-3" style="margin-top:5px;" align="center">	
			<div > 
				<small >
					<a title="Todas as Vendas" class="text-muted" href="#" onclick="buscarContas('')"><span>Todas</span></a> / 
					<a title="Vendas Pendentes" class="text-muted" href="#" onclick="buscarContas('Cancelado')"><span>Canceladas</span></a> / 
					<a title="Vendas Pagas" class="text-muted" href="#" onclick="buscarContas('Finalizado')"><span>Pagas</span></a>
				</small>
			</div>
		</div>

		<input type="hidden" id="buscar-contas">

	</div>

	<hr>
	<div id="listar">

	</div>
	
</div>







<!-- Modal Dados-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_dados"></span></h4>
				<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			
			<div class="modal-body">

				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Valor : </b></span>
						<span id="valor_dados"></span>
					</div>	

					<div class="col-md-6">							
						<span><b>Total Pago: </b></span>
						<span id="total_pago_dados"></span>							
					</div>


				</div>


				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Taxa Entrega : </b></span>
						<span id="taxa_entrega_dados"></span>
					</div>	

					<div class="col-md-6">							
						<span><b>Troco: </b></span>
						<span id="troco_dados"></span>							
					</div>


				</div>


				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					
					<div class="col-md-6">							
						<span><b>Tipo PGTO: </b></span>
						<span id="tipo_pgto_dados"></span>							
					</div>

						<div class="col-md-6">							
						<span><b>Usuário Baixa: </b></span>
						<span id="usuario_pgto_dados"></span>							
					</div>

				</div>




				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Data: </b></span>
						<span id="data_dados"></span>							
					</div>

					<div class="col-md-6">							
						<span><b>Hora: </b></span>
						<span id="hora_dados"></span>							
					</div>


				</div>



				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Status: </b></span>
						<span id="status_dados"></span>							
					</div>

					<div class="col-md-6">							
						<span><b>Pago: </b></span>
						<span id="pago_dados"></span>							
					</div>


				</div>

				

				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-12">							
						<span><b>OBS: </b></span>
						<span id="obs_dados"></span>							
					</div>
				
				</div>




				


			</div>

			
		</div>
	</div>
</div>





<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.sel2').select2({
			dropdownParent: $('#modalForm')
		});
	});
</script>


<script type="text/javascript">
	function carregarImg() {
		var target = document.getElementById('target');
		var file = document.querySelector("#foto").files[0];


		var arquivo = file['name'];
		resultado = arquivo.split(".", 2);

		if(resultado[1] === 'pdf'){
			$('#target').attr('src', "images/pdf.png");
			return;
		}

		if(resultado[1] === 'rar' || resultado[1] === 'zip'){
			$('#target').attr('src', "images/rar.png");
			return;
		}



		var reader = new FileReader();

		reader.onloadend = function () {
			target.src = reader.result;
		};

		if (file) {
			reader.readAsDataURL(file);

		} else {
			target.src = "";
		}
	}
</script>



<script type="text/javascript">
	function valorData(dataInicio, dataFinal){
	 $('#data-inicial-caixa').val(dataInicio);
	 $('#data-final-caixa').val(dataFinal);	
	listar();
}
</script>



<script type="text/javascript">
	$('#data-inicial-caixa').change(function(){
			//$('#tipo-busca').val('');
			listar();
		});

		$('#data-final-caixa').change(function(){						
			//$('#tipo-busca').val('');
			listar();
		});	
</script>





<script type="text/javascript">
	function listar(){

	var dataInicial = $('#data-inicial-caixa').val();
	var dataFinal = $('#data-final-caixa').val();	
	var status = $('#buscar-contas').val();	
	
    $.ajax({
        url: 'paginas/' + pag + "/listar.php",
        method: 'POST',
        data: {dataInicial, dataFinal, status},
        dataType: "html",

        success:function(result){
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}
</script>



<script type="text/javascript">
	function buscarContas(status){
	 $('#buscar-contas').val(status);
	 listar();
	}
</script>




<script type="text/javascript">
	function baixar(id){
    $.ajax({
        url: 'paginas/' + pag + "/baixar.php",
        method: 'POST',
        data: {id},
        dataType: "text",

        success: function (mensagem) {            
            if (mensagem.trim() == "Baixado com Sucesso") {                
                listar();                
            } else {
                    $('#mensagem-excluir').addClass('text-danger')
                    $('#mensagem-excluir').text(mensagem)
                }

        },      

    });
}

</script>