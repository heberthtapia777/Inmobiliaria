<?php
	$imagenes = array();
	$image = array();
	$casas = Casa::getAll();
	$Data = Casa::getAll();
    $max = 0;
	foreach($Data as $Index => $Record){
		if($Record["ID_CASA"]>$max)
			$max = $Record["ID_CASA"];
	}

	$numero = $max + 1;
?>
		<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="js/fileinput.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

		<style>
		  	#mapa {
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
                <form class="" autocomplete="off" id="formNew" name="formNew" method = "POST" action="CasasAddSave.php">
                	<div class="row">
                		<div class="input--group col s8">
                            <label for="titulo">Titulo</label>
	                    	<input type="text" placeholder="Titulo" id="TITULO" name="TITULO" >
                        </div>
                	</div>
                    <div class="row">
                        <div class="input--group col s8">
                            <label for="RESUMEN">Descripción Resumida</label>
	                    	<textarea id="RESUMEN" name="RESUMEN" class="form-control" rows="1" ></textarea>

                        </div>
                        <div class="input--group col s3">
                            <label for="ESTADO">Estado de lote</label>
                            <select class="form-control" id="ESTADO" name="ESTADO">
                                <option>DISPONIBLE</option>
                                <option>RESERVADO</option>
                                <option>VENDIDO</option>
                            </select>
                        </div>
                    </div>
                    <!--  MAPA -->

                    <div class="row">
                    	<div class="col-md-7 borde" align="center">
                    		<br>
							<div  class="col-md-6" align="center">
								<div id="mapa" class="form-group"></div>
							</div>

							<div class="col-md-6" align="center">
								<div class="row">
									<div class="col-md-7 form-group">
										<input id="buscar" name="buscar" type="text" placeholder="Buscar en Google Maps" value="" class="form-control" autocomplete="off"/>
									</div>
									<div class="col-md-3  form-group">
										<button type="button" id="search" class="btn btn-primary" >
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Buscar</span>
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-11 form-group">
										<input id="cx" name="cx" type="text" placeholder="Latitud" value="" readonly class="form-control" data-validation="required"/>
										<input id="cy" name="cy" type="text" placeholder="Longitud" value="" readonly class="form-control" data-validation="required"/>
									</div>
									<div class="col-md-11 form-group">
										<button type="button"  class="btn btn-primary btn-sm" onclick="initMap();" >
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Cargar Mapa</span>
										</button>
									</div>
								</div>
							</div>
							<br>
							<input type="hidden" id="enlaceSerializada" name="enlaceSerializada" value="" />
							<input type="hidden" id="imagenSerializada" name="imagenSerializada" value="" />
						   	<label for="archivos">Adjuntar imagenes</label>
	                        <input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
						</div>
						<div class="col-md-4" >

							<div class="input-field">
                            	<input id="SUPERFICIE" name="SUPERFICIE" type="text" class="validate">
                            	<label for="SUPERFICIE">Superficie</label>
                            </div>
                            <div class="input-field">
                            	<input id="PISOS" name="PISOS" type="text" class="validate">
                            	<label for="PISOS">Pisos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SERVICIOS" name="SERVICIOS" type="text" class="validate">
                            	<label for="SERVICIOS">Servicios Basicos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="DORMITORIOS" name="DORMITORIOS" type="text" class="validate">
                            	<label for="DORMITORIOS">Dormitorios</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COCINAS" name="COCINAS" type="text" class="validate">
                            	<label for="COCINAS">Cocinas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="COMEDOR" name="COMEDOR" type="text" class="validate">
                            	<label for="COMEDOR">Comedor</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="SALAS" name="SALAS" type="text" class="validate">
                            	<label for="SALAS">Salas</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="BANIOS" name="BANIOS" type="text" class="validate">
                            	<label for="BANIOS">Banos</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="LAVANDERIA" name="LAVANDERIA" type="text" class="validate">
                            	<label for="LAVANDERIA">Lavanderia</label>
                        	</div>
                        	<div class="input-field">
                            	<input id="ESTUDIO" name="ESTUDIO" type="text" class="validate">
                            	<label for="ESTUDIO">Estudio</label>
                        	</div>

						</div>
						<br>
						<div class="input--group col s11" align="center">
							<div align="left">
		                    	<label for="DETALLE">Detalle</label>
		                    	<textarea id="DETALLE" name="DETALLE" class="form-control" rows="1" ></textarea>
		                    	<script>
				                // Replace the <textarea id="editor1"> with a CKEditor
				                // instance, using default configuration.
				                CKEDITOR.replace( 'DETALLE' );
				            </script>
		                    </div>
		                </div>

		                <div class="input--group col s11" align="left">
							<div class="input-field col s5">
		                    	<input id="CUOTA_INICIAL" name="CUOTA_INICIAL" type="text" class="validate">
                            	<label for="CUOTA_INICIAL">Cuota incial</label>
		                    </div>
		                    <div class="input-field col s5">
		                    	<input id="COSTO_TOTAL" name="COSTO_TOTAL" type="text" class="validate">
                            	<label for="COSTO_TOTAL">Costo total</label>
		                    </div>
		                </div>

		                <div class="input--group col s11" align="left">
		                	<table>
		                		<thead>
		                			<th width="20px"></th>
		                			<th>Enlaces a videos en youtube</th>
		                		</thead>
		                		<tbody>
		                			<tr><td>1</td><td><input id="ENLACE_1" name="ENLACE_1" type="text" /></td></tr>
		                			<tr><td>2</td><td><input id="ENLACE_2" name="ENLACE_2" type="text" /></td></tr>
		                			<tr><td>3</td><td><input id="ENLACE_3" name="ENLACE_3" type="text" /></td></tr>
		                			<tr><td>4</td><td><input id="ENLACE_4" name="ENLACE_4" type="text" /></td></tr>
		                			<tr><td>5</td><td><input id="ENLACE_5" name="ENLACE_5" type="text" /></td></tr>
		                		</tbody>
		                	</table>
		                </div>

					</div>
                    <!--  ./ MAPA -->


                </form>
            </div>
        </div>

<script>
$("#archivos").fileinput({
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

	$("#archivos").fileinput("upload");
});

</script>
