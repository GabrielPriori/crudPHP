<?php
    include_once 'php/funcoes.php';
    if(!isset($_SESSION['idUser'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <title>Gerenciador de Terefas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="./cadastrar-tarefa.php">Tarefa+</a>
          </div>
        </div>
        <a href="../logout.php"><?php echo BuscaUser($_SESSION['idUser'])?>/Sair</a>
      </div>
    </nav>
    <div id="<?php echo $_SESSION['idTarefa'];  ?>" class="tarefa col-md-7 col-md-offset-2 cadastroTarefa">
        <div class="alert alert-danger" role="alert">
            <p class="msgErro"></p>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Titulo:</span>
            <input type="text" id="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $_SESSION['titulo'];  ?>" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group date" data-date-format="yyyy/mm/dd">
                <span class="input-group-text" id="inputGroup-sizing-default">Data:</span>
                <input id="date" type="text" class="form-control" placeholder="yyyy/mm/dd" value="<?php echo $_SESSION['data'];  ?>">
                <div class="input-group-addon" >
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Lembrete:</span>
          <textarea id="lembrete" class="form-control" aria-label="With textarea"><?php echo $_SESSION['lembrete'];  ?></textarea>
        </div>
        <input type="submit" id="atualizar" class="btn btn-secondary" value="atualizar">
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>

    <script>
        $(".alert").hide();
        $('.input-group.date').datepicker({format: "yyyy/mm/dd"});

        $("#atualizar").click(function(){
            var idTarefa = $('.cadastroTarefa').attr('id');
            var titulo = $('#titulo').val();
            var data = $('#date').val();
            var lembrete = $('#lembrete').val();

            $.post('php/formAtualizaTarefa.php', {
                idTarefa:idTarefa,
                titulo:titulo,
                data:data,
                lembrete:lembrete
            }, function(resposta){
                if(resposta == 1){
                    window.location.href = "home.php";
                }else{
                    $(".alert").show();
                    $('.msgErro').text(resposta);
                }
            });
        });
    </script>

</body>
</html>