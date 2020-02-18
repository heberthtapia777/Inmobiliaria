<?php 
    include "cabecera.php";
    //require_once "../srvInmoviliaria/app/model/Casa.php";
    //require_once "../srvInmoviliaria/app/model/Propiedad.php";
?>
	<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
            	<h1>Propiedades asignadas...
	            </h1>
            </div>
        </div>
        <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="card">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/casa.jpg">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">Casas
						  <div class="row">
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=CI" class="btn btn-xs btn-primary">interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=CM" class="btn btn-xs btn-primary">muy interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=CP" class="btn btn-xs btn-primary">poco interesado</a>
                                </div>
                              </div>
						</div>
					  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                     <div class="card">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/departamento.jpg">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">Departamentos
						 <div class="row">
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=DI" class="btn btn-xs btn-primary">interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=DM" class="btn btn-xs btn-primary">muy interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=DP" class="btn btn-xs btn-primary">poco interesado</a>
                                </div>
                              </div>
						</div>
					  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                        <div class="card">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/lote.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">Lotes
						  <div class="row">
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=LI" class="btn btn-xs btn-primary">interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=LM" class="btn btn-xs btn-primary">muy interesado</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                	<a href="muestra-interes.php?a=LP" class="btn btn-xs btn-primary">poco interesado</a>
                                </div>
                              </div>
						</div>
					  </div>
                </div>
            </div>
    </div>
<?php 
    include "pie.php";
?>