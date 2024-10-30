<?php
require("conexao.php");

$email = $_POST['email-rec'];
//echo $email;

//VERIFICAR(pessquisar) SE EXISTE USUÁRIO ADMINISTRADOR CADASTRADO
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg == 0) {
    echo " - Email não cadastrado -";
    exit();
}
else{
    $senha = $res[0]['senha'];
    //echo $senha;
}

//Enviar o email com a nova senha
$destinatario = $email;
$assunto = $nome_sistema . ' - Recuperação de senha';
$mensagem = 'Sua senha é ' . $senha;
$cabecalhos = "From: " . $email_sistema;

@mail($destinatario, $assunto, $mensagem, $cabecalhos);

echo 'Recuperação com Sucesso, entre em seu email!!!'
?>
