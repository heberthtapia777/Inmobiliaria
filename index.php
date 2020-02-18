<?php 
	require_once "lib.php"; 
	require_once "srvInmoviliaria/app/model/Urbanizacion.php";
	require_once "srvInmoviliaria/app/model/Lote.php";
	require_once "srvInmoviliaria/app/model/Casa.php";
	require_once "srvInmoviliaria/app/model/Departamento.php";
	$urbanizaciones = Urbanizacion::getAll();
	$casas = Casa::getAll();
	$departamentos = Departamento::getAll();
?>
<!DOCTYPE html>
<html>
<!-- Head -->
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
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom-Theme-Files -->
	<!-- Web-Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" 	type="text/css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" 				type="text/css">
	<!-- //Web-Fonts -->
	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	  <!--script para envio-->
	<script type="text/javascript" src="js/enviar.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>
		<script>
				$(function () {
					$("#slider").responsiveSlides({
						auto: true,
						pager: true,
						nav: true,
						speed: 1000,
						namespace: "callbacks",
						before: function () {
							$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
					});
				});
			</script>
	<style>
		header{text-align:center;}
		article img{max-height:180px;}
		article p,footer p{text-align:center;}
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
								
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav ">
									<li><a class=" active" href="#">Inicio</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Asesoria <b class="caret"></b></a>
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyectos en venta<b class="caret"></b></a>
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
                                    <!--<li><a href="#">Noticias</a></li>
                                    <li><a href="#">Proyectos terminados</a></li>-->
								</ul>
								
							</div><!-- /navbar-collapse -->
							<!-- search-scripts 
							<script src="js/classie.js"></script>
							<script src="js/uisearch.js"></script>
								<script>
									new UISearch( document.getElementById( 'sb-search' ) );
								</script>
							 //search-scripts -->
						</nav>
					</div>
				</div>
			</div>
		<!-- //Top-Bar -->
		<!-- Slider -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="slider-img">
							<img src="images/casasproyecto87.jpg" class="img-responsive" alt="">
						</div>
						
					</li>
					<li>
						<div class="slider-img">
							<img src="images/departamentosproyecto87.jpg" class="img-responsive" alt="">
						</div>
						
					</li>
					<li>
						<div class="slider-img">
							<img src="images/urbanizacionproyecto87.jpg" class="img-responsive" alt="">
						</div>
						
					</li>
				</ul>

			</div>
			<div class="clearfix"></div>
		</div>
		<!-- //Slider -->
	</div>
	<!-- //Header -->
 
<!-- video -->
<div class="wthree-11">
  <div class="row">
  	<div class="col-sm-3"></div>
    <div class="col-sm-6" align="center">
      <h3>Inmobiliaria Proyecto 87</h3><br>
        <div class="embed-responsive embed-responsive-16by9" align="center">
			<iframe width="560" height="315" src="https://www.youtube.com/watch?v=qyJgW-9EByg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>
	
<!-- //video -->
<!-- agileinfo -->
<div class="agileinfo">
	<div class="container">
	<h3>¿En qué nos diferenciamos?</h3>
	<p class="ttt">Innovación y personalización  en la promoción de los proyectos.
		Invertimos en la promoción de sus proyectos, buscamos los medios para promover proyectos en un tiempo récord.
	</p>
			<div class="flexslider-info">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="banner-info">
										<div class="col-md-7 agileinfo-left">
											<img src="images/urbanizacionproyecto87.jpg" alt="" class="img-responsive">
										</div>
										<div class="col-md-5 agileinfo-grid grid-one">
											<h4>Urbanizaciones</h4>
											<p>Encuentra las mejores Urbanizaciones en La Paz, Bolivia. Descubre la mejor forma de conocer sus productos y/o servicios, todos los datos de contacto.<br>
                                            La urbanizaciónes están hechas, las calles están abiertas y los postes de luz electrificados,que ya cuentan con tendido eléctrico</p><br><br>
										</div>
										<div class="clearfix"></div>
									</div>
								</li>
								<li>
									<div class="banner-info">
										<div class="col-md-7 agileinfo-left">
											<img src="images/casasproyecto87.jpg" alt="" class="img-responsive">
										</div>
										<div class="col-md-5 agileinfo-grid grid-one">
											<h4>Casas</h4>
											<p>Encontrá las mejores casas a la venta en La Paz. Más de 622 casas para elegir, viviendas unifamiliares con excelente Arquitectura.<br><br>
                                            Casa Propia. Ventajas y Beneficios ... Crédito para que compres tu casa, departamento, terreno o puedas remodelar tu hogar. Tu eliges</p><br><br>
										</div>
										<div class="clearfix"></div>
									</div>
								</li>
								<li>
									<div class="banner-info">
										<div class="col-md-7 agileinfo-left">
											<img src="images/departamentosproyecto87.jpg" alt="" class="img-responsive">
										</div>
										<div class="col-md-5 agileinfo-grid grid-one">
											<h4>Departamentos</h4>
											<p>Los mejores Departamentos en Venta en La Paz Bolivia. Encuentra más de 1166 Departamentos en oferta con precios desde $us. 50000.<br>
                                            En la categoría departamentos en venta La Paz encontrarás más de 100 Departamentos en venta, por ejemplo: 1 recámara, 2 recámaras o amueblado.</p><br><br>
										</div>
										<div class="clearfix"></div>
									</div>
								</li>
							</ul>
						</div>
					</section>
				</div>
		</div>
	</div>
<!-- agileinfo -->
	
<!-- wthree-1 -->	
<div class="wthree-11">
	<h2 align="center">Testimonios</h2>
	<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<div class="tab">
						<ul>
							<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><img src="images/t.jpg"></li>
							<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><img src="images/t1.jpg"></li>
							<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><img src="images/t2.jpg"></li>	  
						</ul>
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<p>Standard dummy text ever since the Lorem Ipsum has been the industry's   to make a type specimen book.standard dummy 1500s, when an unknown printer took a galley of type and scrambled it text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<h4>- Lorem Ipsum</h4>
					</div>
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>			
						<h4>- Standard dummy</h4>
					</div> 
					<div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
						<p>Industry's standard dummy text ever since the 1500s, when an unknown printer Lorem  scrambled it to make a type specimen book.standard dummy text ever since the 1500s, when an unknown printer Ipsum has been the took a galley of type and  took a galley of type and scrambled it to make a type specimen book.</p>			
						<h4>- Unknown printer</h4>
					</div> 			
				</div>	
			</div>
	</div>	
</div>
<!-- wthree-1 -->	
<!--/ w3l-1 -->
	<div class="wthree-1 footer-bottom agileits-w3layouts-1">
		<div class="container">
			<h3>Registrate con nosotros</h3>
			<p class="ttt">Registrate con nosotros y te mantendremos informado de nuestras ofertas.</p>
			<div class="alert alert-success" id="alert" style="display: none; font-size: 15px; font-style: bold;">&nbsp;</div>
			<form method="post" id="contact-form">
				<input type="text" id="name" name="name" placeholder="Nombre completo" >
        		<input type="text" id="phone" name="phone" placeholder="Numero de telefono" >
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
	<p class="copyright">© 2019 Proyecto 87. All Rights Reserved | Design by <a href="http://www.technosoft-bolivia.com/" target="_blank"> TechnoSoft</a></p>
</div>
<!-- footer -->
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
            $("#alert").html("<img src='images/ajax-loader.gif' style='vertical-align:middle; width:20px; height:20px; margin:0 10px 0 0' /><strong>Registrando datos...</strong>");
            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 7000);
            $.ajax({
                type: "POST",
                url:"send.php",
                data: "name="+escape($('#name').val())+"&email="+escape($('#email').val())+"&phone="+escape($('#phone').val()),
                success: function(msg){
                    $("#alert").html(msg);
                    document.getElementById("name").value="";
                    document.getElementById("phone").value="";
                    document.getElementById("email").value="";
                    setTimeout(function() {
                        $('#alert').fadeOut('slow');
                    }, 7000);
 
                }
            });
        }
    });
});
</script>
	<!--FlexSlider-->
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script defer src="js/jquery.flexslider.js"></script>
		<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
<!--End-slider-script-->
  <script src="js/lightbox.min.js"></script>
  <script>
	  lightbox.option({
		'albumLabel': "Imagen %1 de %2"
	  })
  </script>

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				   </script>
<style>
#menu ul {
    list-style-type: none;
    margin: 0px;
    padding: 0px;
    width: 200px;
    font-family: Arial, sans-serif;
    font-size: 11pt;
}
#menu ul li {
    background-color: #666;
}
#menu ul li a {
    color: #ccc;
    text-decoration: none;
    text-transform: uppercase;
    display: block;
    padding: 10px 10px 10px 20px;
}
#menu ul li a:hover {
    background: #000;
    border-left: 10px solid #333;
    color: #fff;
}
#menu li {
     display:inline;
     padding-left:3px;
     padding-right:3px;
}
</style>	
</body>
<!-- //Body -->
</html>