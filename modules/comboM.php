<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!function_exists("Conectar")){
    include "ConexionDB.php";
    $link = Conectar();
}

$idlogin = $_SESSION[$_SESSION['login']];
    if(isset($_SESSION['login'])){
        $query = "SELECT * , DATE_FORMAT(fecha ,'%d/%m/%Y %h:%i:%s %p') as fechaM FROM mensajes WHERE login = '$idlogin' order by fecha Desc;";

            if ($result = mysqli_query($link,$query)) { 
                while($reg = mysqli_fetch_array($result)){
                    $id = $reg['id'];
                    $mensaje = $reg['mensajes'];
                    
                    $data[] = array (
                        'idm' => $id,
                        'mens' => $mensaje
                    );
                } 
                echo json_encode($data, JSON_PRETTY_PRINT); 
            }else {
                $data[] = null;
                echo json_encode($data, JSON_PRETTY_PRINT); 
            }
    } 
  
?>   