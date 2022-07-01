<?php

session_start();

if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}


require_once('../dao/ServiceDAO.php');

$serviceDao = new ServiceDAO();

if (isset($_GET["id"])) {
  $query = $serviceDao->selecionarPeloId($_GET["id"]);
  $service = new Service($query[0]['name'], $query[0]['description'], $query[0]['price']);
  $service->setId($_GET["id"]);
}

if (isset($_POST["id"])) {
  $serv = new Service($_POST["name-new"], $_POST["description-new"], $_POST["price-new"]);
  $serv->setId($_POST['id']);
  $serviceDao->alterar($serv);
  header('location:services.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Produtos | GERPET</title>
</head>

<body>

  <?php include_once 'templates/navbar.php' ?>

  <div class="container mt-5 table-responsive">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Description</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <th scope="row">
                  <input required type="text" name="name-new" value="<?= $service->getName(); ?>">
                </th>
                <td>
                  <input required type="text" name="description-new" value="<?= $service->getDescription(); ?>">
                </td>
                <td>
                  <input required type="number" step=".01" name="price-new" value="<?= $service->getPrice(); ?>">
                </td>
                <td>
                  <input type="hidden" name="id" value="<?= $service->getId(); ?>">
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