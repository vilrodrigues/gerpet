<?php
require_once('../helpers/SessionHelper.php');
if (!empty($_SESSION['userName']))
  redirect('home.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Cadastro | GERPET</title>
  <style>
    body {
      background-color: #88F;
    }
  </style>
</head>

<body>
  <div class="form-bg">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 align-self-center">
          <div class="form-container">
            <form class="form-horizontal" action="../controllers/UserController.php" method="POST">
              <input type="hidden" name="type" value="singup">
              <h3 class="title">GERPET</h3>
              <span class="description">Sistema de Gerenciamento de Pet Shop</span>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Nome" name="name" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Usuário" name="login" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="********" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password2" placeholder="********" required>
              </div>
              <button class="btn signin" type="submit" name="submit">Cadastrar</button>
              <span class="signup">ou <a href="login.php">Já tenho conta</a></span>
              <?php flash('login') ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>