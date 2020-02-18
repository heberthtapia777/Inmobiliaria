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
						  <p><a href="propiedadasignada.html">Ver listado...</a></p>
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
						  <p><a href="propiedadasignada.html">Ver listado...</a></p>
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
						  <p><a href="propiedadasignada.html">Ver listado...</a></p>
						</div>
					  </div>
                </div>
            </div>
    </div>
<?php 
    include "pie.php";
?>