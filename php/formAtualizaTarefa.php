<?php
include_once 'conexao.php';
session_start();

$idTarefa = filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$lembrete = filter_input(INPUT_POST, 'lembrete', FILTER_SANITIZE_STRING);

if(empty($titulo) || empty($data) || empty($lembrete)){
	echo 'Verifique os Campos';
}else{
	
	$link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
	$updateTarefa =  mysqli_query($link, "UPDATE tarefas SET titulo = '$titulo', data = '$data', lembrete = '$lembrete' WHERE idTarefas = '$idTarefa'");
	
	echo true;
		
}

?>