<?php

require_once('conexao.php');

//Recuperando valores
$email = $_POST['email'];
$senha = $_POST['senha'];

echo $email;

//VERIFICAR(pessquisar) SE EXISTE USUÁRIO ADMINISTRADOR CA-DASTRADO
 $query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
    echo ' Você esta logado!';
}else{
    echo ' Não Logado';
}
?>