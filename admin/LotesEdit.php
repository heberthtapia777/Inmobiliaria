<?php 
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    $lote = new Lote($_GET["ID"]); 
    $propiedad = new Propiedad($lote->ID_PROPIEDAD);
    //print_r($propiedad); die();
    $manzano = new Manzano($lote->ID_MANZANO);
    
    $imagenes = explode("@",$lote->IMAGEN);
    if(count($imagenes) == 1 && $imagenes[0]=="")
    	$imagenes = array();
    $numero_lote = $lote->NUMERO_LOTE;
        
    $enlace = explode("|",$lote->ENLACE);
?>

<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="js/fileinput.min.js" type="text/javascript"></script>
   <div class="col-lg-12">
        <div class="card">
            
            	
            	<!-- FORMULARIO -->
            	<div class="card-action">            		
	                <form class="col s12" id="formularioEdit" method = "POST" action="LotesUpdateSave.php">
	                    <div class="row">
	                    	<input id="ID_LOTE_EDIT" name="ID_LOTE_EDIT" type="hidden" value="<?php echo $lote->ID_LOTE?>">
	                    	<input id="ID_MANZANO_EDIT" name="ID_MANZANO_EDIT" type="hidden" value="<?php echo $lote->ID_MANZANO?>">
	                    	<div class="col s8">
	                    		<label for="DETALLE_EDIT">Detalle</label>
	                    		<textarea id="DETALLE_EDIT" name="DETALLE_EDIT" class="form-control" rows="2" ><?php echo $lote->DETALLE; ?></textarea>	                            
	                        
	                        	<div class="input--group" align="left">
									<div class="input-field col s4">
				                    	<input id="CUOTA_INICIAL_EDIT" name="CUOTA_INICIAL_EDIT" type="text" class="validate" value="<?php echo $lote->CUOTA_INICIAL?>" >
		                            	<label for="CUOTA_INICIAL_EDIT">Cuota incial</label>
				                    </div>
				                    <div class="input-field col s4">
				                    	<input id="COSTO_TOTAL_EDIT" name="COSTO_TOTAL_EDIT" type="text" class="validate" value="<?php echo $lote->COSTO_TOTAL?>">
		                            	<label for="COSTO_TOTAL_EDIT">Costo total</label>
				                    </div>	                        
				                </div>
	                        
	                        </div>
	                        <div class="input-group col s3">
	                        	
                        		<label for="NUMERO_LOTE_EDIT">Numero de lote</label>
                        		<input id="NUMERO_LOTE_EDIT" name="NUMERO_LOTE_EDIT" type="text" value="<?php echo $lote->NUMERO_LOTE; ?>" class="validate" readonly>                    		
                    		
                        		<div class="form-group">
		                            <label for="ESTADO_EDIT">Estado de lote</label>
		                            <select class="form-control" id="ESTADO_EDIT" name="ESTADO_EDIT">
		                                <option <?php if($propiedad->ESTADO=="DISPONIBLE") echo "selected";?> >DISPONIBLE</option>
		                                <option <?php if($propiedad->ESTADO=="RESERVADO") echo "selected";?>>RESERVADO</option>
		                                <option <?php if($propiedad->ESTADO=="VENDIDO") echo "selected";?>>VENDIDO</option>
		                            </select>                            
		                        </div>
	                    			                        		                            	                                                     
	                        </div>
	                    </div>	                     
	                    <input type="hidden" id="enlaceSerializadaEdit" name="enlaceSerializadaEdit" value="" />
	                    <input type="hidden" id="imagenSerializadaEdit" name="imagenSerializadaEdit" value="" />
	                    
	                       <div class="form-group col s12">
	                       		<label for="archivosEdit">Adjuntar imagenes del lote</label>
	                        	<input id="archivosEdit" name="imagenes[]" type="file" multiple=true class="file-loading">
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
	                </form>	                
                </div>
                <!-- ./FORMULARIO -->            
        </div>
    </div>
<?php //die("cargooooooo");?>

<script>
        function validarEdit(){
        	var enlaceSerializada = "";
			var imagenSerializada = "";
        	$(".file-preview-image").each(function(index) {
        		imagenSerializada = imagenSerializada + $(this).attr('src') + "@";   
        	    
        	});
        	if(imagenSerializada!="")
        		imagenSerializada = imagenSerializada.substring(0,imagenSerializada.length-1);

			console.log(imagenSerializada);

			for(var i=1; i<=5; i++){
				if($("#ENLACE_"+i+"_EDIT").val().trim()!=""){
					enlaceSerializada = enlaceSerializada + $("#ENLACE_"+i+"_EDIT").val() + "|";			
				}		
			}
			if(enlaceSerializada.trim()!=""){
				enlaceSerializada = enlaceSerializada.substring(0,enlaceSerializada.length-1);
			}
			$("#enlaceSerializadaEdit").val(enlaceSerializada);
			
        	$("#imagenSerializadaEdit").val(imagenSerializada);
            
			//console.log($('.file-preview-image').attr('src'));
            $("#formularioEdit").submit();   

        } 

        $("#archivosEdit").fileinput({
        	uploadUrl: "upload.php?ID=<?php echo $_GET["ID"]."-".$numero_lote?>", 
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
        	{caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
        	<?php } ?>]
        	}).on("filebatchselected", function(event, files) {
        			
        	$("#archivosEdit").fileinput("upload");
        	
        });
        

</script>