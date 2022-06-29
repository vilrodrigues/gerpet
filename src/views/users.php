<?php
session_start();
if (empty($_SESSION['userName']))
  redirect('login.php');

require_once('../dao/UserDAO.php');
$userDao = new UserDAO();
$grupo = $userDao->listarTodos();
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Login</th>
              <th scope="col">Permission</th>
              <th scope="col">CreatedAt</th>
              <th scope="col">UpdatedAt</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($grupo as $user) {
            ?>
              <tr>
                <th scope="row"><?= $user["name"] ?></th>
                <td><?= $user["login"] ?></td>
                <td><?= $user["permission"] ?></td>
                <td><?= $user["createdAt"] ?></td>
                <td><?= $user["updatedAt"] ?></td>
                <td>
                  <form action="./editUser.php?id=<?= $user["id"] ?>" method="POST">
                    <input type="hidden" name="id" value=<?= $user["id"] ?>>
                    <input class="btn btn-primary" type="submit" value="Editar">
                  </form>
                </td>
                <td>
                  <form action="../controllers/UserController.php" method="POST">
                    <input type="hidden" name="id" value=<?= $user["id"] ?>>
                    <input type="hidden" name="type" value="delete">
                    <input class="btn btn-danger" type="submit" value="Deletar">
                  </form>
                </td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>