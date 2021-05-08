<?php

//Credenciais de acesso ao BD
define('HOST', '127.0.0.1:3306');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'crud_php');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);