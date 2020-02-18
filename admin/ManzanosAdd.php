<?php 
	$imagenes = array();
	$image = array();
	$Data = Manzano::getAll();
    $max = 0;                                    
	foreach($Data as $Index => $Record){             
		if($Record["ID_MANZANO"]>$max)
			$max = $Record["ID_MANZANO"]; 
	}

	$numero = $max + 1;
?>		
		<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="js/fileinput.min.js" type="text/javascript"></script>
		
		<style> 
		  	#mapa {
			    width: 430px;
			    height: 300px;
			    border: 1px #ccc solid;
			}
			.borde{
				border: 1px #ccc solid;
			}
		</style> 
		<div class="card">
            <div class="card-content">
                <form class="" autocomplete="off" id="formNew" name="formNew" method = "POST" action="ManzanosAddSave.php">
                    <div class="row">
                    	<input type="hidden" id="ID_URBANIZACION" name="ID_URBANIZACION" value="<?php echo $_GET["ID"] ?>">
                        <div class="input--group col s8">
                            <label for="DETALLE">Nombre</label>
	                    	<textarea id="NOMBRE" name="NOMBRE" class="form-control" rows="1" ></textarea>
                        </div>
                        <div class="input--group col s3">    
                            <label for="NUMERO_LOTES">Numero de lotes:</label>
                            <select class="form-control" id="NUMERO_LOTES" name="NUMERO_LOTES">
                                <?php for($i=1; $i<=50; $i++){?>
                                <option><?php echo $i;?></option>
                                <?php }?>	                                                                
                            </select>
                        </div>                        
                    </div>                    
                    <!--  MAPA -->
                    
                    <div class="row" >
                    	<div class="col-md-12" align="center">
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
							<input type="hidden" id="imagenSerializada" name="imagenSerializada" value="" />
						   	<label for="archivos">Adjuntar imagenes</label>
	                        <input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">	                    
						</div>
								                
					</div>
                    <!--  ./ MAPA -->
                        
                    
                </form>
            </div>
        </div>

<script>
$("#archivos").fileinput({
	uploadUrl: "upload.php?ID=<?php echo "M".$numero;?>", 
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