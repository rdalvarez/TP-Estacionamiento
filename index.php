<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: http://localhost/php/login');
  return;
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
      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Balances</a></li>
          <li><a href="#">Adm. de Usuarios</a></li>
          <li class="divider"></li>
          <li class="dropdown-submenu">
            <a tabindex="-1" href="#">Hover me for more options</a>
            <ul class="dropdown-menu">
              <li><a tabindex="-1" href="#">Second level</a></li>
              <li class="dropdown-submenu">
                <a href="#">Even More..</a>
                <ul class="dropdown-menu">
                    <li><a href="#">3rd level</a></li>
                  <li><a href="#">3rd level</a></li>
                </ul>
              </li>
              <li><a href="#">Second level</a></li>
              <li><a href="#">Second level</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a onclick="FrmNuevoVehiculo()">Nuevo Vehiculo</a></li>
      <li><a onclick="FrmEstacionamiento()">Grilla de Vehiculos</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://www.jquery2dotnet.com">Sign Up</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Iniciar Session <b class="caret"></b></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
              <li>
                <div class="row">
                  <div class="col-md-12">
                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Correo electrónico</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Correo electrónico" required>
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Contraseña" required>
                      </div>
                      <div class="checkbox">
                         <label>
                         <input type="checkbox"> Recordarme
                         </label>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-success btn-block">Entrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                 <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Ingresar como Usuario">
                 <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Ingresar como Administrador">
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