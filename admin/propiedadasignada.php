<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
    
    $idUsuario = $_SESSION['ID_USUARIO'];
    
    $contactos = Contacto::getObject("USUARIO_ASIGNADO", $idUsuario);
    //print_r($asignadosContacto);
    /*$idPropiedad = 0;
    $indexPropiedad = 0;
    $propiedades = array();
	foreach($contactos as $Index => $Record){
    	$distinto = true;
        $idPropiedad = $Record["ID_PROPIEDAD"];
        for($i = 0; $i < $Index; $i++ ){
        	if($idPropiedad == $contactos[$i]["ID_PROPIEDAD"])
        		$distinto = false;        			
        }
        if($distinto){
    		$propiedades[$indexPropiedad] = new Propiedad($idPropiedad);     	
    		$indexPropiedad++;    	
        }
	}*/
	//print_r($propiedades);
?>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
<style>
#mdialTamanio{
  width: 80% !important;
}
#mdialTamanioEdit{
  width: 80% !important;
}
</style>
<h1 class="page-header">
	Propiedades Asignadas
</h1>
<div class="dashboard-cards"> 
		
        <div class="row">
            <div class="col-md-12">
            	
                <div class="row">
                	<?php foreach($contactos as $Index => $Record){ 
			                    $objeto = null;
			        			$imagen = "";
			        			
			        			$propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
			        			switch($propiedad->TIPO){
			        				case "CASA":	$objeto = Casa::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;
			        				case "DEPARTAMENTO":	$objeto = Departamento::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;
			        				case "LOTE":	$objeto = Lote::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;        				
			        			}
			        			$ruta = explode("@",$objeto[0]["IMAGEN"]);
	                    ?>
	                <div class="col-md-4 col-sm-4">
	                    
	                    <div class="card">
							<div class="card-image waves-effect waves-block waves-light">							  
							  <img class="activator" src="<?php echo $ruta[0]?>">
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4"><?php echo $propiedad->TIPO ?>: <?php echo $objeto[0]["DETALLE"]?><i class="material-icons right">more_vert</i></span>
	                          <div class="row">
	                          		<form id="formulario" name="formulario" action="propiedadAsignadaSave.php" method="post">
	                          		<input type="hidden" id="ID_CONTACTO_SAVE" name="ID_CONTACTO_SAVE" value="<?php echo $Record["ID_CONTACTO"]?>" />
	                          		<div class="col-md-6 col-sm-6">
	                                	<div>
	                                        <p><h5>Selecciona el estado</h5></p>
	                                        <select id="FLUJO" name="FLUJO" class="form-control mdb-select md-form colorful-select dropdown-primary">
	                                          <option>Elija una opcion</option>
	                                          <option <?php if($Record["FLUJO"] == "POR CONTACTAR"){ echo "selected";} ?> >POR CONTACTAR</option>
	                                          <option <?php if($Record["FLUJO"] == "CONTACTADO"){ echo "selected";} ?>>CONTACTADO</option>
	                                          <option <?php if($Record["FLUJO"] == "VISITA AGENDADA"){ echo "selected";} ?>>VISITA AGENDADA</option>
	                                        </select><br>
	                                        <!--  <div align="center"><button type="submit" class="btn btn-primary btn-sm">registrar</button></div>  -->
	                                    </div>
	                                </div>
	                                <div class="col-md-6 col-sm-6">
	                                	 <div>
	                                        <p><h5>Selecciona el estado</h5></p>
	                                        <select id="ESTADO" name="ESTADO" class="form-control mdb-select md-form colorful-select dropdown-primary">
	                                          <option>Elija una opcion</option>
	                                          <option <?php if($Record["ESTADO"] == "PERDIDO"){ echo "selected";} ?>>PERDIDO</option>
	                                          <option <?php if($Record["ESTADO"] == "RECUPERADO"){ echo "selected";} ?>>RECUPERADO</option>
	                                          <option <?php if($Record["ESTADO"] == "VENDIDO"){ echo "selected";} ?>>VENDIDO</option>
	                                        </select><br>
	                                        <div align="center"><button type="submit" onclick="$('formulario').submit()" class="btn btn-primary btn-sm">registrar</button></div>
	                                    </div>
	                                </div>
	                                </form>
	                          </div>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4">Datos del interesado<i class="material-icons right">close</i></span>
							  <?php 
							  	echo "<p>Interes: ".$Record["INTERES"].". <br>Nombre Completo: ".$Record["NOMBRE_COMPLETO"].". Telefono(s): ".$Record["TELEFONO"].". Correo: ".$Record["EMAIL"].". Comentario: ".$Record["COMENTARIO"]."</p>";
							  ?>
							</div>
							
						</div>
						
	                </div>
					<?php } ?>

                </div>
<style>
select{
    font-family: 'FontAwesome' , 'TATSanaChon';
}
</style> 
                    <!-- /. ROW  --> 
            </div>
        </div>
</div>

<!-- Modales -->


<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!--  <script src="behind/CasasList.js"></script>  -->
<?php 
    include "pie.php";
?>