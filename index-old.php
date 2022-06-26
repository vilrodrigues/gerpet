<?php

  require_once('src/dao/CategoryDAO.php');
  require_once('src/dao/ProductDAO.php');

  $categoryDao = new CategoryDAO();
  $productDao = new ProductDAO();

  $query = $productDao->selecionarPeloNome('%');
  echo '<h1> Antes </h1>';
  foreach ($query as $arr) {
    foreach ($arr as $key => $value) 
      echo $key . ' => ' . $value . '<br>';
    echo "<hr>";
    $product = new Product($arr['name'], $arr['description'], $arr['category'], $arr['price']);
    $product->setId($arr['id']);
    $product->setName('new Product');
    $product->setPrice(4532);
    $productDao->alterar($product);
  }

  $query = $productDao->selecionarPeloNome('%');

  echo '<h1> Depois </h1>';
  foreach ($query as $arr) {
    foreach ($arr as $key => $value) 
      echo $key . ' => ' . $value . '<br>';
    echo "<hr>";
  }

  foreach ($query as $arr)
    $productDao->remover($arr['id']);

    $query = $productDao->selecionarPeloNome('%');

  echo '<h1> Mais Depois </h1>';
  foreach ($query as $arr) {
    foreach ($arr as $key => $value) 
      echo $key . ' => ' . $value . '<br>';
    echo "<hr>";
  }
  

  
?>
