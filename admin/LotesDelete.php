<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    $lote = new Lote($_GET["ID"]);
    
    Propiedad::delete($lote->ID_PROPIEDAD);
    Lote::delete($_GET["ID"]);
    
    $Data = Lote::getObject("ID_MANZANO",$lote->ID_MANZANO);
    $numeracion = 1;
    
	foreach($Data as $Index => $Record){
		$loteUpdate = new Lote($Record["ID_LOTE"]);		
		$loteUpdate->NUMERO_LOTE = $numeracion;
		$numeracion++;
 		$idLoteUpdate = Lote::update($loteUpdate);
	}
	
    
?>
	<script language="javascript">
		location = 'LotesList.php?ID=<?php echo $lote->ID_MANZANO?>';
	</script>