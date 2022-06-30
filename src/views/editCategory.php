<?php

session_start();

if (isset($_GET["id"])) {
  require_once '../dao/CategoryDAO.php';
  $categoryDao = new CategoryDAO();
  $query = $categoryDao->selecionarPeloId($_GET["id"]);
  $cat = new Category($query[0]['name']);
  $cat->setId($_GET["id"]);
}

if (isset($_POST["id"])) {

  require_once('../dao/CategoryDAO.php');
  require_once('../models/User.php');
  $categoria = new Category($_POST["name-new"]);
  $categoria->setId($_POST['id']);
  $categoryDao = new CategoryDAO();
  $categoryDao->alterar($categoria);
  header('location:categories.php');
  
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Categorias | GERPET</title>
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
            </tr>
          </thead>
          <tbody>

            <tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <th scope="row">
                  <input type="text" name="name-new" value="<?= $cat->getName(); ?>">
                </th>
                <td>
                  <input type="hidden" name="id" value="<?= $cat->getId(); ?>">
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