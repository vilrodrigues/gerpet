<?php
session_start();
if (empty($_SESSION['userName']))
  header('location:login.php');
if ($_SESSION['userRole'] != 'admin') {
  header('location:../controllers/UserController.php?q=logout');
}

require_once('../dao/CategoryDAO.php');
require_once('../dao/ProductDAO.php');

$productDao = new ProductDAO();
$grupo = $productDao->selecionarPeloNome('%');

$categoryDao = new CategoryDAO();
$cats = $categoryDao->selecionarPeloNome('%');


if (isset($_POST['id'])) {
  $productDao = new ProductDAO();
  $productDao->remover($_POST['id']);
  header('location:products.php');
}

if (isset($_POST['adicionar'])) {
  $productDao = new ProductDAO();
  $product = new Product($_POST['name'], $_POST['description'], $_POST['category'], $_POST['price'], $_POST['amount']);
  $productDao->adicionar($product);
  header('location:products.php');
}


require_once('../dao/ProductDAO.php');

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
              <th scope="col">Descrição</th>
              <th scope="col">Categoria</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <th scope="row">
                  <input required type="text" name="name" value="" placeholder="Nome">
                </th>
                <td>
                  <input required type="text" name="description" value="" placeholder="Descrição">
                </td>
                <td><select required name="category">
                    <?php

                    foreach ($cats as $cat) {
                      echo '<option value="' . $cat['name'] . '">' . $cat['name'] . '</option>';
                    }

                    ?>
                  </select>
                </td>
                <td>
                  <input type="number" step=".01" name="price" value="" placeholder="Preço">
                </td>
                <td>
                  <input type="number" name="amount" value="" placeholder="Quantidade">
                </td>
                <td>
                  <input type="hidden" name="adicionar" value="adicionar">
                  <input class="btn btn-primary" type="submit" value="Adicionar">
                </td>
              </form>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <td scope="col">Descrição</td>
              <td scope="col">Categoria</td>
              <td scope="col">Quantidade de Itens</td>
              <td scope="col">Preço</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($grupo as $pro) {
            ?>
              <tr>
                <th scope="row"><?= $pro["name"] ?></th>
                <td><?= $pro["description"] ?></td>
                <td><?= $pro["category"] ?></td>
                <td><?= $pro["amount"] ?></td>
                <td><?= $pro["price"] ?></td>
                <td>
                  <form action="./editProduct.php" method="GET">
                    <input type="hidden" name="id" value=<?= $pro["id"] ?>>
                    <input class="btn btn-primary" type="submit" value="Editar">
                  </form>
                </td>
                <td>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="id" value=<?= $pro["id"] ?>>
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