<?php 
    $usuario = 'root';
    $senha = '';
    $banco = 'delivery_interativo';
    $servidor = 'localhost';

    date_default_timezone_set('America/Sao_Paulo');

    try{
        $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8","$usuario","$senha");
    } catch(Exception $e){
        echo 'Não conectado ao Banco de Dados <br><br>' .$e;
    }

    $nome_sistema = 'Delivery interativo';
    $email_sistema = 'diogenesdesenvolvedor@gmail.com';
    $telefone_sistema = '(88)98190-9378';
?>