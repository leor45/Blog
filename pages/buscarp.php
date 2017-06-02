<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/style.css">
<?php
if(!isset($_SESSION)){
    session_start();
}
?>    
<div class="container">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#Principal" id="Principal">Principal<span class="sr-only">(current)</span></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
             <li><a href="cerrar.php">Cerrar Sesión</a></li>
          </ul>  
        <ul class="nav navbar-nav">
          <p class="navbar-text navbar-right">Haz iniciado sesión como <a href="#" id="login" class="navbar-link"><?php echo $_SESSION['login']; ?></a></p>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Más <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" id="modificar">Modificar Mensaje(s)</a></li>
        </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right" role="search" action="buscarp.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar Perfil...">
        </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
</div>

<!--Buscar-->
<center>
<br><br><br>
<div class="container">
  <div class="row" id="Perfil-2" id="cuadro">
   <div class="col-md-offset-3 col-md-6" id="cuadro">
      <?php         
        $login = $_POST['login'];
        $idConn = mysqli_connect("localhost","root","","prueba");
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
            $query = "SELECT * FROM usuario where login = '$login'";
            $resultado = mysqli_query($idConn,$query);
            $registro = mysqli_fetch_array($resultado);
            if($registro){                           
            echo "<h2>Perfil de Usuario</h2>";
            echo "<br>";
            echo "<table class=table>";
            echo"<tr><td align=center>Usuario</td><td align=center>Nombre</td><td align=center>E-mail</td></tr>"
            . "<tr>"
            . "<td align=center>",$registro['login'],"</td>"
            . "<td align=center>",$registro['nombres'],"</td>"      
            . "<td align=center>",$registro['email'],"</td>"
            . "</tr>";
            echo"</table>";
            }else{
              echo "<br><br><br><br><b>El nombre de usuario ingresado no existe</b><br/>";
            }                 
        } ?>
    <form name="f4" method="post" action="principal2.php">
     <button type="submit" class="btn btn-default">Regresar</button>
    </form>
      </center>
    </div>
  </div>
</div>