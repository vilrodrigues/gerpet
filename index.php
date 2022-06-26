<?php
/*
$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/gerpet/':
        require __DIR__ . '/src/views/home.php';
        break;

    case '/gerpet/login':
        require __DIR__ . '/src/views/login.php';
        break;
    
    case '/gerpet/home':
        require __DIR__ . '/src/views/home.php';
        break;

    case '/gerpet/users':
        require __DIR__ . '/src/views/users.php';
        break;

    case '/gerpet/register':
        require __DIR__ . '/src/views/register.php';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/not-found.php';
        break;
}
*/
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
  <h1>Início</h1>
  <?php
 

    if (isset($_SESSION)) {
        echo $_SESSION['name'] . '<br>';
        echo "<a href='src/views/logout.php'>Sair</a>";

    } else {
        var_dump(isset($_SESSION));
        echo "<a href='src/views/login.php'>Entrar</a>";
    }
  ?>
</body>
</html>