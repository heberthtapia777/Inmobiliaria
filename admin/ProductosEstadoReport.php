<?php 
    include "cabecera.php";
	require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Reporte.php";

    $estado = "";
    $tipo = "";
    $Data = array();
    $sql = " ";
    if (isset($_POST["ESTADO"]) && isset($_POST["TIPO"]))
    	$Data = Reporte::getListadoPropiedadesPorEstado($_POST["ESTADO"], $_POST["TIPO"]);
    
?>
<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Reporte por productos
                        </div>
                        
                        <div class="card-content">
                        	<form class="" autocomplete="off" id="form" name="formNew" method = "POST" action="ProductosEstadoReport.php">
	                            
                        		<div class="row">
                        			<div class="input--group col s1">
	                            	</div>
	                            	<div class="input--group col s3">
	                            		
		                            	<label for="ESTADO">Estado de la propiedad</label>
			                            <select class="form-control" id="ESTADO" name="ESTADO">
			                                <option <?php if(isset($_POST["ESTADO"]) && $_POST["ESTADO"]=="DISPONIBLE" ){ echo "selected";} ?> >DISPONIBLE</option>
			                                <option <?php if(isset($_POST["ESTADO"]) && $_POST["ESTADO"]=="RESERVADO" ){ echo "selected";} ?>>RESERVADO</option>
			                                <option <?php if(isset($_POST["ESTADO"]) && $_POST["ESTADO"]=="VENDIDO" ){ echo "selected";} ?>>VENDIDO</option>                                
			                            </select>
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
                                            <th>Registro</th>
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
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $Record["FECHA"] ?></td>
                                                <td><?php echo $Record["DETALLE"] ?></td>
                                                <td class="center"><?php echo $Record["CUOTA_INICIAL"] ?></td>
                                                <td class="center"><?php echo $Record["COSTO_TOTAL"] ?></td>
                                                <td class="center"><?php echo $Record["NUMERO_LOTE"] ?></td>                                                
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