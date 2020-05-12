<?php
include_once 'dbMySql.php';
$con = new DB_con();
$formatos=array('.jpg','.png','.gif','.ico');
// data insert code starts here.
if(isset($_POST['btn-save']))
{

     $nombre=$_FILES['archivo']['name'];
        $nombreTmp=$_FILES['archivo']['tmp_name'];
        $exte=substr($nombre, strrpos($nombre,'.'));
        if (in_array($exte,$formatos)) {
            if (move_uploaded_file($nombreTmp,"imagenes/$nombre")) {
                 //echo '<script> alert(" Exito al ingresar su imagen"); </script>';
                 //echo "<script> window.location='index.php'; </script>";
            }
        }
        else{
                echo '<script> alert(" Error al ingresar la imagen"); </script>';
                echo "<script> window.location='registrar.php'; </script>";
                
        }


	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
    $aemail= $_POST['email'];
    $aci= $_POST['ci'];
    $ausuario= $_POST['usuario'];
	$apassword= $_POST['password'];
    $imagen = $nombre;

	
	$res=$con->insert($fname,$lname,$aemail,$aci,$ausuario,$apassword,$imagen);
	if($res)
	{
		?>
		<script>
		alert('Usuario registrado con exito...');
        window.location='registrar.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error en el registro de usuario...');
        window.location='registrar.php'
        </script>
		<?php
	}
}
if(isset($_POST['btn-login']))
{

    $lusuario= $_POST['usuario1'];
	$lpassword= $_POST['password1'];

	
	$res=$con->login($lusuario,$lpassword);
	if($res>0)
	{
		?>
		<script>
		alert('Bienvenido...');
        window.location='servicio.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Verifique su usuario y contraseña...');
        window.location='registrar.php'
        </script>
		<?php
	}
}
// data insert code ends here.
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Meta -->
    <meta name="description" content="Geo Taxi.">
	<meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, uikit, multicolor, parallax, retina, taxi business" />
    <meta name="author" content="dhsign">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="3 days" />	
    <title>Geo-Taxi</title>
	<link rel="stylesheet" href="estilos_form.css">
	<!-- Styles -->	
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">	
	<!-- jQuery UI CSS -->
    <link href="assets/css/jquery-ui.css" rel="stylesheet">		
    <!-- Uikit CSS -->
    <link href="assets/css/uikit.almost-flat.css" rel="stylesheet">		
    <!-- OWL Carousel CSS -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">	
    <!-- Template CSS -->
	<link href="assets/css/quotes.css" rel="stylesheet">
	<link href="assets/css/product.css" rel="stylesheet">
    <link href="citycab.css" rel="stylesheet">	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<!-- Google Font -->
  </head>
  <body id="body" onload="initMap()" style="margin:0px; border:0px; padding:0px;">  <body>
    <!-- Wrap all page content -->
    <div class="page-wrapper" id="page-top">
	  <header class="header-wrapper" id="header-wrapper" >
	    <!-- Main Navigation  -->
	    <div class="container main-navigation">
		  <div id="header" class="row">
            <div class="col-md-12 col-pad-0">
	          <!-- Fixed navbar -->
              <div class="navbar navbar-default navbar-fixed-top" role="navigation"> 
				<!-- Brand and toggle get grouped -->
				<div class="navbar-header">
				  <a id="offcanvas-toggler" class="navbar-toggle" data-toggle="collapse"></a>
                  <div class="navbar-brand">
                    <a href="index.html"><img src="images/logo.png" alt="Logo"></a>
                  </div>
				</div>
		        <h2 class="navbar-text navbar-right"><i class="glyphicon glyphicon-earphone glyphicon-align-left" aria-hidden="true"></i> 60166579</h2>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-nav-center">
                    <li><a href="index.html">Inicio</a></li>
                    <li class="active"><a href="about.html">Inicie Sesion</a></li>
                    
                    <li><a href="blog#.html">F.A.Q.</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
			</div>  
          </div>
		</div>
		<!-- /Main Navigation -->
	  </header>

      <!-- Gap -->
      <div id="taxiStripe" class="container-fluid gap-fullsize">
	  </div>
	  <!-- /Gap -->	  
	  
      <!-- Lost Property -->
	    <section class="registro">
            <div class="row">                        				
                <div class="col-sm-8 col-md-6">
                    <form method="post" >
                        <table align="center" class="table1">
                            <td>
                            <h1 class="uk-text-yellow"><span>Inicie Sesion:</span></h1>
                            </td>
                            <tr>
                                <td>Usuario:
                                <input class="form-control" type="text" name="usuario1" placeholder="Usuario" required /></td>
                            </tr>
                            <tr>
                                <td>Contraseña:
                                <input class="form-control" type="password" name="password1" placeholder="Contraseña" required /></td>
                            </tr> 
                            <tr>    
                                <td>
                                    <button style="margin-top: 10px" class="btn btn-success" type="submit" name="btn-login"><strong>Ingresar</strong>
                                    </button>
                                </td>
                            </tr>

                        </table>    
                    </form>
                </div>
                <div id="body">
                <div class="col-sm-4 col-md-6 sidebar sidebar-right">                      
                    <div class="sidebar-content">
                        <div class="sidebar-widget">
                        <div class="white-space space-sm"></div>
                        <h1 class="uk-text-yellow"><span>Registrese y sientase seguro:</span></h1>
                            <form method="post" enctype="multipart/form-data">
                            <table align="left" class="table1">
                                <tr>
                                    <td class="row">NOMBRE:
                                    <input class="form-control" type="text" name="first_name" placeholder="Nombre" required /></td>
                                </tr>
                                <tr>
                                    <td>APELLIDOS:
                                    <input class="form-control" type="text" name="last_name" placeholder="Apellido" required /></td>
                                </tr>
                                <tr>
                                    <td>CORREO ELECTRONICO:
                                    <input class="form-control" type="text" name="email" placeholder="Email" required /></td>
                                </tr>
                                <tr>
                                    <td>CI:
                                    <input class="form-control" type="text" name="ci" placeholder="CI" required /></td>
                                </tr>
                                <tr>
                                    <td>Usuario:
                                    <input class="form-control" type="text" name="usuario" placeholder="Usuario" required /></td>
                                </tr>
                                <tr>
                                    <td>Contraseña:
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña" required /></td>
                                </tr>
                                <tr>
                                    <td> Foto de Perfil:
                                        <input type="file" name="archivo" >
                                        <!--<input class="uploadfile" type="button" value="Seleccionar imagen" onclick="document.getElementById('botonFileReal').click();" style=""> -->
                                </tr>   
                                <tr>    
                                    <td>
                                        <button style="margin: 10px 0px 10px 200px" class="btn btn-primary" type="submit" name="btn-save"><strong>Guardar</strong>
                                        </button>
                                    </td>
                                </tr>

                            </table>    
                        </form>
                        </div>
                    </div>                           
                </div>
                </div>
            </div>
	    </section>
      <section class="bottom" id="bottom">	
		  
	    <div class="container">
	      <div class="row bottom-row">                        
            <div class="col-md-3">
              <h3 class="header header-bottom">acerca de geoTaxi</h3>
	          <p>&nbsp;</p>
		    </div>
            <div class="col-md-3">
              <h3 class="header header-bottom">mas cosas</h3>
		      <p>
              <i class="uk-icon-check "></i></p> 
		    </div>	
            <div class="col-md-3">
              <h3 class="header header-bottom">contactos</h3>
		      <p>
                <i class="uk-icon-envelope "></i>&nbsp; geotaxi (@) geotaxi.com<br>
			    <i class="uk-icon-phone "></i>&nbsp; +591 --------<br>
			    <i class="uk-icon-print "></i>&nbsp; +591 ---------<br>
			    <i class="uk-icon-building "></i>&nbsp;Av. Civica </p>
		    </div>		  		  
		  </div>
	    </div> 
	  </section>
	  <!-- Footer -->
      <footer class="footer-wrapper" id="footer-wrapper">
	    <div class="container">
		  <div id="footer" class="row">
            <div class="col-md-4">
			  <span class="copyright">copyright &copy;  2019 Geo Loco</span>
			</div>
            <div class="col-md-4 uk-text-center">
              <div>
			    <a href="index.html#" class="btn btn-inverse social"><i class="uk-icon-facebook"></i></a>				
			    <a href="index.html#" class="btn btn-inverse social"><i class="uk-icon-twitter"></i></a>				
			    <a href="index.html#" class="btn btn-inverse social"><i class="uk-icon-pinterest"></i></a>				
			    <a href="index.html#" class="btn btn-inverse social"><i class="uk-icon-google-plus"></i></a>				
			    <a href="index.html#" class="btn btn-inverse social"><i class="uk-icon-youtube-play"></i></a>				
			  </div>
			  	<a class="totop" rel="nofollow" href="index.html#page-top" title="Goto Top" data-uk-smooth-scroll><i class="uk-icon-caret-up"></i></a>
			</div>
            <div class="col-md-4 uk-text-right">	
	          <a>acerca de</a> | <a>contactos</a>
			</div>  
	      </div>
        </div>
	  </footer>
	  <!-- Off Canvas Menu -->
      <div class="offcanvas-menu">
        <a class="close-offcanvas" href="index.html#"><i class="uk-icon-remove"></i></a>
        <div class="offcanvas-inner">
	      <ul class="nav menu">
            <li><a href="index.html">Inicio</a></li>
            <li class="active"><a href="registrar.php">Inice Sesion</a></li>
            <li><a href="login.html#">f.a.q.</a></li>
            <li><a href="index.html#">Blog</a></li>
	      </ul>
        </div>  
      </div>
	  <!-- /Off Canvas Menu -->
	  
    </div>



    <!-- Scripts placed at the end of the document so the pages load faster -->
    <!-- Jquery scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>	
	
    <!-- Uikit scripts -->
	<script src="assets/js/uikit.min.js"></script> 	
	
	<!-- OWL Carousel scripts -->
	<script src="assets/js/owl.carousel.min.js"></script>
	
    <!-- Template scripts -->
	<script src="assets/js/template.js"></script>  
	
	<!-- Bootstrap core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>


</html>