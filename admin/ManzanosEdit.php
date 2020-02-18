<?php 
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
    
    $manzano = new Manzano($_GET["ID"]); 
    
    $imagenes = explode("@",$manzano->IMAGEN);
    if(count($imagenes) == 1 && $imagenes[0]=="")
    	$imagenes = array();
    $numero = $manzano->ID_MANZANO;
    
    $georeferencia = explode("|",$manzano->GEOREFERENCIACION);
    if($georeferencia[0]==""){
    	$georeferencia[0] = 0;
    	$georeferencia[1] = 0;
    }    
?>		
		<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="js/fileinput.min.js" type="text/javascript"></script>
		
		<style> 
		  	#mapaEdit {
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
                <form class="" autocomplete="off" id="formularioEdit" name="formularioEdit" method = "POST" action="ManzanosEditSave.php">
                    <div class="row">
                    	<input type="hidden" id="ID_URBANIZACION_EDIT" name="ID_URBANIZACION_EDIT" value="<?php echo $_GET["ID"] ?>">
                        <input type="hidden" id="ID_MANZANO_EDIT" name="ID_MANZANO_EDIT" value="<?php echo $manzano->ID_MANZANO ?>">
                        <div class="input--group col s8">
                            <label for="NOMBRE_EDIT">Nombre</label>
	                    	<textarea id="NOMBRE_EDIT" name="NOMBRE_EDIT" class="form-control" rows="1" ><?php echo $manzano->NOMBRE?></textarea>
                        </div>
                        <div class="input--group col s3">    
                            <label for="NUMERO_LOTES_EDIT">Numero de lotes:</label>
                            <select class="form-control" id="NUMERO_LOTES_EDIT" name="NUMERO_LOTES_EDIT">
                                <?php for($i=1; $i<=50; $i++){?>
                                <option <?php if($manzano->NUMERO_LOTES == $i){ echo "selected";}?> ><?php echo $i;?></option>
                                <?php }?>	                                                                
                            </select>
                        </div>                        
                    </div>                    
                    <!--  MAPA -->
                    
                    <div class="row" >
                    	<div class="col-md-12" align="center">
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
							<input type="hidden" id="imagenSerializadaEdit" name="imagenSerializadaEdit" value="" />
						   	<label for="archivos_EDIT">Adjuntar imagenes</label>
	                        <input id="archivos_EDIT" name="imagenes[]" type="file" multiple=true class="file-loading">	                    
						</div>
								                
					</div>
                    <!--  ./ MAPA -->
                        
                    
                </form>
            </div>
        </div>

<script>
initMapEdit(<?php echo $georeferencia[0];?>,<?php echo $georeferencia[1];?>,'');
$("#archivos_EDIT").fileinput({
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
			
	$("#archivos_EDIT").fileinput("upload");	
}); 

</script>