<?php
session_start();

if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/ProductDAO.php');
require_once('../dao/ItemProductDAO.php');
$productDao = new ProductDAO();
$grupo = $productDao->selecionarPeloNome('%');

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'comprar') {
    $itemProductDao = new ItemProductDAO();
    $itemProductDao->adicionar($_POST['idUser'],$_POST['idProd'], $_POST['amount'], $_POST['amount'] * $_POST['price']);
    $productDao->removerUnidades($_POST['idProd'], $_POST['amountTotal'] - $_POST['amount']);
    header('location:buyProduct.php?id='.$_POST['idUser']);
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
    <h1 class="text-center mt-5">Produtos Disponíveis</h1>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço Por Unidade</th>
              <th scope="col">Quantidade</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($grupo as $prod) {
            ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <tr>
                  <th scope="row"><?= $prod["name"] ?></th>
                  <td><?= $prod["description"] ?></td>
                  <td><?= $prod["price"] ?></td>
                  <td><input required type="number" name="amount" max="<?= $prod['amount']?>" min="1"></td>
                  <td>
                    <input type="hidden" name="idProd" value=<?= $prod["id"] ?>>
                    <input type="hidden" name="idUser" value=<?= $_GET["id"] ?>>
                    <input type="hidden" name="amountTotal" value=<?= $prod['amount'] ?>>
                    <input type="hidden" name="description" value=<?= $prod["description"] ?>>
                    <input type="hidden" name="price" value=<?= $prod["price"] ?>>
                    <input type="hidden" name="action" value="comprar">
                    <input class="btn btn-primary" type="submit" value="Comprar">
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