<?php

  require_once('src/dao/UserDAO.php');
  
  $userDao = new UserDAO();
  
  for ($i = 0; $i < 20; $i++) {
    $user = new User('user ' .$i, 'no password', 3);
    $userDao->adicionar($user);
  }
  
  $query = $userDao->selecionarPeloNome('%');
  echo '<h1> Antes </h1>';

  foreach ($query as $arr) {
    foreach ($arr as $key => $value) 
      echo $key . ' => ' . $value . '<br>';
    echo "<hr>";
  }

  foreach ($query as $arr)
    $userDao->remover($arr['id']);

  $query = $userDao->selecionarPeloNome('%');
  echo '<h1> Depois </h1>';
  
  foreach ($query as $arr) {
    foreach ($arr as $key => $value) 
      echo $key . ' => ' . $value . '<br>';
    echo "<hr>";
  }
  
?>
