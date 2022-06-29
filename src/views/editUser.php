<?php

session_start();


if (isset($_GET["id"])) {
  require_once '../dao/UserDAO.php';
  $userDao = new UserDAO();
  $query = $userDao->selecionarPeloId($_GET["id"]);
  $user = new User($query[0]['name'], $query[0]['login'], $query[0]['password'], $query[0]['permission']);
  $user->setId($_GET["id"]);
}

if (isset($_POST["acao"])) {

  require_once '../dao/UserDAO.php';
  require_once '../models/User.php';
  $usuario = new User($_POST["name-new"], $_POST["login-new"], $_POST["password-new"], $_POST["permission-new"]);
  $userDao = new UserDAO();
  var_dump($_POST["name-new"]);
  $userDao->alterar($usuario);
  echo "<h2>O usuário foi alterado!</h2>";
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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="users.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Animais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="store.php">Produtos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Login</th>
              <th scope="col">Permission</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row"><input type="text" name="name-new" value="<?= $user->getName(); ?>"></th>
              <td><input type="text" name="login-new" value="<?= $user->getLogin(); ?>"></td>
              <td><input type="number" min="1" max="5" name="permission-new" value="<?= $user->getPermission(); ?>"></td>
              <td>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <input type="hidden" name="acao" value="">
                  <input class="btn btn-primary" type="submit" value="Editar">
                </form>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>