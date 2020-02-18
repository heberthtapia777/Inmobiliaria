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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyectos en venta <b class="caret"></b></a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <?php if(count($urbanizaciones)>0 && isset($urbanizaciones[0]["ID_URBANIZACION"]) && $urbanizaciones[0]["ID_URBANIZACION"] !="" ){?>
                                            <li><a href="urbanizacion.php">Urbanizaciones</a></li>
                                            <?php }?>
                                            <?php if(count($casas)>0 && isset($casas[0]["ID_CASA"]) && $casas[0]["ID_CASA"] !="" ){?>
                                            <li><a href="casas.php">Casas</a></li>
                                            <?php }?>
                                            <?php if(count($departamentos)>0 && isset($departamentos[0]["ID_DEPARTAMENTO"]) && $departamentos[0]["ID_DEPARTAMENTO"] !="" ){?>
                                            <li><a href="departamentos.php">Departamentos</a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                    <!--<li><a href="#">Invierte con Nosotros</a></li>-->
                                    <li><a class=" active" href="contactos">Contactanos</a></li>
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
<!-- //formulario de contacto -->
<section class="register">
	<div class="register-full">
		<div class="register-left">
			<div class="register">
				<h1>Nuestra direccion</h1>
				<p>Cualquier consulta te lo podemos resolver personalmente, visitanos y te ayudaremos sin compromiso, esta es nuestra direccion exacta.</p>
				<ul class="contact-list">
                    <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;&nbsp; Torre Ketal Piso 3  Of. 309 Calacoto C/15<br></li>
                    <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp; <a href="mailto:info@proyecto87.com.bo">info@proyecto87.com.bo</a></li>
                    <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp; +591 76707128</li>
                    <li><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp;&nbsp; www.proyecto87.com.bo</li>
				</ul>
			</div>
		</div>
		<div class="register-right">
			<div class="register-in">
				<h2><span class="fa fa-pencil"></span>Ingresa tus datos</h2>
				<div class="register-form">
					<form action="correo/enviar.php" method="post">
						<div class="fields-grid">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nombre" id="nombre" required> 
								<label>Nombre completo</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email" id="email" required>
								<label>Correo</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="tel" name="telefono" id="telefono" required>
								<label>Numero de telefono</label>
								<span></span>
							</div>
							<div class="styled-input"><br>
								<textarea class="form-control" rows="5" id="mensaje" name="mensaje"></textarea>
								<label>Comentario</label>
								
							</div>
							
							<div class="clear"> </div>
							 
						</div>
						<input type="submit" value="Enviar">
					</form>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
	<div class="clear"> </div>
	</div>
	
</section>

<!-- //section -->
<!-- //fin del formulario de contacto -->
<div class="w3l-map">
	<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Mm6tp4jOzPyqb8T4M9xciKmzUv5iHPzz" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!--/ w3l-1 -->
	
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
<style type="text/css">
.contact-list li{
	color:#fff;
	}
ol,ul {
	list-style:none;
	margin:0px;
	padding:0px;
}

/* start editing from here */
a {
	text-decoration:none;
}
.txt-rt {
	text-align:right;
}/* text align right */
.txt-lt {
	text-align:left;
}/* text align left */
.txt-center {
	text-align:center;
/*-- W3Layouts --*/	
}/* text align center */
.float-rt {
	float:right;
}/* float right */
.float-lt {
	float:left;
}/* float left */
.clear {
	clear:both;
}/* clear float */
.pos-relative {
	position:relative;
}/* Position Relative */
.pos-absolute {
	position:absolute;
}/* Position Absolute */
.vertical-base {	
	vertical-align:baseline;
}/* vertical align baseline */
.vertical-top {	
	vertical-align:top;
}/* vertical align top */
nav.vertical ul li {	
	display:block;
}/* vertical menu */
nav.horizontal ul li {	
	display: inline-block;
}/* horizontal menu */
img {
	max-width:100%;
}
/*--- end reset code ---*/

a {
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
	text-decoration: none;
}

input[type="button"], input[type="submit"] {
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
}
label {
	margin: 0;
    letter-spacing: 1px;
    color: #fff;
}
a:focus, a:hover {
	text-decoration: none;
	outline: none;
}
.register{
    padding: 3em 0;
    background: url(images/bg.jpg); 
	background-attachment:fixed;
	background-size:cover;
	border: 2px;
	border-color: #000;
}
p{
	font-family: 'Open Sans', sans-serif;
}
.register-full {
    width: 80%;
    margin: 2em auto 0;
}
.register-left {
}
.register-right {
    background: #FFFFFF;
    background: rgba(0, 0, 0, 0.6);
    -webkit-box-shadow: 0px 0px 2px 1px rgba(253, 249, 249, 0.75);
    -moz-box-shadow: 0px 0px 2px 1px rgba(253, 249, 249, 0.75);
    box-shadow: 0px 0px 2px 1px rgba(253, 249, 249, 0.75);
}
.register-in {
    padding: 3em;
}
.register-left{
    width: 60%;
    float: left;
}
.register-right {
    width: 40%;
    float: left;
}
.register-left p {
    margin: 2em 0;
    line-height: 28px;
    font-size: 15px;
    font-weight: 100;
	padding:0 4em;
    letter-spacing: 1px;
    color: #FFFFFF;
    text-align: center;
}
.register-left h1 {
    font-size: 3em;
    text-transform: uppercase;
    margin-top: .5em;
    margin-bottom: .5em;
    color: #FFFFFF;
    text-align: center;
}
.register-right h2 {
    text-transform: uppercase;
    font-size: 2em;
    font-weight: 300;
    letter-spacing: 1px;
    word-spacing: 5px;
    color: #fff;
}
.link a {
    color: #FFFFFF;
    padding: .5em;
    font-size: 1.5em;
    border:2px solid #0a7369;
}
.checkbox a {
    color: #999;
}
.checkbox a:hover {
    color: #fff;
}
.link a:hover{
	color:#000;
    border:2px solid #FFFFFF;
	background:none;
}
.register-form{
	margin:2em 0 0 0;
}
.register-form h4,.address h4{
    margin-bottom: 2em;
    color: #404040;
    margin: 0 0 2em 0;
    font-weight: 600;
}
 .register input[type="text"],.register input[type="email"],.register input[type="password"],.register input[type="tel"]{
    font-size: 1em;
    color: #fff;
    padding: 0.5em 1em;
    border: 0;
    width: 90%;
    border-bottom: 1px solid #fff;
    background: none;
    -webkit-appearance: none;
	outline: none;
}


input[type="checkbox"] {
    cursor: pointer;
    margin-right: 10px;
}
.register textarea { 
	min-height: 150px;
    resize: none;
}
/*-- input-effect --*/
.styled-input.agile-styled-input-top {
    margin-top: 0;
} 
.styled-input input:focus ~ label, .styled-input input:valid ~ label,.styled-input textarea:focus ~ label ,.styled-input textarea:valid ~ label{
    font-size: .9em;
    color: #999;
    top: -1.3em;
    -webkit-transition: all 0.125s;
	-moz-transition: all 0.125s; 
	-o-transition: all 0.125s;
	-ms-transition: all 0.125s;
    transition: all 0.125s;
}
.styled-input {
	width: 100%;
    position: relative;
    margin: 0 0 2em;
}
.styled-input:nth-child(1),.styled-input:nth-child(3){
	margin-left:0;
}
.textarea-grid{
	float:none !important;
	width:100% !important;
	margin-left:0 !important;
}
.styled-input label {
	color: #fff;
    padding: 0.5em .9em;
    letter-spacing: 1px;
	font-weight:100;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    pointer-events: none;
    font-size: .9em;
    display: block;
    line-height: 1em;
}
.styled-input input ~ span,.styled-input textarea ~ span {
	display: block;
    width: 0;
    height: 2px;
    background: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    -webkit-transition: all 0.125s;
    -moz-transition: all 0.125s;
    transition: all 0.125s;
}
option {
    background: #222;
}
select:focus {
    outline: none;
}
.styled-input textarea ~ span { 
    bottom: 5px; 
}
.styled-input input:focus.styled-input textarea:focus { 
	outline: 0; 
} 
.styled-input input:focus ~ span,.styled-input textarea:focus ~ span {
	width: 100%;
	-webkit-transition: all 0.075s;
	-moz-transition: all 0.075s;  
	transition: all 0.075s; 
} 
/*-- //input-effect --*/
.register-form input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    width: 100%;
    padding: .4em 1em;
    font-size: 1.1em;
	letter-spacing: 1px;
    margin: 1.5em 0 0 0;
    -webkit-appearance: none;
    background: #003F7D;
    border: 1px solid #0080FF;
    cursor: pointer;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    transition: 0.5s all;
	font-family: 'Poppins', sans-serif;
}
.logo{
	text-align: center;
	margin-top: 5em;
}
.logo span.fa {
    color: #fff;
    font-size: 6em;
}
.register-form input[type="submit"]:hover {
    background: #0080FF;
	border: 1px solid #003F7D;
}
input[type="text"] {
    width: 100%;
}
.content3 {
    text-align: center;
    margin: 7% auto 2%;
}
.content3 a {
    background: #2dde98;
    font-size: 15px;
    outline-offset: 4px;
    outline: 2px solid #fff;
	color: #ffffff;
    padding: 12px 30px;
	letter-spacing: 1px;
    display: initial;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -ms-transition: 0.5s all;
}
.content3 a:hover {
    background: #ff4f81;
    outline: 2px solid transparent;
}
.content3 a.read {
    background: #ff4f81;
    font-size: 16px;
    outline-offset: 4px;
    outline: 2px solid #fff;
    padding: 12px 30px;
    display: initial;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.content3 a.read:hover {
    background: #2dde98;
    outline: 2px solid transparent;
}
.content3 ul li {
    display: inline-block;
    margin: 0 .5em;
}
/*-- //contact --*/


/* responsive design */
@media (max-width: 1440px) {
	.register-left h1 {
		font-size: 2.9em;
	}
}
@media (max-width: 1366px) {
	.register-left h1 {
		font-size: 2.7em;
	}
	.register-right {
		width: 42%;
		float: left;
	}
	.register-left {
		width: 58%;
		float: left;
	}
}
@media (max-width: 1280px) {
	.register-right {
		width: 44%;
		float: left;
	}
	.register-left {
		width: 56%;
		float: left;
	}
}
@media (max-width: 1080px) {
	.register-full {
		width: 90%;
	}
	.register-left p {
		line-height: 1.6em;
	}
	.link a {
		padding: .4em;
		font-size: 1.4em;
	}
	.register-in {
		padding: 2em;
	}
}
@media (max-width: 1024px) {
	.register-left h1 {
		font-size: 2.3em;
	}
	.register-right h2 {
		font-size: 1.8em;
	}
	label {
		letter-spacing: 0px;
	}
	.register-left p {
		padding: 0 2em;
	}
	.content3 a.read ,.content3 a{
		font-size: 15px;
		padding: 8px 30px;
	}
	.logo span.fa {
		font-size: 5em;
	}
	.styled-input {
		margin: 0 0 1.7em;
	}
}
@media (max-width: 991px) {
	.register-right h2 {
		font-size: 1.6em;
	}
}

@media (max-width: 900px) {
	.register-full {
		width: 95%;
	}
	.register-left h1 {
		font-size: 2.1em;
	}
	.logo span.fa {
		font-size: 4em;
	}
	.register-left p {
		padding: 0 1em;
	}
	.agile-copyright {
		font-size: 14px;
		margin: 3em 0 0;
	}
}

@media (max-width: 800px) {
	.register-in {
		padding: 2em;
	}
	.register-left h1 {
		font-size: 2.1em;
	}
}
@media (max-width: 768px) {
	.register-left h1 {
		font-size: 2em;
	}
	.register-left p {
		padding: 0 4em;
	}
	.link a {
		padding: .4em;
		font-size: 1.2em;
	}
	.register-form input[type="submit"] {
		font-size: 1.2em;
	}
	.register-left {
		width: 100%;
		float: none;
	}
	.register-right {
		width: 70%;
		float: none;
		margin: 4em auto 0;
	}
	.logo {
		text-align: center;
		margin-top: 2em;
	}
}

@media (max-width: 736px) {
	.styled-input {
		margin: 0 0 1.2em;
	}
	.register-left h1 {
		font-size: 2em;
	}
	.register-right h2 {
		font-size: 1.5em;
	}
}
@media (max-width: 667px) {
	.register-in {
		padding: 2em;
	}
	.register-full {
		margin: 0em auto 0;
	}
	.logo {
		text-align: center;
		margin-top: 1em;
	}
}
@media (max-width: 640px) {
	.agile-copyright {
		letter-spacing: 1px;
	}
}
@media (max-width: 600px) {
	.register-left p {
		padding: 0 1em;
	}
}
@media (max-width: 568px) {
	.register-in {
		padding: 1.5em;
	}
	.register-left h1 {
		font-size: 1.7em;
	}
	.agile-copyright {
		margin: 3em 1em 0;
		line-height: 26px;
	}
	.register-form input[type="submit"] {
		font-size: 1.1em;
	}
}
@media (max-width: 480px) {
	.register-left, .register-right {
		width: 100%;
		height: inherit;
	}
	.register-full {
		width: 90%;
	}
}
@media (max-width: 414px) {
	.register-left{
		width: 100%;
		height: inherit;
	}
	.register-right{
		width:100%;
	}
	input[type="checkbox"] {
		margin-right: 5px;
	}
	.logo span.fa {
		font-size: 3.5em;
	}
	.register input[type="text"], .register input[type="email"], .register input[type="password"], .register input[type="tel"] {
		width: 87%;
	}
	.logo {
		margin-top: 0em;
	}
}
@media (max-width: 384px) {
	.register-left h1 {
		font-size: 1.6em;
	}
	.register-left p {
		padding: 0 0em;
		font-size: 14px;
	}
	.content3 a.read, .content3 a {
		font-size: 14px;
		padding: 8px 20px;
	}
	.register input[type="text"], .register input[type="email"], .register input[type="password"], .register input[type="tel"] {
		width: 85%;
	}
}
@media (max-width: 375px) {
	.logo span.fa {
		font-size: 3em;
	}
}
@media (max-width: 320px) {
	body {
		padding: 2em 0;
	}
	.register-left p {
		font-size: 14px;
		letter-spacing: .4px;
	}
	.styled-input label, select {
		font-size: .875em;
	}
	.register input[type="text"], .register input[type="email"], .register input[type="password"], .register input[type="tel"] {
		width: 83%;
	}
	.register-left h1 {
		font-size: 1.35em;
	}
	.content3 a.read, .content3 a {
		padding: 7px 15px;
	}
	.register-right h2 {
		font-size: 1.3em;
	}
	.agile-copyright {
		margin: 3em 0.2em 0;
	}
	.link a{
		border: 1px solid #0a7369;
	}
	.link a:hover {
		border: 1px solid #FFFFFF;
	}
	.register-left p {
		margin: 1em 0 2em;
	}
	.register-form input[type="submit"] {
		font-size: 1em;
	}
	.register-right {
		margin: 3em auto 0;
	}
}	

/* //responsive design */

</style>
</body>
<!-- //Body -->
</html>