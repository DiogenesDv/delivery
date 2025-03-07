<?php 
require_once("../../../conexao.php");
$tabela = 'fornecedores';

$id = $_POST['id'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

//validar email
$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Telefone já Cadastrado, escolha outro!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, telefone = :telefone, endereco = :endereco, email = :email, data = curDate()");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, telefone = :telefone, endereco = :endereco, email = :email WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->execute();

echo 'Salvo com Sucesso';

?>