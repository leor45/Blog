<?php
if(!isset($_SESSION)){
    session_start();
}
if(!function_exists("Conectar")){
    include "ConexionDB.php";
    $link = Conectar();
}
function EnvM($link, $msj, $user){
    $query = "INSERT INTO mensajes values(default,'$msj','$user', now());";
    return $resultado = mysqli_query($link,$query);
}
$msj = $_POST['msj'];
$user = $_SESSION['login'];

           if(!$msj == null) {
                EnvM($link, $msj, $user);
             }
       mysqli_close($link);
  
?>