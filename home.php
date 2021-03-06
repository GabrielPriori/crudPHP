<?php
    include_once 'php/funcoes.php';
    if(!isset($_SESSION['idUser'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <title>Gerenciador de Terefas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="cadastrar-tarefa.php">Tarefa+</a>
          </div>
        </div>
        <a href="php/logout.php"><?php echo BuscaUser($_SESSION['idUser'])?>/Sair</a>
      </div>
    </nav>
    <div class="list">
        <?php BuscaTarefas() ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        $(".editar").click(function () {
            var id = $(this).attr('id');
        });
    </script>

</body>
</html> 