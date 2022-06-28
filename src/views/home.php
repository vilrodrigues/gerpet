<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Painel</h1>

    <?php
        session_start();

        $nivel = $_SESSION['userPermission'];

        if($nivel == 1){
            header('location: ./home1.php');
        }

        if($nivel == 2){
            header('location: ./home2.php');
        }

        if($nivel == 3){
            header('location: ./home3.php');
        }
    ?>
</body>
</html>