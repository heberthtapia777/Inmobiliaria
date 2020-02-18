<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    $manzano = new Manzano($_GET["ID"]);
    
    $lotes = Lote::getObject("ID_MANZANO",$_GET["ID"]);
    
    foreach($lotes as $Index => $Record){
        Propiedad::delete($Record["ID_PROPIEDAD"]);
        Lote::delete($Record["ID_LOTE"]);
    }

    Manzano::delete($_GET["ID"]);

?>
	<script language="javascript">
		location = 'ManzanosList.php?ID=<?php echo $manzano->ID_URBANIZACION?>';
	</script>
