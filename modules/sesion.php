
<?php
if(!isset($_SESSION)){
    session_start();
}
if(!function_exists("Conectar")){
    include "ConexionDB.php";
    $link = Conectar();
}

$user = $_POST['login'];
$password = $_POST['pass'];


$query = "SELECT * FROM usuario WHERE login = '$user' and pass = '$password';";
$resultado = mysqli_query($link,$query);
$registro = mysqli_fetch_array($resultado);
if($registro) {
    $_SESSION[$user] = $_POST['login'] ;
    $user1= $user . "1";
    $_SESSION["$user1"] = $registro['nombres'];
    $user2= $user . "2";
    $_SESSION["$user2"] = $registro['email'];
    $user3= $user . "3";
    $_SESSION["$user3"] = $_POST['pass'];;
    
}else{
    echo "Usuario o Contraseña incorrecta";
}


if (isset($_SESSION[$_POST['login']])){
    $login = $_SESSION[$_POST['login']];
    $pass = $_SESSION[$_POST['pass']];
}
if ($user == $login) {

  $_SESSION['login']= $user;
  $_SESSION['password'] = $password;

  
}
mysqli_close($link);

?>
