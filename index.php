<?php

  require_once('src/dao/UserDAO.php');
  $userDao = new UserDAO();
  $user = new User("Diego", "12345678", "1");
  $userDao->insert($user);
  
?>
