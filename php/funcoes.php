<?php
session_start();

function BuscaUser($idUsuario){
	$link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
	$buscaInfoUser = mysqli_query($link, "SELECT * FROM user WHERE id_user = '$idUsuario'");
	$verificaInfoUser = mysqli_fetch_assoc($buscaInfoUser);
	$nome = $verificaInfoUser ['nome'];
	echo $nome;
}

function BuscaTarefas(){
    $idUser = $_SESSION['idUser'];
    $link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
    $buscaInfoTarefa = mysqli_query($link, "SELECT * FROM tarefas WHERE idUser = '$idUser' ORDER BY data ASC");

    $cont = 0;
    
    while($verificaInfoTerafa = mysqli_fetch_assoc($buscaInfoTarefa)){

        $cont++;

        $id = $verificaInfoTerafa['idTarefas'];
        $titulo = $verificaInfoTerafa['titulo'];
        $data = $verificaInfoTerafa['data'];
        $lembrete = $verificaInfoTerafa['lembrete'];

        echo "<div class='container mb-1'>";
        echo    "<div class='list-group'>";
        echo        "<div class='list-group-item list-group-item-action'>";
        echo            "<div class='d-flex w-100 justify-content-between'>";
        echo                "<h5 class='mb-1'>$titulo</h5>";
        echo                "<small>$data</small>";
        echo            "</div>";
        echo            "<p class='mb-1'>$lembrete</p>";
        echo            "<a href='php/funcoes.php?acao=edita&tarefa=$id'><button id='$id' type='submit' name='editar' class='btn btn-secondary editar'>Editar</button></a>";
        echo            "<a href='php/funcoes.php?acao=excluir&tarefa=$id'><button id='$id' type='submit' name='excluir' class='btn btn-secondary excluir'>Excluir</button></a>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
    }

    if($cont == 0){
        echo "<div class='container mb-1'>";
        echo "Nenhuma Tarefa Agendada!";
        echo "</div>";
    }
}

if (isset($_GET['acao']) && isset($_GET['tarefa'])){
    $acao = $_GET['acao'];
    $tarefa = $_GET['tarefa'];
    echo AtualizaTarefa($acao, $tarefa);
}else{
    $acao = null;
    $tarefa = null;
}

function AtualizaTarefa($acao, $tarefa){
    $link = mysqli_connect("127.0.0.1:3306", "root", "", "crud_php");
    if($acao == 'edita'){
        $buscaInfoTarefa = mysqli_query($link, "SELECT * FROM tarefas WHERE idTarefas = '$tarefa'");
        $verificaInfoTerafa = mysqli_fetch_assoc($buscaInfoTarefa);

        $_SESSION['idTarefa'] = $tarefa;
        $_SESSION['titulo'] = $verificaInfoTerafa['titulo'];
        $_SESSION['data'] = $verificaInfoTerafa['data'];
        $_SESSION['lembrete'] = $verificaInfoTerafa['lembrete'];
        header("Location: ../atualizar-tarefa.php");
    }elseif($acao == 'excluir'){
        $deleteTarefa = mysqli_query($link, "DELETE FROM tarefas WHERE idTarefas = '$tarefa'");
        header("Location: ../home.php");
    }
}