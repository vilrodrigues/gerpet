<?php
session_start();
if (empty($_SESSION['userName'])) {
  header('location:src/views/login.php');
} else {
  header('location:src/views/home.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Início</title>
</head>

<body>
</body>

</html>

