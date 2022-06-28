<?php

session_start();

include '../dao/UserDAO.php';

$userDao = new UserDAO();

$grupo = $userDao->listarTodos();

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
    <main>
        <h3>Listagem de Usuários</h3>
        <a href="./addUser.php">Novo Usuário</a>
    </main>
    <table border="1" class="">
        <thead>
            <tr>
                <th>ID: </th>
                <th>Nome: </th>
                <th>Login: </th>
                <th>Permission: </th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($grupo as $user) {?>
                <tr>
                    <td><?=$user["id"]?></td>
                    <td><?=$user["name"]?></td>
                    <td><?=$user["login"]?></td>
                    <td><?=$user["permission"]?></td>
                    <th>
                        <form name="editUser" action="./editUser.php?id=<?=$user["id"]?>" method="POST">
                            <input type="hidden" name="id" value=<?=$user["id"]?>>
                            <input class="btn_editar" type="submit" value="Editar">
                        </form>
                    </th>
                    <th>
                        <form name="deleteUser" action="./deleteUser.php" method="POST">
                            <input type="hidden" name="id" value=<?=$user["id"]?>>
                            <input type="hidden" name="acao" value="excluir">
                            <input class="btn_excluir" type="submit" value="Excluir">
                        </form>
                    </th>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>
</html>