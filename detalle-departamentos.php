<?php 
	require_once "lib.php"; 
	require_once "srvInmoviliaria/app/model/Urbanizacion.php";
	require_once "srvInmoviliaria/app/model/Lote.php";
	require_once "srvInmoviliaria/app/model/Propiedad.php";
	require_once "srvInmoviliaria/app/model/Casa.php";
	require_once "srvInmoviliaria/app/model/Departamento.php";
		
	$departamento = new Departamento($_GET["id"]);	
	$georeferencia = explode("|",$departamento->GEOREFERENCIACION);
	$propiedad =  new Propiedad($departamento->ID_PROPIEDAD);

	$urbanizaciones = Urbanizacion::getAll();
	$casas = Casa::getAll();
	$departamentos = Departamento::getAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Proyecto87</title>
	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="casas, departamentos, urbanizaciones, lotes, alquiler, venta, anticretico, proyecto87, inmuebles, la paz, bolivia">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->
	<!-- Custom-Theme-Files -->
	<link rel="icon" type="images/ico" href="images/proyecto87.ico" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/lightbox.min.css">
	<!-- //Custom-Theme-Files -->
	<!-- Web-Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" 	type="text/css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" 				type="text/css">
	<!-- //Web-Fonts -->
	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
<script src="js/easy-responsive-tabs.js"></script>
<link rel="stylesheet" href="css/easy-responsive-tabs.css">
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	initMapView(<?php echo $georeferencia[0]?>,<?php echo $georeferencia[1]?>, <?php echo '"'.$casa->DETALLE.'"';?>);
	});
</script>
	<script>
		var mapaV = null; //VARIABLE GENERAL PARA EL MAPA
		
		function initMapView(x,y,titulo){
			var punto = new google.maps.LatLng(x,y);
			var config = {
				zoom:16,
				center:punto,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};		
			mapaV = new google.maps.Map( $("#mapaV")[0], config );
			var marker = new google.maps.Marker({
			    position: punto,
			    title:titulo
			});

			// To add the marker to the map, call setMap();
			marker.setMap(mapaV);
		}
	</script>
		<style> 
  	  #mapaV {
	    width: 1000px;
	    height: 600px;
	    border: 1px #ccc solid;
	}
	</style> 
</head>
<!-- //Head -->
<!-- Body -->
<body>
	<!-- Header -->
	<div class="header w3layouts-1">
		<!-- Top-Bar -->
			
				<div class="top-bar w3-1">
				<div class="container">
					<div class="header-nav w3-agileits-1">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Menu</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<!--<h1><a class="navbar-brand" href="index.html">Premier Realty</a></h1>-->
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav ">
									<li><a href="index">Inicio</a></li>
                                    <li class="dropdown">
                                        <a href="index" class="dropdown-toggle" data-toggle="dropdown">Asesoria <b class="caret"></b></a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="finanzas">Financiera</a></li>
                                            <li><a href="juridica">Juridica y tramites</a></li>
                                        </ul>
                                    </li>
									<!--<li><a href="#" >Unete a Proyecto87</a></li>-->
									<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nosotros<b class="caret"></b></a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li><a href="nuestra-historia">Historia</a></li>
                                            <li><a href="filosofia-corporativa">Filosofia corporativa</a></li>
                                            <li><a href="responsabilidad-social">Responsabilidad social</a></li>
                                            <li><a href="codigo-de-etica">Codigo de etica</a></li>
                                        </ul>
                                    </li>
									<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyectos en venta <b class="caret"></b></a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                        	<?php if(count($urbanizaciones)>0 && isset($urbanizaciones[0]["ID_URBANIZACION"]) && $urbanizaciones[0]["ID_URBANIZACION"] !="" ){?>
                                            <li><a href="urbanizacion">Urbanizaciones</a></li>
                                            <?php }?>
                                            <?php if(count($casas)>0 && isset($casas[0]["ID_CASA"]) && $casas[0]["ID_CASA"] !="" ){?>
                                            <li><a href="casas">Casas</a></li>
                                            <?php }?>
                                            <?php if(count($departamentos)>0 && isset($departamentos[0]["ID_DEPARTAMENTO"]) && $departamentos[0]["ID_DEPARTAMENTO"] !="" ){?>
                                            <li><a href="departamentos">Departamentos</a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                    <!--<li><a href="#">Invierte con Nosotros</a></li>-->
                                    <li><a href="contactos">Contactanos</a></li>
                                    <!--<li><a href="#">Proyectos terminados</a></li>-->
								</ul>
								
							</div><!-- /navbar-collapse -->
							<!-- search-scripts -->
							<script src="js/classie.js"></script>
							<script src="js/uisearch.js"></script>
								<script>
									new UISearch( document.getElementById( 'sb-search' ) );
								</script>
							<!-- //search-scripts -->
						</nav>
					</div>
				</div>
			</div>
		<!-- //Top-Bar -->
		<div class="banner">
			<div class="bann-info">
			</div>
		</div>
		<!-- //Slider -->
	</div>
	<!-- //Header -->
   
			<div class="services wthree-3">
				<div class="container">
					<div class="services-grids">
						<div class="col-md-12 services-grid">
                        	<h3 align="center"><b><?php echo $departamento->DETALLE?></b></h3><br>
							<div class="col-md-8 serv-img mask">
							<?php $imagenes = explode("@",$departamento->IMAGEN);?>
								<img src="<?php echo "admin/".$imagenes[0]?>" alt="" class="img-responsive zoom-img img-rounded">
							</div>
							<div class="col-md-4">
                            	<!-- content -->
                                <div class="main">
                                    <div class="main-w3l">
                                        <div class="w3layouts-main">
                                            <h2>Contactanos</h2>
                                                <form action="ContactoSave.php" method="post">
                                                    <input placeholder="Nombre completo" name="NOMBRE_COMPLETO" id="NOMBRE_COMPLETO" type="text" required>
                                                    <input placeholder="Correo electronico" name="EMAIL" type="email" required>
                                                    <input placeholder="Telefono" name="TELEFONO" id="TELEFONO" type="text" required>
                                                    <div align="left"><br>
                                                       <h2 align="left"> Selecciona tu interes por la propiedad</h2>
                                                       <div class="form-check">
                                                       	  <input type="hidden" id="ID_PROPIEDAD" name ="ID_PROPIEDAD" value="<?php echo $propiedad->ID_PROPIEDAD;?>" />
                                                          <input class="form-check-input" type="radio" name="INTERES" value="ME GUSTA" checked="">
                                                          <label class="form-check-label">Me gusta</label>
                                                       </div>
                                                       <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="INTERES" value="MUY INTERESADO" checked="">
                                                          <label class="form-check-label">Muy Interesado</label>
                                                       </div>
                                                       <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="INTERES" value="INTERESADO" checked="">
                                                          <label class="form-check-label">Interesado</label>
                                                       </div>
                                                       <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="INTERES" value="POCO INTERESADO" checked="">
                                                          <label class="form-check-label">Poco interesado</label>
                                                       </div>
                                                    </div><br>
                                                    <div class="comment-text-area">
                                                       <textarea class="form-control" rows="5" id="COMENTARIO" name="COMENTARIO"></textarea>
														<label>Comentario</label>
                                                    </div><br><br>
                                                    <input type="submit" value="Enviar" name="login">
                                                </form>
                                        </div>
                                        <!-- //main -->
                                    </div>
                                </div><!-- //Main Content -->
                                 <!-- content -->
                            </div>


						  <div class="clearfix"> </div>
						</div>
					</div>
                    <div class="clearfix"> </div>
                    <div class="desc">
                        <h3>Descripcion</h3>
						<p><?php	$datos = explode("|",$departamento->CAPACIDAD); 
								foreach($datos as $Index => $Record){
									$campos = explode("=",$Record);
									if($campos[0]=="OTROS")
										echo $campos[1];
								}	
							?>
						</p>	
					</div><br>

<style>

.google-maps {
    position: relative;
    padding-bottom: 75%; // This is the aspect ratio
    height: 0;
    overflow: hidden;
    }
.google-maps iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
}
</style>                    
                    <div class="demo">
                        <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Caracteristicas</li>
                            <li>Ubicacion</li>
                            <li>Planimetria</li>
                        </ul>
                        <div class="resp-tabs-container">
                        <div>
                            <ol style="color:#fff;">
                            	<?php	
                            	$datos = explode("|",$departamento->CAPACIDAD); 
								foreach($datos as $Index => $Record){
									$campos = explode("=",$Record);
								?>
									<li><?php echo $campos[0].": ".$campos[1]?></li>
								<?php
								}	
							?>  
                            </ol>
                        </div>
                        <div>
                       <div id="mapaV" ></div>
                        </div>
                        <div>
                        	<img src="<?php echo "admin/".$imagenes[1]?>" class="img-responsive img-rounded">
                        </div>
                        </div>
                        </div>
                        <br />
                        <div id="tabInfo">
                        Usted seleccionó: <b><span class="tabName"></span></b>
                        </div>
                        <br />
                        <br />
                        <div style="height: 30px; clear: both"></div>
                        </div>
       
				</div>
			</div>

<!--/ w3l-1 -->
<header>
<h1>Galeria de Fotos</h1>
</header>                    
                    <div class="container galeria">
                        <articles class="row">
                        	<?php 
                        		$_imagenes = explode("@",$departamento->IMAGEN);
                        		foreach ($_imagenes as $Index => $Record){
                        	?>
                            <article class="col-md-3">
                                <a href="<?php echo "admin/".$_imagenes[$Index]?>" data-lightbox="example-set" data-title="">
                                <img src="<?php echo "admin/".$_imagenes[$Index]?>" alt="Regala" class="img-thumbnail zoom-img img-rounded"></a>
                            </article>
                             <?php if(($Index+1) % 4 == 0){?>
                			<div class="clearfix"> </div><br>
                			<?php }?>                            
                            <?php }?>
                            
                    </articles>
	</div><br>
<!-- /gallery section of photos-->
                    
<!-- /gallery video section -->
<div class="services wthree-3">
<header>
<h1>Galeria de Videos</h1>
</header>
<div class="container">
    <!-- Grid row -->
    <div class="row">
    	<?php 
			$_videos = explode("|",$departamento->ENLACE);
            foreach ($_videos as $Index => $Record){
        ?>
        <div class="col-md-4">
            <div class="embed-responsive embed-responsive-16by9" align="center">
            <?php echo $_videos[$Index]?>
            <iframe class="embed-responsive-item" width="560" height="315" src="<?php echo $_videos[$Index]?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        	</div>
        </div>
        <?php }?>
    </div>
    <!-- Grid row -->                    
</div>    
</div>
<!-- /end gallery section of videos-->




	<div class="wthree-1 footer-bottom agileits-w3layouts-1">
		<div class="container">
			<h3>Registrate con nosotros</h3>
			<p class="ttt">Registrate con nosotros y te mantendremos informado de nuestras ofertas.</p>
			<div class="alert alert-success" id="alert" style="display: none; font-size: 15px;
		font-style: bold;">&nbsp;</div>
			<form action="#" method="post" id="contact-form">
				<input type="text" id="name" name="name" placeholder="Nombre completo">
                <input type="text" id="phone" name="phone" placeholder="Telefono">
				<input type="email" id="email" name="email" placeholder="Correo electronico" required>
				<input class="btn submit" type="submit" value="Registrarse">
			</form>
		</div>
	</div>
<!-- footer -->
<div class="footer w3-agile-1">
	<div class="container">
		<ul class="fb_icons2 agile-1">
			<li><a class="fb" href="https://www.facebook.com/Proyecto87Inmobiliaria/" target="blank"></a></li>
			<li><a class="twit" href="#"></a></li>
			<li><a class="goog" href="#"></a></li>
            <li><a class="pin" href="https://api.whatsapp.com/send?phone=59178789470"></a></li>
			<li><a class="drib" href="https://www.youtube.com/channel/UCtyxerGOULPkCmOlkGx4UsQ" target="blank"></a></li>
		</ul>
	</div>
	<p class="copyright">© 2019 Proyecto 87. All Rights Reserved | Design by <a href="http://www.technosoft-bolivia.net/" target="_blank"> TechnoSoft</a></p>
</div>
<!-- footer -->
<script src="js/lightbox.min.js"></script>
  <script>
	  lightbox.option({
		'albumLabel': "Imagen %1 de %2"
	  })
  </script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#contact-form").validate({
        event: "blur",rules: {'name': "required",'email': "required",'phone': "required"},
        messages: {'name': "Por favor indica tu nombre",'email': "Por favor, indica una direcci&oacute;n de e-mail v&aacute;lida",'phone': "Por favor ingresa tu numero de telefono"},
        debug: true,errorElement: "label",
        submitHandler: function(form){
            $("#alert").show();
            $("#alert").html("<img src='images/ajax-loader.gif' style='vertical-align:middle; width:20px; height:20px; margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 5000);
            $.ajax({
                type: "POST",
                url:"send.php",
                data: "name="+escape($('#name').val())+"&email="+escape($('#email').val())+"&phone="+escape($('#phone').val()),
                success: function(msg){
                    $("#alert").html(msg);
                    document.getElementById("name").value="";
                    document.getElementById("email").value="";
                    document.getElementById("phone").value="";
                    setTimeout(function() {
                        $('#alert').fadeOut('slow');
                    }, 7000);
 
                }
            });
        }
    });
});
</script>  
</body>
<!-- //Body -->
</html>
