<?php 

session_start();

if (isset($_SESSION['usuario'])) {
    //LOCAL HOST
    header('Location: http://localhost/php');
    //MY ESTACINAMIENTO
    //header('Location: http://myestacionamiento.esy.es');
}

 ?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../css/bootstrap.min.css">                
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/animations.css">
        <link rel="stylesheet" href="../css/style.css">

    </head>

    <body>

        <div id="divModal"></div>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 style="color: #FFFFFF"><strong >My Estacionamiento </strong> Login</h1>
                            <div class="description">
                            	<p style="color: #FFFFFF">
	                            	Esta pagina fue hecha para un Trabajo Practico de la universidad <strong>(UTN)</strong>, espero que les guste.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row animated fadeIn">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                                    <h3>Login de Ingreso al sitio</h3>
                                    <p>Ingresa tu usuario y password para loguearte:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock animated floating"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" onsubmit="ValidarLogin(); return false" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-email">Usuario</label>
			                        	<input type="email" name="email" placeholder="Usuario..." class="form-control" id="email" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-clave">Contraseña</label>
			                        	<input type="password" name="flave" placeholder="Contraseña..." class="form-control" id="clave" required>
			                        </div>
			                        <button type="submit" class="btn btn-danger">Ingresar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3><strong>(Test)</strong>  Ingresar como:</h3>
                        	<div>
	                        	<a class="btn btn-link-2" onclick="testA()">
	                        		<i class="fa"></i> Administrador
	                        	</a>
	                        	<a class="btn btn-link-2" onclick="testU()">
	                        		<i class="fa"></i> Usuario
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/login.js"></script>

    </body>

</html>