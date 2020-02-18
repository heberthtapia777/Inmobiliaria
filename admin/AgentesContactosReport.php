<?php 
    include "cabecera.php";
	require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Reporte.php";

    $Data = array();
    $fecha_inicio = "";
    $fecha_fin = "";
    if (isset($_POST["FECHA_INICIO"]) && isset($_POST["FECHA_FIN"])){
    	
    	$fecha_inicio = $_POST["FECHA_INICIO"];
    	$fecha_fin = $_POST["FECHA_FIN"];
    	$Data = Reporte::getListadoAgentesMasContactados($fecha_inicio, $fecha_fin);
    	
    }
    
?>
<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Reporte por agentes con mas propiedades contactadas
                        </div>
                        
                        <div class="card-content">
                        	<form class="" autocomplete="off" id="form" name="formNew" method = "POST" action="AgentesContactosReport.php">
	                            
                        		<div class="row">
                        			<div class="input--group col s1">
	                            	</div>
	                            	<div class="input--group col s3">
	                            	    <label for="FECHA_INICIO">Fecha de Inicio</label>
	                            	    <input type="date" id="FECHA_INICIO" name="FECHA_INICIO" value="<?php echo $fecha_inicio?>"/>                        
		                            </div>	                            	
		                            <div class="input--group col s3">
	                            	    <label for="FECHA_FIN">Fecha Final</label>
                    					<input type="date" id="FECHA_FIN" name="FECHA_FIN" value="<?php echo $fecha_fin?>" />                        
		                            </div>
	                            </div>
	                            <div class="row">
                        			<div class="input--group col s1">
	                            	</div>
	                            	<div class="input--group col s6" align="right">
	                            		<button type="submit" class="btn btn-primary">
			                            		Buscar
										</button>
		                            </div>
	                            </div>
	                        </form>
                            
                            <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>                                            
                                            <th>Cliente</th>
                                            <th>Numero de contactos</th>                                                                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            // $Data = Casa::getAll();
                                            
                                            foreach($Data as $Index => $Record){
                                            	$usuario = new Usuario($Record["USUARIO_ASIGNADO"]);
                                            	$persona = new Persona($usuario->ID_PERSONA);
				                                							        		
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo ($Index+1) ?></td>
                                                <td><?php echo $persona->PATERNO." ".$persona->MATERNO." ".$persona->NOMBRE ?></td>
                                                <td><?php echo $Record["FECHA"] ?></td>
                                                <td class="center"><?php echo $Record["NOMBRE_COMPLETO"] ?></td>
                                                <td class="center"><?php echo $Record["CANTIDAD"] ?></td>                                                                                                
                                            </tr>
                                        <?php }  ?>
                                    
                                    </tbody>
                                                                        
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
            </div>
        </div>
    </div>

<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script src="behind/AgentesContactosReport.js"></script>  
<?php 
    include "pie.php";
?>
