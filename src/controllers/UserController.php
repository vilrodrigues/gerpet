<?php

require_once('../models/User.php');
require_once('../helpers/SessionHelper.php');
require_once('../dao/UserDAO.php');

function login()
{

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
    exit();
  } else {
    flash('login', 'Senha ou Login incorreto');
    redirect('../views/login.php');
    exit();
  }
}

function createUserSession($user)
{
  $_SESSION['userId'] = $user->getId();
  $_SESSION['userName'] = $user->getName();
  $_SESSION['userLogin'] = $user->getLogin();
  $_SESSION['userRole'] = $user->getRole();
  redirect("../../index.php");
  exit();
}

function logout()
{
  session_start();
  session_unset();
  session_destroy();

  redirect('../../index.php');
}

function singup()
{
  if (($name = trim($_POST['name'])) == "") {
    flash('login', 'O campo nome é obrigatório');
    redirect('../views/singup.php');
    exit();
  }

  if (($login = trim($_POST['login'])) == "") {
    flash('login', 'O campo login é obrigatório');
    redirect('../views/singup.php');
    exit();
  }

  if (($password = trim($_POST['password'])) == "") {
    flash('login', 'O campo senha é obrigatório');
    redirect('../views/singup.php');
    exit();
  }

  if (($password2 = trim($_POST['password2'])) == "") {
    flash('login', 'O campo senha é obrigatório');
    redirect('../views/singup.php');
    exit();
  }

  if ($password != $password2) {
    flash('login', 'Senhas diferentes.');
    redirect('../views/singup.php');
    exit();
  }

  $userDao = new UserDAO();
  $user = new User($name, $login, $password);
  $userDao->adicionar($user);

  createUserSession($user);
  redirect("../../index.php");
  exit();
}

function delete()
{
  $userDao = new UserDAO();
  $userDao->remover($_POST['id']);
  redirect('../views/users.php');
}

function edit()
{
  $userDao = new UserDAO();
  $user = new User($_POST['name'], $_POST['login'], $_POST['password']);
  $user->setId($_POST['id']);
  $userDao->alterar($user);
  redirect('../views/users.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  switch ($_POST['type']) {
    case 'login':
      login();
      break;
    case 'singup':
      singup();
      break;
    case 'delete':
      delete();
      break;
    case 'edit':
      edit();
      break;
    default:
      redirect('../../index.php');
      exit();
  }
} else {

  switch ($_GET['q']) {
    case 'logout':
      logout();
      break;
    default:
      redirect("../../index.php");
  }
}
