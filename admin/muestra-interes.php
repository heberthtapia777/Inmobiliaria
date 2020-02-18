<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
    
    $parametro = $_GET["a"];
    //$contactos = array();
    $tipoPropiedad =  substr($parametro, 0,1);
    
    switch ($tipoPropiedad){
 		case "C":	$tipoPropiedad = "CASA"; break; 
 		case "D":	$tipoPropiedad = "DEPARTAMENTO"; break;
 		case "L":	$tipoPropiedad = "LOTE"; break;	
    }
    
    $interes = substr($parametro, -1);
    $descInteres = "";
    switch ($interes){
 		case "I":	$descInteres="Interesado"; $contactos = Contacto::getObject("INTERES", "INTERESADO"); break; 
 		case "M":	$descInteres="Muy Interesado"; $contactos = Contacto::getObject("INTERES", "MUY INTERESADO"); break;
 		case "P":	$descInteres="Poco interesado"; $contactos = Contacto::getObject("INTERES", "POCO INTERESADO"); break;	
    }
   
    echo $tipoPropiedad." - ".$descInteres; 
?>
	<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
            	<h1>Propiedades asignadas...
	            </h1>
            </div>
        </div>
        <div class="row">
        	
        <?php 
        	$idPropiedad = 0;
        	foreach($contactos as $Index => $Record){
        		$distinto = true;
        		$idPropiedad = $Record["ID_PROPIEDAD"];
        		for($i = 0; $i < $Index; $i++ ){
        			if($idPropiedad == $contactos[$i]["ID_PROPIEDAD"])
        				$distinto = false;        			
        		}
        		if($distinto){
        		
	        		$propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
	        		if($propiedad->TIPO == $tipoPropiedad){
	        			$objeto = null;
	        			$imagen = "";
	        			switch($tipoPropiedad){
	        				case "CASA":	$objeto = Casa::getObject("ID_PROPIEDAD", $propiedad->ID_PROPIEDAD); break;
	        				case "DEPARTAMENTO":	$objeto = Departamento::getObject("ID_PROPIEDAD", $propiedad->ID_PROPIEDAD); break;
	        				case "LOTE":	$objeto = Lote::getObject("ID_PROPIEDAD", $propiedad->ID_PROPIEDAD); break;        				
	        			}
        			
		?>
	        <div class="col-md-4 col-sm-4">
	                    <div class="card">
					<div class="card-image waves-effect waves-block waves-light">
						<?php 
							$ruta = explode("@",$objeto[0]["IMAGEN"]); 
						?>
					  <img class="activator" src="<?php echo $ruta[0]?>">
					</div>
					<div class="card-content">
					  <span class="card-title activator grey-text text-darken-4"><?php echo $objeto[0]["DETALLE"];?><i class="material-icons right">more_vert</i></span>
	                          <div class="row">
	                                <div class="col-md-12 col-sm-12">
	                                 <div>
	                                        <div align="center"><a href="listar-interesados.php?p=<?php echo $Record["ID_PROPIEDAD"]?>&a=<?php echo $parametro?>" class="btn btn-primary btn-lg">Ver listado</a></div>
	                                    </div>
	                                </div>
	                          </div>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">Datos del interesado<i class="material-icons right">close</i></span>
					  <?php 
					  	foreach($contactos as $IndexNombres => $RecordNombres){
					  		if($RecordNombres["ID_PROPIEDAD"]==$Record["ID_PROPIEDAD"])
					  			echo "<p>Nombre Completo: ".$RecordNombres["NOMBRE_COMPLETO"].". Telefono(s): ".$RecordNombres["TELEFONO"].". Correo: ".$RecordNombres["EMAIL"].". Comentario: ".$RecordNombres["COMENTARIO"]."</p>";
					  	}
					  ?>				  
					  </div>
				  </div>
			</div>  
			<?php 
        			}
        		}
        	}
			?>     
                
        </div>
    </div>
<?php 
    include "pie.php";
?>