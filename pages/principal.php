  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <link rel="stylesheet" href="../css/style.css">

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
          <button type="button" href="#" id="inicio" class="btn btn-default navbar-btn">Iniciar Sesión</button>
          <button type="button" href="#" id="registro" class="btn btn-default navbar-btn">Registrarse</button>
        </ul>
        <form class="navbar-form navbar-right" id="busqueda" role="search">
        <div class="form-group">
            <input type="text" class="form-control" id="busqueda" placeholder="Buscar Perfil...">
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

      </div><br>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <center>
        <p style="background-color: white" class="form-control">
            Si no haz iniciado sesión te invito a que lo hagas o en caso contrario te registres.
        </p>
        </center>

      </div><br>
    </div>
  </div>

<!--Mensajes-->
<div class="container">
  <div class="row" id="mensajes" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <center><p style="background-color: white" class="form-control">Mensajes:</p></center>
</div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center><table class="table" style="background-color: white" class="form-control">
    <?php
       $idConn = mysqli_connect("localhost","root","","prueba");
        if(!$idConn) {
         die("Error! No se pudo realizar la conexión con el servidor.");
        }else {
            $query = "SELECT * , DATE_FORMAT(fecha ,'%d/%m/%Y %h:%i:%s %p') as fechaM FROM mensajes order by fechaM Desc";
            $result = mysqli_query($idConn,$query);
           
            if($reg = mysqli_fetch_array($result)) {                            
                do{    
                        echo "<tr>"
                        ."<b><td style='width:15px;' id=login >",$reg['login'],": </td></b>"                
                        ."<td>",$reg['mensajes'],"</td>"
                        ."<td align=right>",$reg['fechaM'],"</td>";
                            
                }while($reg = mysqli_fetch_array($result));
                
            }else {
              echo "<tr><td align='center'>No se encontraron mensajes D:</td></tr>";
            }            
        }
    ?> 
  </table>
  </center>
  </div>
</div>
</div> 



<!--Iniciar sesion-->
<div class="container">
  <div class="row" id="iniciar" style="display:none;">
   <div class="col-md-offset-3 col-md-6" id="cuadro2">
   <form id="InicioS">
   <div class="form-group">
    <label for="user" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="login" id="log" placeholder="Ingrese Usuario...">
    </div>
  </div><br><br>
  <div class="form-group">
    <label for="pass" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" id="password" placeholder="Ingrese Contraseña...">
    </div>
  </div><br><br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Iniciar Sesión</button>
    </div>
  </div>
</form>
</div>
</div>
</div>

<!--Registrarse-->
<div class="container">
  <div class="row" id="reg" style="display:none;">
  <div class="col-md-offset-3 col-md-6" id="cuadro">
   <form class="form_horizontal" name="form1" method="post" action="guardar.php">
   <div class="form-group">
    <label for="user" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre...">
    </div>
  </div><br><br>
  <div class="form-group">
  <label for="user" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Usuario...">
    </div>
  </div><br><br>
  <div class="form-group">
    <label for="pass" class="col-sm-2 control-label">Correo</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese Correo...">
    </div>
  </div><br><br>
  <div class="form-group">
    <label for="pass" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingrese Contraseña...">
    </div>
  </div><br><br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Registrarse</button>    
</div>
</div> 
</form>
</div>
</div>
</div>

<div class="container">
  <div class="row" id="Alerta" style="display:none;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center><p style="background-color: white" class="form-control">Para poder ver perfiles primero debe haberse registrado e iniciado sesión.</p></center>
    </div>
  </div>
</div>


<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/principal.js"></script>
<script type="text/javascript" src="../js/controller/sesion.js"></script>
</script>