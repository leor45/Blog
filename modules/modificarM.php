<?php
if(!isset($_SESSION)){
    session_start();
}
if(!function_exists("Conectar")){
    include "ConexionDB.php";
    $link = Conectar();
}  

function ModM($link, $mensajes, $ID) {
    $query = "UPDATE mensajes SET mensajes = '$mensajes', fecha = now(), Editar = 1 WHERE id = '$ID';";
    return $resultado = mysqli_query($link,$query);
}
$mensajes = $_POST['mensajes'];
$ID = $_POST['opcion'];
     
       if(!$mensajes == null) {
           ModM($link, $mensajes, $ID);
       }
mysqli_close($link);
?>
