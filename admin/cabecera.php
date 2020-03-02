<?php
    require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Usuario.php";
    require_once "../srvInmoviliaria/app/model/UsuarioRol.php";
    require_once "../srvInmoviliaria/app/model/Persona.php";
    require_once "config/session.php";
    validarSession();
    $rolArray = explode("-",$_SESSION["ROLES"]);
?>
<!DOCTYPE html>
<html xmlns="#">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Proyecto87</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">

    <!-- *********************** -->

    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- validador -->
    <script src="assets/js/jquery.validate.js"></script>


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="central"><i class="large material-icons"></i> <strong>Administrador</strong></a>
        		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>
            <ul class="nav navbar-top-links navbar-right">
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $_SESSION["USUARIO"]?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi Perfil</a></li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
            <li><a href="config/finalizarSession"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
        </ul>
	   	<!--/. NAV TOP  -->

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php if(in_array("ADMINISTRADOR", $rolArray)){ ?>
                    <li>
                        <a class="active-menu waves-effect waves-dark" href="UsuariosList"><i class="fa fa-user"></i> Usuarios</a>
                    </li>
                    <?php } ?>
                    <?php if(!in_array("ADMINISTRADOR", $rolArray)){ ?>
                        <?php if(in_array("GERENTE", $rolArray)){ ?>
                    <li>
                        <a href="asignar-propiedad" class="active-menu waves-effect waves-dark"><i class="fa fa-home"></i>Asignar propiedad</a>
                    </li>
		    <li>
                        <a href="CasasList" class="active-menu waves-effect waves-dark"><i class="fa fa-home"></i> Registrar Casas</a>
                    </li>
					<li>
                        <a href="DepartamentosList" class="active-menu waves-effect waves-dark"><i class="fa fa-building-o"></i> Registrar Departamentos</a>
                    </li>

                    <li>
                        <a href="#" class="active-menu waves-effect waves-dark"><i class="fa fa-sitemap"></i> Registrar Urbanizacion<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="UrbanizacionesList">Urbanizacion</a>
                            </li>
                        </ul>
                    </li>
		            <li>
                        <a href="#" class="active-menu waves-effect waves-dark"><i class="fa fa-sitemap"></i> Reportes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" class="active-menu waves-effect waves-dark">Reporte de Productos<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
		                            <li>
		                                <a href="ProductosEstadoReport.php" class="active-menu waves-effect">Por estado</a>
		                            </li>
		                            <li>
		                                <a href="ProductosVisitadosReport.php" class="active-menu waves-effect">Mas visitados</a>
		                            </li>
		                        </ul>
                            </li>
                            <li>
                                <a href="#" class="active-menu waves-effect waves-dark">Reporte de Agentes<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
		                            <li>
		                                <a href="AgentesContactosReport.php" class="active-menu waves-effect">Mas contactos</a>
		                            </li>
		                            <li>
		                                <a href="AgentesVisitadosReport.php" class="active-menu waves-effect">Mas visitados</a>
		                            </li>
                                    <li>
                                        <a href="#" class="active-menu waves-effect">Mas vendidos</a>
                                    </li>
		                        </ul>
                            </li>
                            <!-- <li>
                                <a href="ContactosReport.php">Reporte de Contactos</a>
                            </li>
                             -->
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(in_array("AGENTE", $rolArray)){ ?>
                    <li>
                        <a href="propiedadasignada.php" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i>Propiedades asignadas</a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
		<div id="page-wrapper">
		    <div class="header">
                <h1 class="page-header">
                </h1>
                <ol class="breadcrumb">
                    <li><a href="central">Inicio</a></li>
                    <li><a href="central">Panel Central</a></li>
                    <li class="active">Configuracion</li>
                </ol>
			</div>
            <div id="page-inner">
