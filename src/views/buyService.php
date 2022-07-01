<?php
session_start();

if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/ServiceDAO.php');
require_once('../dao/itemServiceDAO.php');
$serviceDao = new ServiceDAO();
$grupo = $serviceDao->selecionarPeloNome('%');

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'agendar') {
    $itemServiceDao = new ItemServiceDAO();
    $itemServiceDao->adicionar($_POST['idUser'],$_POST['idServ'], $_POST['date'], $_POST['price']);
    header('location:buyService.php?id='.$_POST['idUser']);
  }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Loja | GERPET</title>
</head>

<body>

  <?php include_once 'templates/navbar.php' ?>

  <div class="container">
    <h1 class="text-center mt-5">Serviços Disponíveis</h1>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Data</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($grupo as $serv) {
            ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <tr>
                  <th scope="row"><?= $serv["name"] ?></th>
                  <td><?= $serv["description"] ?></td>
                  <td><?= $serv["price"] ?></td>
                  <td><input type="date" name="date"></td>
                  <td>
                    <input type="hidden" name="idServ" value=<?= $serv["id"] ?>>
                    <input type="hidden" name="idUser" value=<?= $_GET["id"] ?>>
                    <input type="hidden" name="description" value=<?= $serv["description"] ?>>
                    <input type="hidden" name="price" value=<?= $serv["price"] ?>>
                    <input type="hidden" name="action" value="agendar">
                    <input class="btn btn-primary" type="submit" value="Agendar">
                  </td>
                </tr>

              </form>
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