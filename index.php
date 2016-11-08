<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/myStyle.css">
  <link rel="stylesheet" type="text/css" href="css/animations.css">
  <script type="text/javascript" src="js/funciones.js"></script>
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
      <li><a onclick= "Frm('NuevoAuto')">Nuevo Vehiculo</a></li>
      <li><a onclick="Frm('Estacionamiento')">Grilla de Vehiculos</a></li>
    </ul>
    <div id = "frmUsuario">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://www.jquery2dotnet.com">Sign Up</a></li>
        <li class="dropdown">
          <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
          <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
            <li>
              <div class="row">
                <div class="col-md-12">
                  <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail2">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputPassword2">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                       <label>
                       <input type="checkbox"> Remember me
                       </label>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-success btn-block">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </li>
            <li class="divider"></li>
            <li>
               <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
               <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
            </li>
          </ul>
        </li>
      </ul>  
    </div>
  </div>   
</nav>
  
<div id="cuerpo">
  <!--<h3>Navbar With Dropdown</h3>
  <p>This example adds a dropdown menu for the "Page 1" button in the navigation bar.</p>-->
</div>

</body>
</html>