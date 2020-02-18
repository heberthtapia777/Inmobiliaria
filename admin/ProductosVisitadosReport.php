<?php 
    include "cabecera.php";
	require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Reporte.php";

    $Data = array();
    if (isset($_POST["TIPO"]))
    	$Data = Reporte::getListadoPropiedadesMasVisitados($_POST["ESTADO"], $_POST["TIPO"]);
    	
?>
<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Reporte por productos mas visitados
                        </div>
                        
                        <div class="card-content">
                        	<form class="" autocomplete="off" id="form" name="formNew" method = "POST" action="ProductosVisitadosReport.php">
	                            
                        		<div class="row">
                        			<div class="input--group col s1">
	                            	</div>	                            	
			                        <div class="input--group col s3">
		                            	<label for="TIPO">Tipo de propiedad</label>
			                            <select class="form-control" id="TIPO" name="TIPO">
			                                <option <?php if(isset($_POST["TIPO"]) && $_POST["TIPO"]=="CASA" ){ echo "selected";} ?>>CASA</option>
			                                <option <?php if(isset($_POST["TIPO"]) && $_POST["TIPO"]=="DEPARTAMENTO" ){ echo "selected";} ?>>DEPARTAMENTO</option>
			                                <option <?php if(isset($_POST["TIPO"]) && $_POST["TIPO"]=="LOTE" ){ echo "selected";} ?>>LOTE</option>                                
			                            </select>
		                            </div>
	                            </div>
	                            <div class="row">
                        			<div class="input--group col s1">
	                            	</div>
	                            	<div class="input--group col s3" align="right">
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
                                            <th>Cantidad Visitas</th>
                                            <th>Detalle</th>                                            
                                            <th>Cuota Inicial</th>
                                            <th>Cuota Total</th>
                                            <th>Numero de Lote</th>                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            // $Data = Casa::getAll();
                                            
                                            foreach($Data as $Index => $Record){
                                            	$propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
				                                switch($propiedad->TIPO){
							        				case "CASA":	$objeto = Casa::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;
							        				case "DEPARTAMENTO":	$objeto = Departamento::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;
							        				case "LOTE":	$objeto = Lote::getObject("ID_PROPIEDAD", $Record["ID_PROPIEDAD"]); break;        				
							        			}
							        		
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo ($Index+1) ?></td>
                                                <td><?php echo $Record["CANTIDAD"] ?></td>
                                                <td><?php echo $objeto[0]["DETALLE"] ?></td>
                                                <td class="center"><?php echo $objeto[0]["CUOTA_INICIAL"] ?></td>
                                                <td class="center"><?php echo $objeto[0]["COSTO_TOTAL"] ?></td>
                                                <td class="center"><?php if($propiedad->TIPO=="LOTE"){ echo $objeto[0]["NUMERO_LOTE"]; } else { echo "-";} ?></td>                                                
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
<!--  <script src="behind/CasasList.js"></script>  -->
<?php 
    include "pie.php";
?>