<?php
require("conexao.php");

$email = $_POST['email-rec'];
echo $email;

//VERIFICAR(pessquisar) SE EXISTE USUÁRIO ADMINISTRADOR CADASTRADO
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg == 0) {
    echo " - Email não cadastrado -";
    exit();
}
?>
