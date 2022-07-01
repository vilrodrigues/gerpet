<?php

session_start();

if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/UserDAO.php');
require_once('../models/User.php');

$userDao = new UserDAO();

if (isset($_GET["id"])) {
  $query = $userDao->selecionarPeloId($_GET["id"]);
  $user = new User($query[0]['name'], $query[0]['login'], $query[0]['password']);
  $user->setId($_GET["id"]);
}

if (isset($_POST["id"])) {
  $usuario = new User($_POST["name-new"], $_POST["login-new"], $_POST["password-new"]);
  $usuario->setId($_POST['id']);
  $userDao->alterar($usuario);
  header('location:users.php');  
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Usuários | GERPET</title>
</head>

<body>

  <?php include_once 'templates/navbar.php' ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Login</th>
              <th scope="col">Senha</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <th scope="row">
                  <input type="text" name="name-new" value="<?= $user->getName(); ?>">
                </th>
                <td><input required type="text" name="login-new" value="<?= $user->getLogin(); ?>"></td>
                <td><input required type="password" name="password-new" value="" placeholder="********"></td>
                <td>
                  <input type="hidden" name="id" value="<?= $user->getId(); ?>">
                  <input class="btn btn-primary" type="submit" value="Editar">
                </td>
              </form>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>