<?php

session_start();

require_once('../dao/ProductDAO.php');
require_once('../dao/CategoryDAO.php');

$categoryDao = new CategoryDAO();
$cats = $categoryDao->selecionarPeloNome('%');

if (isset($_GET["id"])) {
  $productDao = new ProductDAO();
  $query = $productDao->selecionarPeloId($_GET["id"]);
  $product = new Product($query[0]['name'], $query[0]['description'], $query[0]['category'], $query[0]['price'], $query[0]['amount']);
  $product->setId($_GET["id"]);
}

if (isset($_POST["id"])) {

  $prod = new Product($_POST["name-new"], $_POST["description-new"], $_POST["category-new"], $_POST["price-new"], $_POST["amount-new"]);
  $prod->setId($_POST['id']);
  $productDao = new ProductDAO();
  $productDao->alterar($prod);
  header('location:products.php');
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
              <th scope="col">Categoria</th>
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <th scope="row">
                  <input required type="text" name="name-new" value="<?= $product->getName(); ?>">
                </th>
                <td>
                  <input required type="text" name="description-new" value="<?= $product->getDescription(); ?>">
                </td>
                <td>
                  <select required name="category-new">
                    <?php
                    foreach ($cats as $cat) {
                      echo '<option value="' . $cat['name'] . '">' . $cat['name'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
                <td>
                  <input required type="text" name="price-new" value="<?= $product->getPrice(); ?>">
                </td>
                <td>
                  <input required type="text" name="amount-new" value="<?= $product->getAmount(); ?>">
                </td>
                <td>
                  <input type="hidden" name="id" value="<?= $product->getId(); ?>">
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