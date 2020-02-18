<?php 
	include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Usuario.php";
    require_once "../srvInmoviliaria/app/model/Persona.php";
    $contactos = Contacto::getObject("ID_PROPIEDAD", $_GET["p"]," ORDER BY FECHA DESC");
	//print_r($contactos);
	$parametro = $_GET["a"];	
	$tipoPropiedad =  substr($parametro, 0,1);
    
    switch ($tipoPropiedad){
 		case "C":	$tipoPropiedad = "CASA"; break; 
 		case "D":	$tipoPropiedad = "DEPARTAMENTO"; break;
 		case "L":	$tipoPropiedad = "LOTE"; break;	
    }
    
    $interes = substr($parametro, -1);
    $descInteres = "";
    switch ($interes){
 		case "I":	$descInteres="INTERESADO";  break; 
 		case "M":	$descInteres="MUY INTERESADO"; break;
 		case "P":	$descInteres="POCO INTERESADO"; break;	
    }

    echo $tipoPropiedad." - ".$descInteres;
	
?>
<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Lista Interesados
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Fecha</th>
                                            <th>Nombre del Interesado</th>
                                            <th>Correo</th>                                            
                                            <th>Telefono</th>
                                            <th>Comentario</th>
                                            <th>Asignado a</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       		<?php 
                                       		
                                       		foreach($contactos as $Index => $Record){
                                       			$propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
                                       			$nombreAsignado ="";
                                       			if($Record["USUARIO_ASIGNADO"]!=0){
                                       				$usuario = new Usuario($Record["USUARIO_ASIGNADO"]);
                                       				$persona = new Persona($usuario->ID_PERSONA);
                                       				$nombreAsignado = $persona->PATERNO." ".$persona->MATERNO." ".$persona->NOMBRE;                                       				
                                       			}
                                       				
        										if($propiedad->TIPO == $tipoPropiedad && $descInteres==$Record["INTERES"]){
                                       		?>
                                            <tr class="odd gradeX">
                                            	<td><?php echo $Record["FECHA"]?></td>
                                                <td><?php echo $Record["NOMBRE_COMPLETO"]?></td>
                                                <td><?php echo $Record["EMAIL"]?></td>                                                
                                                <td class="center"><?php echo $Record["TELEFONO"]?></td>
                                                <td><?php echo $Record["COMENTARIO"]?></td>
                                                <td><?php echo $nombreAsignado?></td>
                                                <td class="center">
                                                	<?php if($Record["USUARIO_ASIGNADO"]==0){ ?>
	                                                <button onclick="Asignacion(<?php echo $Record["ID_CONTACTO"]?>,<?php echo $_GET["p"]?>,'<?php echo $parametro ?>')" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AsignacionModal">
													  Asignar
													</button>
													<?php }?>
                                                </td>
                                             	<td class="center">
                                             		<?php if($Record["USUARIO_ASIGNADO"]!=0){ ?>
	                                                <button onclick="Desasignacion(<?php echo $Record["ID_CONTACTO"]?>,<?php echo $_GET["p"]?>,'<?php echo $parametro ?>')" type="button" class="btn btn-secondary" data-toggle="modal" >
													  Desasignar
													</button>
													<?php }?>
                                             	</td>                                                
                                            </tr>
                                            <?php }
                                       		}
                                            ?>                                       
                                    </tbody>                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AsignacionModal" tabindex="-1" role="dialog" aria-labelledby="EditarModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="mdialTamanioEdit" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditarModalLongTitle">Actualizar asignacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="AsignacionEdit">			
	  </div>
      <div class="modal-footer">      	
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validarEdit()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script src="behind/asignar-propiedad.js"></script>
<?php 
    include "pie.php";
?>