<?php
include_once 'dbMySql.php';
$con = new DB_con();
// data insert code starts here.
if(isset($_POST['btn-save']))
{


	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
    $email= $_POST['email'];
    $lugar = $_POST['lugar'];
    $coordenada_x= $_POST['coordenada_x'];
    $coordenada_y= $_POST['coordenada_y'];
    $imagen = $nombre;

	
	$res=$con->insert($fname,$lname,$email,$lugar,$coordenada_x,$coordenada_y,$imagen);
	if($res)
	{
		?>
		<script>
		alert('Usuario registrado con exito...');
        window.location='usuarios.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error en el registro de usuario...');
        window.location='usuarios.php'
        </script>
		<?php
	}
}
// data insert code ends here.
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Meta -->
    <meta name="description" content="Geo Taxi.">
	<meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, uikit, multicolor, parallax, retina, taxi business" />
    <meta name="author" content="dhsign">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="3 days" />	
    <title>Geo-Taxi</title>
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
<body>
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
                    <a href="index.html"><img src="images/logo1.png" alt="Logo"></a>
                  </div>
				</div>
		        <h2 class="navbar-text navbar-right"><i class="glyphicon glyphicon-earphone glyphicon-align-left" aria-hidden="true"></i> 60166579</h2>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-nav-center">
                    <li><a href="index.html">Inicio</a></li>
                    <li class="active"><a href="about.html">Solicite Servicio</a></li>
                    
                    <li><a href="blog.html#">F.A.Q.</a></li>
                    
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
<div id="body" >
  <div id="content" class="content" margin: align="center">
    <form method="post" enctype="multipart/form-data"  >
    <table align="center" class="table1">
  
    <tr>
    <th class="title">DATOS</th> 
    <th class="title"> MAPA</th>
    </tr>

    <tr >
    <td class="row">Numero de Emergencia:<input class="form-control" type="text" name="first_name" placeholder="Numero" required /></td>
     <TD ROWSPAN=8 class="map"> 
<?php 
      $lat = "-16.535276";
      $lng = "-68.0891575";
      $pos = "-16.535276,-68.0891575";
      $valor = explode(',',$pos); 
      echo "
      <div id='info'>".$pos."</div>
      <div id='googleMap'></div>
      
      <div id='respuesta'></div>";
      ?>

      </TD>
       

</tr>
     <tr>
    <td>Destino:<input class="form-control" type="text" name="lugar" placeholder="Lugar" required /></td>
    </tr>
   
     <tr>
    <td>COORDENADA X:<input class="form-control" id="coordenada_x" type="text" name="coordenada_x" placeholder="Coordenada x"value=" <?php echo "$valor[0]"; ?>" required /></td>
    </tr>
     <tr>
    <td>COORDENADA Y:<input class="form-control" id="coordenada_y" type="text" name="coordenada_y" placeholder="Coordenada y" value=" <?php echo "$valor[1]"; ?>" required /></td>
    </tr>
    <tr>
    <tr>
    <td>
    <button type="submit" name="btn-save"><strong>Enviar</strong></button>
    </td>
   
    </tr>
    </table>
    </form>
    </div>

</div>
</div>
</div>
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      lat = "<?php echo $lat; ?>" ;
      lng = "<?php echo $lng; ?>" ;
      var map;
      function initialize() {
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
          zoom: 7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          draggable:true,
          animation: google.maps.Animation.DROP,
          web:"Localización geográfica!",
          icon: "marker.png"
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          document.getElementById('info').innerHTML = [
          lat,
          lng
          ].join(', ');
          var x=document.getElementById("coordenada_x").value=[lat].join(', ');
           var y=document.getElementById("coordenada_y").value=[lng].join(', ');
        });
        marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      $("#enviar").click(function() { 
        var url = "cargar.php";
        $("#respuesta").html('<img src="cargando.gif" />');
        $.ajax({
         type: "POST",
         url: url,
         data: 'lat=' + lat + '&lng=' + lng,
         success: function(data)
         {
           $("#respuesta").html(data);
         }
       });
      }); 
    });
</script>

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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>	
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
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