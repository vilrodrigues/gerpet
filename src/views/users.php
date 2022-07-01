<?php
session_start();
if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin' ) {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/UserDAO.php');
$userDao = new UserDAO();
$grupo = $userDao->selecionarPeloNome('%');

if (isset($_POST['id'])) {
  $userDao->remover($_POST['id']);
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Login</th>
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
                <td><?= $user["createdAt"] ?></td>
                <td><?= $user["updatedAt"] ?></td>
                <td>
                  <form action="./editUser.php" method="GET">
                    <input type="hidden" name="id" value=<?= $user["id"] ?>>
                    <input class="btn btn-primary" type="submit" value="Editar">
                  </form>
                </td>
                <?php
                  if ($user['role'] != 'admin') {
                    echo '
                    <td>
                    <form action="'. $_SERVER['PHP_SELF'] .'" method="POST">
                      <input type="hidden" name="id" value='.$user["id"].'>
                      <input type="hidden" name="type" value="delete">
                      <input class="btn btn-danger" type="submit" value="Deletar">
                    </form>
                  </td>';
                  }
                ?>
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