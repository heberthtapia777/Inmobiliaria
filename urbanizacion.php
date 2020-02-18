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
	<!-- //Custom-Theme-Files -->
	<!-- Web-Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" 	type="text/css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" 				type="text/css">
	<!-- //Web-Fonts -->
	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
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
                                    <!--<li><a href="#">Proyectos terminados</a></li>-->
								</ul>
								
							</div><!-- /navbar-collapse -->
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
<style>
.jumbo{padding:15px;margin-bottom:10px;color:inherit;background-color:#069}.jumbo h1,.jumbo .h1{color:inherit}.jumbo p{margin-bottom:15px;font-size:21px;font-weight:200; color:#FFF}.jumbo>hr{border-top-color:#d5d5d5}.container .jumbo{border-radius:6px}.jumbo .container{max-width:100%}
</style>    
	<div class="services wthree-3">
				<div class="container">
					<h2 class="tittle">Nuestros Productos</h2>
					<div class="services-grids">
						<?php 
						foreach($urbanizaciones as $Index => $Record){
							//$lotes = Lote::getObject("ID_URBANIZACION", $Record["ID_URBANIZACION"]);		
							//print_r($lotes);					
						?>
						<div class="col-md-12 services-grid">
                        	<h3 align="center"><b><?php echo $Record["NOMBRE"]?></b></h3><br>
							<div class="col-md-8 serv-img mask">
								<?php if(isset($Record["IMAGEN"])){
									$imagen = explode("@",$Record["IMAGEN"]);
									if(count($imagen)>0 && isset($imagen[0]) && $imagen[0]!=""){
										$ruta = "admin/".$imagen[0];
									?>
								<img src="<?php echo $ruta?>" alt="" class="img-responsive zoom-img">
								<?php } 
									}?>
							</div>
							<div class="col-md-4 serv-text">
								<div class="jumbo"><p><?php echo "UBICACION: ".$Record["UBICACION"] ?></p></div>
								<p><a href="detalle-urbanizacion?id=<?php echo $Record["ID_URBANIZACION"]?>" class="btn btn-success">Ver mas detalles:...</a></p>
							</div>
						  <div class="clearfix"> </div>
						</div><br><br>						
                        <hr>
                        <?php }?>
					   <div class="clearfix"> </div>
					</div>
				</div>
			</div>
<!--/ w3l-1 -->
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
