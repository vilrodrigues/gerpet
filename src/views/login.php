<?php
  require_once ('../helpers/SessionHelper.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GERPET</title>
</head>
<body>
  
  <?php flash('login') ?>

  <h1>Login de Acesso</h1>
  <form action="../controllers/LoginController.php" method="POST">
    <input type="hidden" name="type" value="login">
    
    <label for="login">Login: </label>
    <input type="text" name="login" id="login" value="" placeholder="usuario" required autofocus/><br>
    
    <label for="password">Senha: </label>
    <input type="password" name="password" id="password" value="" placeholder="********" required autofocus/><br>
    
    <button type="submit" name="submit">Entrar</button>
  </form>

</body>
</html>