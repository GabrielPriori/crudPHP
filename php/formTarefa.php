<?php
include_once 'conexao.php';
session_start();

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$lembrete = filter_input(INPUT_POST, 'lembrete', FILTER_SANITIZE_STRING);

if(empty($titulo) || empty($data) || empty($lembrete)){
	echo 'Verifique os Campos';
}else{
	$idUser = $_SESSION['idUser'];
	
	$resultTarefa = "INSERT INTO tarefas (idUser, titulo, data, lembrete) VALUES (:idUser, :titulo, :data, :lembrete)";

	$insertTarefa = $conn->prepare($resultTarefa);
	$insertTarefa->bindParam(':idUser', $idUser);
	$insertTarefa->bindParam(':titulo', $titulo);
	$insertTarefa->bindParam(':data', $data);
	$insertTarefa->bindParam(':lembrete', $lembrete);

	if($insertTarefa->execute()){
		echo true;
	}else{
		echo "Erro no cadastro";
	}
		
}

?>