<?php 
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    $departamento = new Departamento($_GET["ID"]); 
    $propiedad = new Propiedad($departamento->ID_PROPIEDAD);
    
    $imagenes = explode("@",$departamento->IMAGEN);
    if(count($imagenes) == 1 && $imagenes[0]=="")
    	$imagenes = array();
    $numero = $departamento->ID_DEPARTAMENTO;
    
    $georeferencia = explode("|",$departamento->GEOREFERENCIACION);
    if($georeferencia[0]==""){
    	$georeferencia[0] = 0;
    	$georeferencia[1] = 0;
    }
    $capacidad = explode("|",$departamento->CAPACIDAD);
    $superficie = explode("=",$capacidad[0]);
    $pisos = explode("=",$capacidad[1]);
    $servicios = explode("=",$capacidad[2]);
    $dormitorios = explode("=",$capacidad[3]);
    $cocinas = explode("=",$capacidad[4]);
    $comedor = explode("=",$capacidad[5]);
    $salas = explode("=",$capacidad[6]);
    $banios = explode("=",$capacidad[7]);
    $lavanderia = explode("=",$capacidad[8]);
    $estudio = explode("=",$capacidad[9]);
    $otros = explode("=",$capacidad[10]);

    $enlace = explode("|",$departamento->ENLACE);
    
?>		
		<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="js/fileinput.min.js" type="text/javascript"></script>
		
		<style> 
		  	#mapaEdit {
			    width: 330px;
			    height: 300px;
			    border: 1px #ccc solid;
			}
			.borde{
				border: 1px #ccc solid;
			}
		</style> 
		<div class="card">
            <div class="card-content">
                <form class="" autocomplete="off" id="formularioEdit" name="formularioEdit" method = "POST" action="DepartamentosEditSave.php">
                    <div class="row">
                        <div class="input--group col s8">
                        	<input id="ID_DEPARTAMENTO_EDIT" name="ID_DEPARTAMENTO_EDIT" type="hidden" value="<?php echo $departamento->ID_DEPARTAMENTO?>">
                            <label for="DETALLE_EDIT">Detalle</label>
	                    	<textarea id="DETALLE_EDIT" name="DETALLE_EDIT" class="form-control" rows="1" ><?php echo $departamento->DETALLE?></textarea>
                        </div>
                        <div class="input--group col s3">    
                            <label for="ESTADO_EDIT">Estado de lote</label>
                            <select class="form-control" id="ESTADO_EDIT" name="ESTADO_EDIT">
                                <option <?php if($propiedad->ESTADO=="DISPONIBLE") echo "selected";?>>DISPONIBLE</option>
                                <option <?php if($propiedad->ESTADO=="RESERVADO") echo "selected";?>>RESERVADO</option>
                                <option <?php if($propiedad->ESTADO=="VENDIDO") echo "selected";?>>VENDIDO</option>                                
                            </select>
                        </div>                        
                    </div>                    
                    <!--  MAPA -->
                    
                    <div class="row">
                    	<div class="col-md-7 borde" align="center">
                    		<br>
							<div  class="col-md-6" align="center">
								<div id="mapaEdit" class="form-group"></div>								
							</div>
							
							<div class="col-md-6" align="center">
								<div class="row">
									<div class="col-md-7 form-group">
										<input id="buscar_EDIT" name="buscar_EDIT" type="text" placeholder="Buscar en Google Maps" value="" class="form-control" autocomplete="off"/>
									</div>
									<div class="col-md-3  form-group">
										<button type="button" id="search_EDIT" class="btn btn-primary" >
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Buscar</span>
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-11 form-group">
										<input id="cx_EDIT" name="cx_EDIT" type="text" placeholder="Latitud" value="" readonly class="form-control" data-validation="required"/>
										<input id="cy_EDIT" name="cy_EDIT" type="text" placeholder="Longitud" value="" readonly class="form-control" data-validation="required"/>
									</div>
									<div class="col-md-11 form-group">
										<button type="button"  class="btn btn-primary btn-sm" onclick="initMapEdit();" >
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Cargar Mapa</span>
										</button>
									</div>
								</div>
							</div>
							<br>
							<input type="hidden" id="enlaceSerializadaEdit" name="enlaceSerializadaEdit" value="" />
							<input type="hidden" id="imagenSerializadaEdit" name="imagenSerializadaEdit" value="" />
						   	<label for="archivos_EDIT">Adjuntar imagenes</label>
	                        <input id="archivos_EDIT" name="imagenes[]" type="file" multiple=true class="file-loading">	                    
						</div>
						<div class="col-md-4" >
							
							<div class="input-field">
                            	<input id="SUPERFICIE_EDIT" name="SUPERFICIE_EDIT" type="text" class="validate" value="<?php echo $superficie[1]?>">
                            	<label for="SUPERFICIE_EDIT">Superficie</label>
                            </div>
                            <div class="input-field">
                            	<input id="PISOS_EDIT" name="PISOS_EDIT" type="text" class="validate" value="<?php echo $pisos[1]?>">
                            	<label for="PISOS_EDIT">Pisos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SERVICIOS_EDIT" name="SERVICIOS_EDIT" type="text" class="validate" value="<?php echo $servicios[1]?>">
                            	<label for="SERVICIOS_EDIT">Servicios Basicos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="DORMITORIOS_EDIT" name="DORMITORIOS_EDIT" type="text" class="validate" value="<?php echo $dormitorios[1]?>">
                            	<label for="DORMITORIOS_EDIT">Dormitorios</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COCINAS_EDIT" name="COCINAS_EDIT" type="text" class="validate" value="<?php echo $cocinas[1]?>">
                            	<label for="COCINAS_EDIT">Cocinas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COMEDOR_EDIT" name="COMEDOR_EDIT" type="text" class="validate" value="<?php echo $comedor[1]?>">
                            	<label for="COMEDOR_EDIT">Comedor</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SALAS_EDIT" name="SALAS_EDIT" type="text" class="validate" value="<?php echo $salas[1]?>">
                            	<label for="SALAS_EDIT">Salas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="BANIOS_EDIT" name="BANIOS_EDIT" type="text" class="validate" value="<?php echo $banios[1]?>">
                            	<label for="BANIOS_EDIT">Banos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="LAVANDERIA_EDIT" name="LAVANDERIA_EDIT" type="text" class="validate" value="<?php echo $lavanderia[1]?>">
                            	<label for="LAVANDERIA_EDIT">Lavanderia</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="ESTUDIO_EDIT" name="ESTUDIO_EDIT" type="text" class="validate" value="<?php echo $estudio[1]?>">
                            	<label for="ESTUDIO_EDIT">Estudio</label>
                        	</div>
                        	
						</div>
						<br>
						<div class="input--group col s11" align="center">
							<div align="left">
		                    	<label for="OTROS_EDIT">Otros</label>
		                    	<textarea id="OTROS_EDIT" name="OTROS_EDIT" class="form-control" rows="1" ><?php echo $otros[1]?></textarea>
		                    </div>	                        
		                </div>
		                
		                <div class="input--group col s11" align="left">
							<div class="input-field col s5">
		                    	<input id="CUOTA_INICIAL_EDIT" name="CUOTA_INICIAL_EDIT" type="text" class="validate" value="<?php echo $departamento->CUOTA_INICIAL ?>" >
                            	<label for="CUOTA_INICIAL_EDIT">Cuota incial</label>
		                    </div>
		                    <div class="input-field col s5">
		                    	<input id="COSTO_TOTAL_EDIT" name="COSTO_TOTAL_EDIT" type="text" class="validate" value="<?php echo $departamento->COSTO_TOTAL ?>" >
                            	<label for="COSTO_TOTAL_EDIT">Costo total</label>
		                    </div>	                        
		                </div>
		                
		                <div class="input--group col s11" align="left">
		                	<table>
		                		<thead>
		                			<th width="20px"></th>
		                			<th>Enlaces a videos en youtube</th>
		                		</thead>
		                		<tbody>
		                			<tr><td>1</td><td><input id="ENLACE_1_EDIT" name="ENLACE_1_EDIT" type="text" value="<?php if(isset($enlace[0])){ echo $enlace[0];} ?>" /></td></tr>
		                			<tr><td>2</td><td><input id="ENLACE_2_EDIT" name="ENLACE_2_EDIT" type="text" value="<?php if(isset($enlace[1])){ echo $enlace[1];} ?>"/></td></tr>
		                			<tr><td>3</td><td><input id="ENLACE_3_EDIT" name="ENLACE_3_EDIT" type="text" value="<?php if(isset($enlace[2])){ echo $enlace[2];} ?>"/></td></tr>
		                			<tr><td>4</td><td><input id="ENLACE_4_EDIT" name="ENLACE_4_EDIT" type="text" value="<?php if(isset($enlace[3])){ echo $enlace[3];} ?>"/></td></tr>
		                			<tr><td>5</td><td><input id="ENLACE_5_EDIT" name="ENLACE_5_EDIT" type="text" value="<?php if(isset($enlace[4])){ echo $enlace[4];} ?>"/></td></tr>		                			
		                		</tbody>		                		
		                	</table>
		                </div>
		                
		                
					</div>
                    <!--  ./ MAPA -->
                </form>
            </div>
        </div>

<script>
initMapEdit(<?php echo $georeferencia[0];?>,<?php echo $georeferencia[1];?>,'');
$("#archivos_EDIT").fileinput({
	uploadUrl: "upload.php?ID=<?php echo "D".$numero;?>", 
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 20,
	showUpload: false, 
	showRemove: false,
	initialPreview: [
	<?php foreach($imagenes as $image){?>
		"<img src='<?php echo $image; ?>' height='50px' class='file-preview-image'>",
	<?php } ?>],
    initialPreviewConfig: [<?php foreach($imagenes as $image){ $infoImagenes=explode("/",$image);?>
	{caption: "<?php echo $infoImagenes[1];?>",  height: "50px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
	<?php } ?>]
	}).on("filebatchselected", function(event, files) {
			
	$("#archivos_EDIT").fileinput("upload");	
}); 

</script>