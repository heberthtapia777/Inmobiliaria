<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    $casa = new Casa($_GET["ID"]);
    
    Propiedad::delete($casa->ID_PROPIEDAD);
    Casa::delete($_GET["ID"]);
?>
<script language="javascript">
	location = 'CasasList.php';
</script>