<?php
session_start();
include_once 'conexao.php';

session_destroy();

unset(
   $_SESSION['idUsuario'],
   $_SESSION['titulo'],
   $_SESSION['data'],
   $_SESSION['lembrete'],
);

header("Location: ../login.php");
