<?php  if(!isset($_SESSION)){
    session_start();
} ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <link rel="stylesheet" href="../css/style.css"> 
<body ng-app="BLOG">
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
        <a class="navbar-brand" href="principal2.php">Principal<span class="sr-only">(current)</span></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
             <li><a href="..\cerrar.php">Cerrar Sesión</a></li>
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
            <input type="text" class="form-control" name="login" placeholder="Buscar Perfil...">
        </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
</div>

<!--Pagina Principal-->
<br><br><br>
  <div class="container">
    <div class="row" id="principal"> 

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

       <center>
        <p style="background-color: white" class="form-control">
            Bienvenidos a mi blog transeuntes, espero sea de su agrado su estadia aquí hoy. Feliz día :D
        </p>
        </center>

      </div>
    </div>
  </div>

<!-- Perfil de usuario-->
<center>
<div class="container">
<div class="row" id="Perfil" style="display: none;">
<br><br>
<div class="col-md-offset-3 col-md-6" id="cuadro">
<?php 
if(!isset($_SESSION['login'])) {
          echo ("<center>Debe haber iniciado sesión primero<br></center>");
}else {
            $idlogin = $_SESSION[$_SESSION['login']];
            $idlogin1 = $idlogin . "1";
            $idlogin2 = $idlogin . "2";
            $idlogin3 = $idlogin . "3";
  
            $nombre = $_SESSION["$idlogin1"];
            $email = $_SESSION["$idlogin2"];
            $pass = $_SESSION["$idlogin3"];

    echo "<h2>Perfil del Usuario</h2>";
    echo "<br>";
    echo "<table class=table>";
    echo"<tr><td align=center>Usuario</td><td align=center>Nombre</td><td align=center>E-mail</td></tr>"
      . "<tr>"
      . "<td align=center>$idlogin</td>"
      . "<td align=center>$nombre</td>"      
      . "<td align=center>$email</td>"
      . "</tr>";
    echo"</table>";  

    echo "<a href=# id=pass>Cambiar Contraseña</a>";
}             
?>
</div>
</div>
</div>
</center>

<!-- Modificar Contraseña-->
<center>
  <div class="container">
    <div class="row" id="contraseña" style="display: none;">
    <br><br>
      <div class="col-md-offset-3 col-md-6" id="cuadro">
        <h2>Modificar Contraseña</h2>
        <form class="form-horizontal" class="form-control" method="POST" action="modificarC.php">
          <div class="form-group">
            <label for="viejPass" style="color:#000000" class="col-sm-2 control-label">Actual: </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="viejPass" name="vieja" placeholder="Ingrese su contraseña actual...">
            </div>
          </div>
          <div class="form-group">
            <br>
            <label for="nuevPass" style="color:#000000" class="col-sm-2 control-label">Nueva: </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="nuevPass" name="nueva" placeholder="Ingrese la nueva contraseña...">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
              <button type="submit" class="btn btn-default">Aceptar</button>
          </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</center>

<!--Mensajes-->
<div class="container">
  <div class="row" id="mensajes" ng-controller="MsjCtrl">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <center><p style="background-color: white" class="form-control">Mensajes:</p></center>
</div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center>
        <table class="table" style="background-color: white" class="form-control">
        <tr ng-repeat="x in mm | orderBy:sort:reverse | startFrom:currentPage*pageSize | limitTo:pageSize">
          <td style="width:15px;" id="login"><b>{{x.user}}:</b></td>              
          <td>{{x.msj}}</td>
          <td align="right"><span ng-if="x.edt == 1" class="badge">Editado</span>&nbsp;&nbsp;{{x.fch}}</td>
        </tr>
  </table>
   <button class="btn btn-default" ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1" title="Anterior"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button>
           <font color="white">{{currentPage+1}}/{{numberOfPages()}}</font> 
        <button class="btn btn-default" ng-disabled="currentPage >= mm.length/pageSize - 1" ng-click="currentPage=currentPage+1" title="Siguiente"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
  </center>
  </div>
</div>
</div>  

<!--enviar mensajes-->
<div class="container">
  <div class="row" id="enviar">
   <div class="col-md-offset-3 col-md-6">
   <form id= "IgrM">
   <div class="form-group">
    <div class="col-sm-10">
      <textarea style="width: 120%; height: 15%" class="form-control" name="mensajes" id="envM" placeholder="Escriba su mensaje..."></textarea>
    </div>
  </div><br><br>
  <div class="form-group" style="float: left;">
    <div class="col-sm-offset-1 col-md-6">
      <button type="submit" style="width: 350px; margin-top: 5px; margin-left: 127px;" class="btn btn-info"><b>Enviar</b></button>
    </div>
  </div>
</form>
</div>
</div>
</div>

<!-- Modificar Mensaje -->
<center>
<div class="container">
<div class="row" id="modificarM" style="display: none;" ng-controller="ComboMCtrl"><br><br>
<div class="col-md-offset-3 col-md-6" style="background-color: white; border-radius: 2px; padding: 1.2em">
  <form id="modM">
    <label for='Mensaje' style='color:#000000' class='col-sm-4 control-label'>Mensaje a Editar: </label>
      <select class="form-control" style="width: 400px" id="opc" required>
        <option value="">Seleccione...</option>
        <option ng-repeat="x in ComboM" value ="{{x.idm}}">{{x.mens}}</option>
      </select>
    <div class='form-group'><br>
      <label for='Mensaje' style='color:#000000' class='col-sm-4 control-label'>Mensaje Nuevo: </label>
        <textarea required type='text' style="width: 400px; height: 100px;" class='form-control' id="msjN" placeholder='Escriba su mensaje...'></textarea>
    </div>
    <div class='form-group'>
      <div class='col-sm-offset-1 col-sm-10'>
        <button type='submit' style="width: 200px;" class='btn btn-default'><b>Editar</b></button>
      </div>
    </div>
  </form>   
</div>
</div>
</div>
</center>
</body>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/principal.js"></script>
<script type="text/javascript" src="../js/angular.min.js"></script>
<script type="text/javascript" src="../js/angular-route.min.js"></script>
<script type="text/javascript" src="../js/controller/app.js"></script>
<script type="text/javascript" src="../js/controller/mensaje.js"></script>
<script type="text/javascript" src="../js/controller/comboMsj.js"></script>
<script type="text/javascript" src="../js/Filter/paginacion.js"></script>
</script>