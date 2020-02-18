<!DOCTYPE html>
<html xmlns="#">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingreso a Administrador</title> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
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
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="large material-icons">track_changes</i> <strong>target</strong></a>
            </div>
        </nav>
		<div id="page-wrapper">
		    <div class="header"> 
                <h1 class="page-header">Ingrese los datos de acceso...</h1>                
		    </div>
            <div id="page-inner">
			    <!-- /. ROW  --> 		
                <div class="row">
                    <div class="col-xs-6">
						<div class="card">
					        <div class="card-image">
					            <div id="morris-area-chart"></div>
					        </div> 
					        <div class="card-action">
					             <b>
                                    <!-- LOGUEO -->
                                    <div class="login-form">
                                        <form id="login-form"> <!-- action="http://localhost:9000/srvInmoviliaria/public/login" -->
                                            <h2 class="text-center">Acceso</h2>       
                                            <div class="form-group">
                                                <input type="text" id="USUARIO" name="USUARIO" class="form-control" placeholder="Usuario" required="required" 
                                                    oninvalid="this.setCustomValidity('Ingrese usuario')"
                                                    oninput="setCustomValidity('')"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="PASS" name="PASS" class="form-control" placeholder="Contraseña" required="required"
                                                    oninvalid="this.setCustomValidity('Ingrese contraseña')"
                                                    oninput="setCustomValidity('')"
                                                />
                                            </div>
                                            <div class="form-group" >
                                                <button id="btnIngresar" type="button" class="btn btn-primary btn-block  bg-dark text-white" >Ingresar</button>                                                
                                            </div>                                   
                                        </form>                      
                                    </div>
                                    <!-- /. LOGUEO -->
                                 </b>
					        </div>
					    </div>	 
                    </div>
                </div>				
                <!-- /. ROW  -->
    			<footer><p>Todos los derechos reservados. Administrador by: <a href="http://www.technosoft-bolivia.net/">Technosoft</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>    
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
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script src="behind/index.js"></script>
</body>
</html>