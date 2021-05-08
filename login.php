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
            <a class="navbar-brand" href="#">Gerenciador de Tarefas</a>
        </div>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <div class="login col-md-4 col-md-offset-2">
        <div class="alert alert-danger" role="alert">
            <p class="msgErro"></p>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">E-mail:</span>
            <input type="text" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
            <input type="password" id="senha" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <input type="submit" id="login" class="btn btn-secondary" value="Login">
        <a href="registrar.php" class="registrar">Registrar</a>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        $(".alert").hide();
        $("#login").click(function () {
            var email = $('#email').val();
            var senha = $('#senha').val();

            $.post('formLogar.php', {
                email: email,
                senha: senha,
            }, function (resposta) {
                if (resposta == 1) {
                    window.location.href = "home.php";
                } else {
                    $(".alert").show();
                    $('.msgErro').text(resposta);
                }
            });
        });
    </script>

</body>
</html>