<?php 
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    
    $urbanizacion = new Urbanizacion($_GET["ID"]); 
    
    $georeferencia = explode("|",$urbanizacion->GEOREFERENCIACION);
    $imagenes = explode("@",$urbanizacion->IMAGEN);
    
    if(count($imagenes) == 1 && $imagenes[0]=="")
    	$imagenes = array();
    $numero = $urbanizacion->ID_URBANIZACION;
?>		
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="js/fileinput.min.js" type="text/javascript"></script>
<style> 
  	  #mapaE, #mapaU, #mapaP {
	    width: 400px;
	    height: 300px;
	    border: 1px #ccc solid;
	}
	</style> 
	 
   
        <div class="card">
            
            <div class="card-content">
                <form class="" autocomplete="off" id="formEdit" name="formEdit" method = "POST" action="UrbanizacionesEditSave.php">
                    <div class="row">
                        <div class="input-field col s6">
                        	<input id="ID_URABNIZACION_EDIT" name="ID_URABNIZACION_EDIT" type="hidden" class="validate" value="<?php echo $urbanizacion->ID_URBANIZACION?>">
                            <input id="NOMBRE_EDIT" name="NOMBRE_EDIT" type="text" class="validate" value="<?php echo $urbanizacion->NOMBRE?>" >
                            <label for="NOMBRE_EDIT">Nombre</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="DIMENSION_EDIT" name="DIMENSION_EDIT" type="text" class="validate" value="<?php echo $urbanizacion->DIMENSION?>" >
                            <label for="DIMENSION_EDIT">Dimension</label>
                        </div>
                        <div class="col s2">
                            <label for="NUMERO_LOTES_EDIT">Numero de Manzanos:</label>
                            <select class="form-control" id="NUMERO_LOTES_EDIT" name="NUMERO_LOTES_EDIT">
                                <?php for($i=1; $i<=50; $i++){?>
                                <option <?php if($urbanizacion->NUMERO_LOTES == $i){ echo "selected";}?>><?php echo $i;?></option>
                                <?php }?>	                                                                
                            </select>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="UBICACION_EDIT" name="UBICACION_EDIT" type="text" class="validate" value="<?php echo $urbanizacion->UBICACION?>">
                            <label for="UBICACION_EDIT">Detalle de la ubicacion</label>
                        </div>
                        <div class="col s3">
                            <label for="DEPARTAMENTO_EDIT">Seleccione departamento</label>
                            <select class="form-control" id="DEPARTAMENTO_EDIT" name="DEPARTAMENTO_EDIT">
                                <option <?php if($urbanizacion->DEPARTAMENTO == "LA PAZ"){ echo "selected"; }?> >LA PAZ</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "SANTA CRUZ"){ echo "selected"; }?> >SANTA CRUZ</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "COCHABAMBA"){ echo "selected"; }?> >COCHABAMBA</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "ORURO"){ echo "selected"; }?> >ORURO</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "POTOSI"){ echo "selected"; }?> >POTOSI</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "SUCRE"){ echo "selected"; }?> >SUCRE</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "TARIJA"){ echo "selected"; }?> >TARIJA</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "BENI"){ echo "selected"; }?> >BENI</option>
                                <option <?php if($urbanizacion->DEPARTAMENTO == "PANDO"){ echo "selected"; }?> >PANDO</option>                                
                            </select>
                        </div>
                    </div>
                    <!--  MAPA -->
                    
                    <div class="row">
						<div class="col-md-6" align="center">
							<div id="mapaE" class="form-group"></div><!--End mapa-->
							
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-7 form-group">
									<input id="buscarE" name="buscarE" type="text" placeholder="Buscar en Google Maps" value="" class="form-control" autocomplete="off"/>
								</div>
								<div class="col-md-3  form-group">
									<button type="button" id="searchE" class="btn btn-primary" >
										<i class="fa fa-search" aria-hidden="true"></i>
										<span>Buscar</span>
									</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-11 form-group">
									<input id="cx" name="cxE" type="text" placeholder="Latitud" value="" readonly class="form-control" data-validation="required"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-11 form-group">
									<input id="cy" name="cyE" type="text" placeholder="Longitud" value="" readonly class="form-control" data-validation="required"/>
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
                    <input type="hidden" id="imagenSerializadaEdit" name="imagenSerializadaEdit" value="" />
				   	<label for="archivos_EDIT">Adjuntar imagenes</label>
                    <input id="archivos_EDIT" name="imagenes[]" type="file" multiple=true class="file-loading">
                </form>
            </div>
        </div>

<script>
initMapEditView(<?php echo $georeferencia[0];?>,<?php echo $georeferencia[1];?>,'');
$("#archivos_EDIT").fileinput({
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
			
	$("#archivos_EDIT").fileinput("upload");	
}); 

</script>