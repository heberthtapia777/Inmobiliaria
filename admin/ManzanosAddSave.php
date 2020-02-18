<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
	
    $manzano = new Manzano();
    
    $manzano->ID_URBANIZACION = $_POST["ID_URBANIZACION"] ;
    $manzano->NOMBRE = $_POST["NOMBRE"];
    $manzano->NUMERO_LOTES = $_POST["NUMERO_LOTES"];
    $manzano->GEOREFERENCIACION = $_POST["cx"]."|".$_POST["cy"];
    $manzano->IMAGEN = $_POST["imagenSerializada"];    
    $idManzano = Manzano::insert($manzano);
    
    
    
?>
<script language="javascript">
	location = 'ManzanosList.php?ID=<?php echo $_POST["ID_URBANIZACION"]?>'; 
</script>