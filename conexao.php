<?php 

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "gerpet";

$db_name = "login_acesso";
$connect = mysqli_connect($servername, $username, $password, $db_name);

if (isset($_POST['btn-entrar'])) {
  $login = mysqli_escape_string($connect, $_POST['login']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty($senha)){
        echo 'Favor preencher os dados';
    } 
    else {
        $sql = "SELECT login FROM usuarios WHERE login = '$login';";
        $resultado = mysqli_query($connect, $sql);
        echo $sql;
        echo mysqli_error($result);

        if(!result){
            echo "falhou";
        }
  if (empty($login) or empty($senha)) {
    echo 'Favor preencher os dados';

  } else {
    $sql = "SELECT login FROM usuarios WHERE login = '$login';";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      $senha = md5($senha);
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha';";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logado'] = true;
        $_SESSION["id_usuario"] = $dados['id'];        
        header('location: conectado.php');

      }

    } else {
        echo "Usuário Inexistente";

    }

  }

}
    
if (mysqli_connect_error() == true) {
    echo "Falha na conexão" . mysqli_connect_error();
    
}

?>