<?php 
require_once("../conexao.php");

$email = $_POST['email'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$telefone = $_POST['telefone'];
$id = $_POST['id_usuario'];

$senha_crip = md5($senha);

if($senha != $conf_senha){
	echo 'As senhas não se coincidem!!';
	exit();
}

//validar email
$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Email já Cadastrado, escolha outro!!';
	exit();
}

//validar cpf
$query = $pdo->query("SELECT * from usuarios where cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'CPF já Cadastrado, escolha outro!!';
	exit();
}




//validar troca da foto
$query = $pdo->query("SELECT * FROM usuarios where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['foto'];
}else{
	$foto = 'sem-foto.jpg';
}



//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y_H-i-s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = 'images/perfil/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('images/perfil/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}


$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, cpf = :cpf, 
senha = :senha, senha_crip = '$senha_crip', foto = '$foto', telefone = :telefone ");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":senha", "$senha");
$query->bindValue(":telefone", "$telefone");
$query->execute();

echo 'Editado com Sucesso';

 ?>