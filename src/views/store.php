<?php
session_start();

if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/UserDAO.php');
$userDao = new UserDAO();
$grupo = $userDao->selecionarPeloNome('%');

if ($_GET['type'] == 'product') {
  header('location:buyProduct.php?id='.$_GET['idUser']);
}

if ($_GET['type'] == 'service') {
  header('location:buyService.php?id='.$_GET['idUser']);
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
    <h1 class="text-center mt-5">Selecione o cliente</h1>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Login</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($grupo as $user) {
            ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <?php if ($user["role"] != "admin") {
                  echo '
                <tr>
                <th scope="row">' . $user["name"] . '</th>
                <td>' . $user["login"] . '</td>
                <td>
                  <select required name="type">
                    <option value="service">Serviço</option>
                    <option value="product">Produto</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="idUser" value=' . $user["id"] . '>
                  <input class="btn btn-primary" type="submit" value="Selecionar">
                </td>
              </tr>
                ';
                }
                ?>
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