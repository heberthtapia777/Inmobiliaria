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
		<script src="js/fileinput_locale_es.js" type="text/javascript"></script>

		<style>
		  	#mapa {
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
                        	<input id="TITULO" name="TITULO" type="text">
                        	<label for="TITULO">Titulo</label>
                        </div>
                    </div>
            	</div>
                <div class="row">
                	<div class="input-field col s8">
			          	<textarea id="RESUMEN" name="RESUMEN" class="materialize-textarea" rows="2"></textarea>
			          	<label for="RESUMEN">Resumen</label>
			        </div>

                    <div class="input-field col s4">
					    <select id="ESTADO" name="ESTADO" required="" >
					      	<option value="" disabled selected hidden>Elija una opcón</option>
					      	<option value="DISPONIBLE">DISPONIBLE</option>
                            <option value="RESERVADO">RESERVADO</option>
                            <option value="VENDIDO">VENDIDO</option>
					    </select>
					    <label>Estado de Lote</label>
					</div>
                </div>
                <!--  MAPA -->

                <div class="row">
                	<div class="col-md-9 borde" align="center">
                		<div class="row">
                			<br>
							<div  class="col-md-6" align="center">
								<div id="mapa" class="form-group"></div>
							</div>

							<div class="col-md-6" align="center">
								<div class="row">
									<div class="col-md-8 form-group">
										<div class="input-field">
											<input id="buscar" name="buscar" type="text" value="" class="form-control" autocomplete="off"/>
											<label for="buscar">Buscar en Google Maps</label>
										</div>
									</div>
									<div class="col-md-4  form-group">
										<button type="button" id="search" class="btn btn-primary btn-sm" >
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Buscar</span>
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="input-field">
											<input id="cx" name="cx" type="text" value="" readonly="readonly" data-validation="required"/>
											<label for="cx">Latitud</label>
										</div>
										<div class="input-field">
											<input id="cy" name="cy" type="text" value="" readonly="readonly" data-validation="required"/>
											<label for="cy">Longitud</label>
										</div>
									</div>
									<div class="col-md-12 form-group">
										<button type="button"  class="btn btn-primary btn-sm" onclick="initMap();" >
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Cargar Mapa</span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="hidden" id="enlaceSerializada" name="enlaceSerializada" value="" />
								<input type="hidden" id="imagenSerializada" name="imagenSerializada" value="" />
		                        <input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
							</div>
						</div>
					</div>
					<div class="col-md-3" >

						<div class="input-field">
                        	<input id="SUPERFICIE" name="SUPERFICIE" type="text" data-validation="required">
                        	<label for="SUPERFICIE">Superficie</label>
                        </div>
                        <div class="input-field">
                        	<input id="PISOS" name="PISOS" type="text" data-validation="required">
                        	<label for="PISOS">Pisos</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="SERVICIOS" name="SERVICIOS" type="text" data-validation="required">
                        	<label for="SERVICIOS">Servicios Basicos</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="DORMITORIOS" name="DORMITORIOS" type="text" data-validation="required">
                        	<label for="DORMITORIOS">Dormitorios</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="COCINAS" name="COCINAS" type="text" data-validation="required">
                        	<label for="COCINAS">Cocinas</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="COMEDOR" name="COMEDOR" type="text" data-validation="required">
                        	<label for="COMEDOR">Comedor</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="SALAS" name="SALAS" type="text" data-validation="required">
                        	<label for="SALAS">Salas</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="BANIOS" name="BANIOS" type="text" data-validation="required">
                        	<label for="BANIOS">Banos</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="LAVANDERIA" name="LAVANDERIA" type="text" data-validation="required">
                        	<label for="LAVANDERIA">Lavanderia</label>
                    	</div>
                    	<div class="input-field">
                        	<input id="ESTUDIO" name="ESTUDIO" type="text" data-validation="required">
                        	<label for="ESTUDIO">Estudio</label>
                    	</div>

					</div>
					<br>

				</div>

				<div class="row">
					<div class="col-md-12" >
						<label for="DETALLE">Detalle</label>
			          	<textarea id="DETALLE" name="DETALLE" class="materialize-textarea" data-validation="required" rows="2"></textarea>
					</div>
                    <script>
		                // Replace the <textarea id="editor1"> with a CKEditor
		                // instance, using default configuration.
		                CKEDITOR.replace( 'DETALLE' );
		            </script>
		        </div>

		        <div class="row">
	                <div class="input--group col s12" align="left">
						<div class="input-field col s6">
	                    	<input id="CUOTA_INICIAL" name="CUOTA_INICIAL" type="text" data-validation="required">
                        	<label for="CUOTA_INICIAL">Cuota incial</label>
	                    </div>
	                    <div class="input-field col s6">
	                    	<input id="COSTO_TOTAL" name="COSTO_TOTAL" type="text" data-validation="required">
                        	<label for="COSTO_TOTAL">Costo total</label>
	                    </div>
	                </div>

	                <div class="input--group col s12" align="left">
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

  	// Or with jQuery

</script>
