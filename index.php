<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: ../php/login');
}

 ?>

<!-- TRABAJO PRACTICO -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>my Estacionamiento</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/myStyle.css">
  <link rel="stylesheet" type="text/css" href="css/animations.css">

</head>
<body>

<nav class="navbar navbar-inverse animated slideDown">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Estacionamiento App</a>
    </div>
    <ul class="nav navbar-nav">

     <?php if ($_SESSION['permiso'] == "admin") {?>
      
      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Administracion de Usuarios</a></li>
          <li><a onclick="FrmEstacionamiento()">Borrar Vehiculo Estacionado</a></li>
          <li class="divider"></li>
          <li class="dropdown-submenu">
            <a tabindex="-1">Grillas</a>
            <ul class="dropdown-menu">
              <li><a tabindex="-1">Historial de Cobro</a></li>
              <li class="dropdown-submenu">
                <a href="#">Balances</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Anual</a></li>
                  <li><a href="#">Mensual</a></li>
                  <li><a href="#">Semanal</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <?php } ?>

      <li><a onclick="FrmNuevoVehiculo()">Nuevo Vehiculo</a></li>
      <li><a onclick="FrmEstacionamiento()">Grilla de Vehiculos</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
              <li>
                <div class="row">
                  <div class="col-md-12">
                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                      <div class="form-group">
                         <button onclick="Desloguear()" class="btn btn-danger btn-block">Desloguear</button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
          </ul>
        </li>

      </ul> 
  </div>   
</nav>
  
<div id="cuerpo"></div>

<div id="divModal"></div>

</body>

  <!-- Script -->

  <script type="text/javascript" src="js/funciones.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>