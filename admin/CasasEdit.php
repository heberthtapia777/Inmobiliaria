<?php
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    $casa = new Casa($_GET["ID"]);
    $propiedad = new Propiedad($casa->ID_PROPIEDAD);

    $imagenes = explode("@",$casa->IMAGEN);
    if(count($imagenes) == 1 && $imagenes[0]=="")
    	$imagenes = array();
    $numero = $casa->ID_CASA;

    $georeferencia = explode("|",$casa->GEOREFERENCIACION);
    if($georeferencia[0]==""){
    	$georeferencia[0] = 0;
    	$georeferencia[1] = 0;
    }
    $capacidad = explode("|",$casa->CAPACIDAD);
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


    $enlace = explode("|",$casa->ENLACE);

?>
		<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="js/fileinput.min.js" type="text/javascript"></script>

		<style>
		  	#mapaEdit {
			    width: 100%;
			    height: 300px;
			    border: 1px #ccc solid;
			}
			.borde{
				border: 1px #ccc solid;
			}
            .caret {
                border-top: 0px dashed;
            }
            .dropdown-content {
                left: 0px !important;
                top: 0px !important;
            }
		</style>
		<div class="card">
            <div class="card-content">
                    <div class="row">
                        <div class="input--group col s8">
                            <div class="input-field">
                                <input id="TITULO_EDIT" name="TITULO_EDIT" type="text" value="<?php echo $casa->TITULO?>" data-validation="required">
                                <label for="TITULO">Titulo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                        	<input id="ID_CASA_EDIT" name="ID_CASA_EDIT" type="hidden" value="<?php echo $casa->ID_CASA?>">
	                    	<textarea id="RESUMEN_EDIT" name="RESUMEN_EDIT" class="materialize-textarea" rows="2" data-validation="required"><?php echo $casa->RESUMEN?></textarea>
                            <label for="RESUMEN_EDIT">Resumen</label>
                        </div>
                        <div class="input-field col s4">
                            <select id="ESTADO_EDIT" name="ESTADO_EDIT">
                                <option <?php if($propiedad->ESTADO=="DISPONIBLE") echo "selected";?>>DISPONIBLE</option>
                                <option <?php if($propiedad->ESTADO=="RESERVADO") echo "selected";?>>RESERVADO</option>
                                <option <?php if($propiedad->ESTADO=="VENDIDO") echo "selected";?>>VENDIDO</option>
                            </select>
                            <label for="ESTADO_EDIT">Estado de lote</label>
                        </div>
                    </div>
                    <!--  MAPA -->

                    <div class="row">
                    	<div class="col-md-9 borde" align="center">
                    		<br>
							<div  class="col-md-6" align="center">
								<div id="mapaEdit" class="form-group"></div>
							</div>

							<div class="col-md-6" align="center">
								<div class="row">
									<div class="col-md-8 form-group">
                                        <div class="input-field">
										<input id="buscar_EDIT" name="buscar_EDIT" type="text" placeholder="Buscar en Google Maps" value="" class="form-control" autocomplete="off"/>
                                        </div>
									</div>
									<div class="col-md-4  form-group">
										<button type="button" id="search_EDIT" class="btn btn-primary" >
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Buscar</span>
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
                                        <div class="input-field">
										  <input id="cx_EDIT" name="cx_EDIT" type="text" placeholder="Latitud" value="" readonly data-validation="required"/>
                                        </div>
                                        <div class="input-field">
										  <input id="cy_EDIT" name="cy_EDIT" type="text" placeholder="Longitud" value="" readonly data-validation="required"/>
                                        </div>
									</div>
									<div class="col-md-12 form-group">
										<button type="button"  class="btn btn-primary btn-sm" onclick="initMapEdit();" >
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Cargar Mapa</span>
										</button>
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-md-12">
							        <input type="hidden" id="enlaceSerializadaEdit" name="enlaceSerializadaEdit" value="" />
						   	        <input type="hidden" id="imagenSerializadaEdit" name="imagenSerializadaEdit" value="" />
	                                <input id="archivos_EDIT" name="imagenes[]" type="file" multiple=true class="file-loading">
                                </div>
                            </div>
						</div>
						<div class="col-md-3" >

							<div class="input-field">
                            	<input id="SUPERFICIE_EDIT" name="SUPERFICIE_EDIT" type="text" data-validation="required" value="<?php echo $superficie[1]?>">
                            	<label for="SUPERFICIE_EDIT">Superficie</label>
                            </div>
                            <div class="input-field">
                            	<input id="PISOS_EDIT" name="PISOS_EDIT" type="text" data-validation="required" value="<?php echo $pisos[1]?>">
                            	<label for="PISOS_EDIT">Pisos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SERVICIOS_EDIT" name="SERVICIOS_EDIT" type="text" data-validation="required" value="<?php echo $servicios[1]?>">
                            	<label for="SERVICIOS_EDIT">Servicios Basicos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="DORMITORIOS_EDIT" name="DORMITORIOS_EDIT" type="text" data-validation="required" value="<?php echo $dormitorios[1]?>">
                            	<label for="DORMITORIOS_EDIT">Dormitorios</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COCINAS_EDIT" name="COCINAS_EDIT" type="text" data-validation="required" value="<?php echo $cocinas[1]?>">
                            	<label for="COCINAS_EDIT">Cocinas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COMEDOR_EDIT" name="COMEDOR_EDIT" type="text" data-validation="required" value="<?php echo $comedor[1]?>">
                            	<label for="COMEDOR_EDIT">Comedor</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SALAS_EDIT" name="SALAS_EDIT" type="text" data-validation="required" value="<?php echo $salas[1]?>">
                            	<label for="SALAS_EDIT">Salas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="BANIOS_EDIT" name="BANIOS_EDIT" type="text" data-validation="required" value="<?php echo $banios[1]?>">
                            	<label for="BANIOS_EDIT">Banos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="LAVANDERIA_EDIT" name="LAVANDERIA_EDIT" type="text" data-validation="required" value="<?php echo $lavanderia[1]?>">
                            	<label for="LAVANDERIA_EDIT">Lavanderia</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="ESTUDIO_EDIT" name="ESTUDIO_EDIT" type="text" data-validation="required" value="<?php echo $estudio[1]?>">
                            	<label for="ESTUDIO_EDIT">Estudio</label>
                        	</div>
						</div>
                        <br>
                    </div>
						<div class="row">
                            <div class="col-md-12">
		                    	<label for="DETALLE_EDIT">Detalle</label>
		                    	<textarea id="DETALLE_EDIT" name="DETALLE_EDIT" class="materialize-textarea" data-validation="required" rows="2" ><?php echo $casa->DETALLE?></textarea>
		                    </div>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'DETALLE_EDIT' );
                            </script>
		                </div>

                        <div class="row">
    		                <div class="input--group col s12" align="left">
    							<div class="input-field col s6">
    		                    	<input id="CUOTA_INICIAL_EDIT" name="CUOTA_INICIAL_EDIT" type="text" class="validate" value="<?php echo $casa->CUOTA_INICIAL?>">
                                	<label for="CUOTA_INICIAL_EDIT">Cuota incial</label>
    		                    </div>
    		                    <div class="input-field col s6">
    		                    	<input id="COSTO_TOTAL_EDIT" name="COSTO_TOTAL_EDIT" type="text" class="validate" value="<?php echo $casa->COSTO_TOTAL?>">
                                	<label for="COSTO_TOTAL_EDIT">Costo total</label>
    		                    </div>
    		                </div>

    		                <div class="input--group col s12" align="left">
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
            </div>
        </div>

<script>
initMapEdit(<?php echo $georeferencia[0];?>,<?php echo $georeferencia[1];?>,'');
$("#archivos_EDIT").fileinput({
	uploadUrl: "upload.php?ID=<?php echo "C".$numero;?>",
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
