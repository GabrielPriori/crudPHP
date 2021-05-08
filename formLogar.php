<?php
include_once 'conexao.php';
session_start();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(empty($email)|| empty($senha)){
	echo 'Verifique os Campos';
}elseif(!empty($email)){
	$link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
	$buscaUser = mysqli_query($link, "SELECT * FROM user WHERE email = '$email' AND senha = '$senha'");
	$verificaUser = mysqli_fetch_assoc($buscaUser);
	if($verificaUser != null){
		$_SESSION['idUser'] = $verificaUser['id_user'];
		echo true;
	}else{
		echo "E-mail ou senha incorretos";
	}
}else{
	echo "Erro ao Logar";
}

?>