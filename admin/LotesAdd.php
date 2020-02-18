<?php 
    
    $directory = "imagenes_/";      
	$images = glob($directory . "*.*");

	$imagenes = array();
	$i=0;
	$numero_lote = count(Lote::getObject("ID_MANZANO", $_GET["ID"]) ) + 1;
		
?>
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="js/fileinput.min.js" type="text/javascript"></script>
   <div class="col-lg-12">
        <div class="card">
            
            	
            	<!-- FORMULARIO -->
            	<div class="card-action">            		
	                <form class="col s12" id="FORMULARIO" method = "POST" action="LotesSave.php">
	                    <div class="row">
	                    	<input id="ID_MANZANO" name="ID_MANZANO" type="hidden" value="<?php echo $_GET["ID"] ?>">
	                    	<div class="col s8">
	                    		<label for="DETALLE">Detalle</label>
	                    		<textarea id="DETALLE" name="DETALLE" class="form-control" rows="2" ></textarea>
	                    		<div class="input--group" align="left">
									<div class="input-field col s4">
				                    	<input id="CUOTA_INICIAL" name="CUOTA_INICIAL" type="text" class="validate">
		                            	<label for="CUOTA_INICIAL">Cuota incial</label>
				                    </div>
				                    <div class="input-field col s4">
				                    	<input id="COSTO_TOTAL" name="COSTO_TOTAL" type="text" class="validate">
		                            	<label for="COSTO_TOTAL">Costo total</label>
				                    </div>	                        
				                </div>				                
				                                          
	                        </div>
	                        <div class="input-group col s3">
	                        	
                        		<label for="NUMERO_LOTE">Numero de lote</label>
                        		<input id="NUMERO_LOTE" name="NUMERO_LOTE" type="text" value="0" class="validate" readonly>                    		
                    		
                        		<div class="form-group">
		                            <label for="ESTADO">Estado de lote</label>
		                            <select class="form-control" id="ESTADO" name="ESTADO">
		                                <option>DISPONIBLE</option>
		                                <option>RESERVADO</option>
		                                <option>VENDIDO</option>                                
		                            </select>                            
		                        </div>
	                    			                        		                            	                                                     
	                        </div>
	                    </div>	                     
	                    <input type="hidden" id="enlaceSerializada" name="enlaceSerializada" value="" />
	                    <input type="hidden" id="imagenSerializada" name="imagenSerializada" value="" />
	                    
	                       <div class="form-group col s12">
	                       		<label for="archivos">Adjuntar imagenes del lote</label>
	                        	<input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
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
	                                        
	                </form>	                
                </div>
                <!-- ./FORMULARIO -->            
        </div>
    </div>

<script>

        function validar(){
        	var enlaceSerializada = "";
			var imagenSerializada = "";
        	$(".file-preview-image").each(function(index) {
        		imagenSerializada = imagenSerializada + $(this).attr('src') + "@";   
        	    
        	});
        	if(imagenSerializada!="")
        		imagenSerializada = imagenSerializada.substring(0,imagenSerializada.length-1);


        	for(var i=1; i<=5; i++){
        		if($("#ENLACE_"+i).val().trim()!=""){
        			enlaceSerializada = enlaceSerializada + $("#ENLACE_"+i).val() + "|";			
        		}		
        	}
        	if(enlaceSerializada.trim()!=""){
        		enlaceSerializada = enlaceSerializada.substring(0,enlaceSerializada.length-1);
        	}
        	$("#enlaceSerializada").val(enlaceSerializada);
        	
        	$("#imagenSerializada").val(imagenSerializada);
            
			//console.log($('.file-preview-image').attr('src'));
            $("#FORMULARIO").submit();   

        } 

        $("#archivos").fileinput({
        	uploadUrl: "upload.php?ID=<?php echo $_GET['ID'].'-'.$numero_lote;?>", 
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