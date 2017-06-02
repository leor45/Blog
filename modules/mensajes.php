 <?php
if(!isset($_SESSION)){
    session_start();
}
if(!function_exists("Conectar")){
    include "ConexionDB.php";
    $link = Conectar();
}


$query = "SELECT * , DATE_FORMAT(fecha ,'%d/%m/%Y %h:%i:%s %p') as fechaM FROM mensajes order by fecha Desc";

if($result = mysqli_query($link,$query)) {                            
    while($reg = mysqli_fetch_array($result)){
        $usuario = strtoupper($reg['login']);
        $mensaje = $reg['mensajes'];
        $fecha = $reg['fechaM']; 
        $editar = $reg['editar'];   

            $data[] = array (
                'user' => $usuario,
                'msj' => $mensaje,
                'fch' => $fecha,
                'edt' => $editar
            );      
    }
    echo json_encode($data, JSON_PRETTY_PRINT); 
}else {
    $data[] = null;
    echo json_encode($data, JSON_PRETTY_PRINT); 
}            
?>