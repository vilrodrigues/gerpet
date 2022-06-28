<?php

  require_once('../models/User.php');
  require_once('../helpers/SessionHelper.php');
  require_once('../dao/UserDAO.php');

 function login() {

  if (($login = trim($_POST['login'])) == "") {
    flash('login', 'O campo login é obrigatório');
    redirect('../views/login.php');
    exit();
  }
  
  if (($password = trim($_POST['password'])) == "") {
    flash('login', 'O campo senha é obrigatório');
    redirect('../views/login.php');
    exit();
  }

  $userDao = new UserDAO();
  $user = $userDao->login($login, $password);

  if ($user != null) {
    createUserSession($user);
    redirect('../views/home.php');
  } else {
    flash('login', 'Senha ou Login incorreto');
    redirect('../views/login.php');
    exit();
  }
}

 function createUserSession($user){
  $_SESSION['userId'] = $user->getId();
  $_SESSION['userName'] = $user->getName();
  $_SESSION['userLogin'] = $user->getLogin();
  $_SESSION['userPermission'] = $user->getPermission();
  //print_r($user);
  redirect('../views/home.php');
  exit();
}

 function logout(){
  unset($_SESSION['userId']);
  unset($_SESSION['userName']);
  unset($_SESSION['userLogin']);
  unset($_SESSION['userPermission']);
  session_destroy();
  redirect('../view/login.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  switch($_POST['type']) {
    case 'login':
      login();
      break;
    default:
      redirect('../views/index.php');
  }
  
} else {

  switch($_GET['q']){
    case 'logout':
      logout();
      break;
    default:
      redirect("../views/index.php");
  }
}
