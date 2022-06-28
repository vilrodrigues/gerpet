<?php

session_start();


if(isset($_GET["id"])){
    require_once '../dao/UserDAO.php';
    $userDao = new UserDAO();
    $usuario = $userDao->selecionarPeloId($_GET["id"]);
    // Quebrar o array que retornou da consulta, as variaveis serao os campos do banco conforme o retorno
    extract($array[0]);
}

if(isset($_POST["acao"])){
    echo "\neditar\n";
    require_once '../dao/UserDAO.php';
    require_once '../models/User.php';
    $usuario = new User($_POST["name-new"], $_POST["login-new"], $_POST["password-new"], $_POST["permission-new"]);
    $userDao = new UserDAO();
    $userDao->alterar($usuario);
    echo "<h2>O usuário foi alterado!</h2>";
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
<form action="" method="post" name="editUser">
    <table border=1>
            <tr>
                <td><label for="name">Nome:</label></td>
                <td><input type="text" name="name-new" id="input-name" value="<?=$name?>" autofocus></td>
            </tr>
            <tr>
                <td><label for="login">Login:</label></td>
                <td><input type="text" name="login-new" id="input-login" value="<?=$login?>"></td>
            </tr>
            <tr>
                <td><label for="password">Nova Senha:</label></td>
                <td><input type="password" name="password-new" id="input-password"></td>
            </tr>
            <tr>
                <td><label for="permission">Nível de Usuário:</label></td>
                <td><input type="number" name="permission-new" id="input-permission" min="1" max="3" value="<?=$permission?>"></td>
            </tr>
            <tr>
                <td><label>Opções: </label></td>
                <td>
                    <input class="btn_salvar" type="submit" value="Salvar">
                    <input type="hidden" name="acao" value="editar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>