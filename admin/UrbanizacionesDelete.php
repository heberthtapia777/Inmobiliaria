<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    
    $manzanos = Manzano::getObject("ID_URBANIZACION",$_GET["ID"]);
    
    foreach($manzanos as $Index => $Record){
        
    	$lotes = Lote::getObject("ID_MANZANO", $Record["ID_MANZANO"]);
    	foreach($lotes as $IndexLotes => $RecordLotes){
    		Propiedad::delete($RecordLotes["ID_PROPIEDAD"]);
        	Lote::delete($RecordLotes["ID_LOTE"]);    		
    	}    	
    	Manzano::delete($Record["ID_MANZANO"]);
    }
    
    Urbanizacion::delete($_GET["ID"]);
?>
	<script language="javascript">
		location = 'UrbanizacionesList.php';
	</script>
