<?php
function Conectar(){
    $link = mysqli_connect("localhost","root","","prueba");

        if(!$link) {
			echo "<center>E R R O R</center>"
				."<center>No se pudo conectar a la base de datos</center>";
			exit();
		}
		return $link;

}

?>