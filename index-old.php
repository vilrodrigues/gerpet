<?php

  require_once('src/dao/CategoryDAO.php');
  require_once('src/dao/ProductDAO.php');
  require_once('src/dao/UserDAO.php');

  $categoryDao = new CategoryDAO();
  $userDao = new UserDAO();

  $query = $userDao->selecionarPeloNome('%');
  foreach ($query as $arr)
    $userDao->remover($arr['id']);

  $query = $categoryDao->selecionarPeloNome('%');
  foreach ($query as $arr)
    $categoryDao->remover($arr['id']);

?>
