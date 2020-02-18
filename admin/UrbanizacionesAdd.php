<?php 
	$imagenes = array();
	$image = array();
	$urbanizaciones = Urbanizacion::getAll();
	$Data = Urbanizacion::getAll();
    $max = 0;                                    
	foreach($Data as $Index => $Record){             
		if($Record["ID_URBANIZACION"]>$max)
			$max = $Record["ID_URBANIZACION"]; 
	}
	$numero = $max + 1;    
?>

<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="js/fileinput.min.js" type="text/javascript"></script>
		
<style> 
  	  #mapa, #mapaU, #mapaP {
	    width: 400px;
	    height: 300px;
	    border: 1px #ccc solid;
	}
	</style> 
	 
   
        <div class="card">
            
            <div class="card-content">
                <form class="" autocomplete="off" id="formNew" name="formNew" method = "POST" action="UrbanizacionesSave.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="NOMBRE" name="NOMBRE" type="text" class="validate">
                            <label for="NOMBRE">Nombre</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="DIMENSION" name="DIMENSION" type="text" class="validate">
                            <label for="DIMENSION">Dimension</label>
                        </div>
                        <div class="col s2">
                            <label for="NUMERO_LOTES">Numero de manzanos:</label>
                            <select class="form-control" id="NUMERO_LOTES" name="NUMERO_LOTES">
                                <?php for($i=1; $i<=50; $i++){?>
                                <option><?php echo $i;?></option>
                                <?php }?>	                                                                
                            </select>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="UBICACION" name="UBICACION" type="text" class="validate">
                            <label for="UBICACION">Detalle de la ubicacion</label>
                        </div>
                        <div class="col s3">
                            <label for="DEPARTAMENTO">Seleccione departamento</label>
                            <select class="form-control" id="DEPARTAMENTO" name="DEPARTAMENTO">
                                <option>LA PAZ</option>
                                <option>SANTA CRUZ</option>
                                <option>COCHABAMBA</option>
                                <option>ORURO</option>
                                <option>POTOSI</option>
                                <option>SUCRE</option>
                                <option>TARIJA</option>
                                <option>BENI</option>
                                <option>PANDO</option>                                
                            </select>
                        </div>
                    </div>
                    <!--  MAPA -->
                    
                    <div class="row">
						<div class="col-md-6" align="center">
							<div id="mapa" class="form-group"></div><!--End mapa-->
							
						</div>
						<div class="col-md-6">
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
								</div>
							</div>
							<div class="row">
								<div class="col-md-11 form-group">
									<input id="cy" name="cy" type="text" placeholder="Longitud" value="" readonly class="form-control" data-validation="required"/>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-11 form-group">
									<button type="button"  class="btn btn-primary btn-sm" onclick="initMap();" >
										<i class="fa fa-refresh" aria-hidden="true"></i>
										<span>Cargar Mapa</span>
									</button>
								</div>
							</div>
						</div>
					</div>
					<!--  ./ MAPA -->
					<input type="hidden" id="imagenSerializada" name="imagenSerializada" value="" />
				   	<label for="archivos">Adjuntar imagenes</label>
                    <input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
                </form>
            </div>
        </div>
<script>
$("#archivos").fileinput({
	uploadUrl: "upload.php?ID=<?php echo "U".$numero;?>", 
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

