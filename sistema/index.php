<?php
require_once("conexao.php");
//CRIANDO UM USUÁRIO ADMINITRADOR
$senha = '123';
$senha_crip = md5($senha);

//VERIFICAR(pessquisar) SE EXISTE USUÁRIO ADMINISTRADOR CADASTRADO
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

//CRIAR(salvar) USUARIO ADMIN
if($total_reg == 0){
    $pdo->query("INSERT INTO usuarios SET nome = 'Administrador', email = '$email_sistema', cpf = '123', senha = '$senha', senha_crip = '$senha_crip', nivel = 'Administrador', ativo = 'sim', data = curDate(), foto = 'sem-foto.jpg', telefone ='$telefone_sistema' ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icone -->
    <link rel="shortcut icon" href="../img/<?php echo $favicon_sistema?>" type="image/x-icon">
    <!-- Bootstrap com js para estilização,icones,animaçoes e css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/js_tela_login.js" defer></script>
    <title>Delivery Interativo</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5" id="form1">
                    <div class="form-data" v-if="!submitted">
                        <div class="text-center titulo_tela_login">
                            <div class="logo">
                                <img src="../img/<?php echo $logo_sistema?>" alt="Imagem de login" width="40px">
                            </div>
                            <h5 style="color: #4d97e5;">ADM Delivery</h5>
                            
                        </div>
                        <form method="POST" action="autenticar.php">
                            <div class="forms-inputs mb-4"> <span>Email ou CPF</span> <input autocomplete="off" type="text" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true" class="form-control" name="email" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="forms-inputs mb-4"> <span>Senha</span> <input autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true" class="form-control" name="senha" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3"> <button type="submit" class="btn btn-primary w-100">Login</button> </div>
                    </div>
                    </form>
                    <div class="success-data" v-else>
                        <div class="text-center d-flex flex-column"><a href="" data-bs-toggle="modal" data-bs-target="#modal_rec" class="link_recuperar_senha">Recuperar senha</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-------------Modal recuperar senha---------------->

<!-- Modal -->
<div class="modal fade" id="modal_rec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="form-rec">
                    <div class="row">
                        <div class="col-4" style="padding-top: 5px;">
                            <span>Digite seu email:</span>
                        </div>
                        <div class="col-8">
                            <input type="email" name="email-rec" id="email-recuperar" class="form-control" required>
                        </div>
                        <br>
                        <div id="mensagem-recuperar" style="text-align: center; padding-top:10px; padding-bottom:10px;">MENSAGEM</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Recuperar</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<!--Ajax-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
    $("#form-rec").submit(function() {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "recuperar-senha.php",
            type: 'POST',
            data: formData,

            success: function(mensagem) {
                $('#mensagem-recuperar').text('');
                $('#mensagem-recuperar').removeClass()
                if (mensagem.trim() == "Recuperado com Sucesso") {
                    //$('#btn-fechar-rec').click();					
                    $('#email-recuperar').val('');
                    $('#mensagem-recuperar').addClass('text-success')
                    $('#mensagem-recuperar').text('Sua Senha foi enviada para o Email')

                } else {

                    $('#mensagem-recuperar').addClass('text-danger')
                    $('#mensagem-recuperar').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>