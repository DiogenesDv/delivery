<?php
@session_start();//Para criar variaveis de sessao(variaveis que poderao guardar imformacoes de pagina anteior para serem ultilizadas na proxima)
require_once('conexao.php');

//Recuperando valores
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

//echo $email;

//VERIFICAR(pessquisar) SE EXISTE USUÁRIO ADMINISTRADOR CA-DASTRADO
$query = $pdo->prepare("SELECT * FROM usuarios WHERE (email = :email or cpf = :email) and senha_crip = :senha ");

$query->bindValue(":email", "$email");
$query->bindValue(":senha","$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['nome'] = $res[0]['nome'];
    $_SESSION['nivel'] = $res[0]['nivel'];
    $_SESSION['ativo'] = $res[0]['ativo'];

    if ($_SESSION['ativo']
     == 'sim') {
        echo "<script>window.location='painel'</script>";
    }else{
        echo "<script>window.alert('USUÁRIO INATIVO!!!')</script>";
        echo "<script>window.location='index.php'</script>";    
    }
    
}else{
    echo "<script>window.alert('USUÁRIO ou SENHA Incorretos!!!')</script>";
    echo "<script>window.location='index.php'</script>";
}
?>