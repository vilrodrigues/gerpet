<?php  

session_start();

if(isset($_POST["acao"])){
    include '../dao/UserDAO.php';
    require_once '../models/User.php';
    $usuario = new User($_POST["name"], $_POST["login"], $_POST["password"], $_POST["permission"]);
    $userDao = new UserDAO();
    $userDao->adicionar($usuario);
    header("location: users.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
    <h1>Criar Usuário do Sistema</h1>

    <form action="<?= $_SERVER["PHP_SELF"];?>" method="post" name="addUser" autocomplete="off">
        <table border=1>
            <tr>
                <td><label for="name">Nome:</label></td>
                <td><input type="text" name="name" id="input-name" autofocus></td>
            </tr>
            <tr>
                <td><label for="login">Login:</label></td>
                <td><input type="text" name="login" id="input-login"></td>
            </tr>
            <tr>
                <td><label for="password">Senha:</label></td>
                <td><input type="password" name="password" id="input-password"></td>
            </tr>
            <tr>
                <td><label for="permission">Nível de Usuário:</label></td>
                <td><input type="number" name="permission" id="input-permission" min="1" max="3"></td>
            </tr>
            <tr>
                <td><label>Opções: </label></td>
                <td>
                    <input class="btn_salvar" type="submit" value="Salvar">
                    <input type="hidden" name="acao" value="inserir">
                </td>
            </tr>
        </table>
    </form>
   
    </form>
</body>
</html>