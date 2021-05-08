<?php
include_once 'conexao.php';
session_start();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$confirmSenha = filter_input(INPUT_POST, 'confirmSenha', FILTER_SANITIZE_STRING);

if(empty($nome) || empty($email)|| empty($senha) || empty($confirmSenha)){
	echo 'Verifique os Campos';
}elseif($senha != $confirmSenha){
	echo "Senhas diferentes";
}else{
	$link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
	$buscaUser = mysqli_query($link, "SELECT * FROM user WHERE email = '$email'");
	$verificaUser = mysqli_fetch_assoc($buscaUser);

	if($verificaUser > 0){
		echo  utf8_encode("Este E-mail já consta no sistema");
	}else{
		$resultUser = "INSERT INTO user (nome, email, senha) VALUES (:nome, :email, :senha)";

		$insertUser = $conn->prepare($resultUser);
		$insertUser->bindParam(':nome', $nome);
		$insertUser->bindParam(':email', $email);
		$insertUser->bindParam(':senha', $senha);

		if($insertUser->execute()){
			echo true;
		}else{
			echo "Erro no cadastro";
		}
	}	
}

?>