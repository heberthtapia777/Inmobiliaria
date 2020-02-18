<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
	
	$manzano = new Manzano($_POST["ID_MANZANO_EDIT"]);
	    
    $manzano->NOMBRE = $_POST["NOMBRE_EDIT"];
    $manzano->GEOREFERENCIACION = $_POST["cx_EDIT"]."|".$_POST["cy_EDIT"];
    $manzano->IMAGEN = $_POST["imagenSerializadaEdit"]; 
    $manzano->NUMERO_LOTES = $_POST["NUMERO_LOTES_EDIT"];
    $idManzano = Manzano::update($manzano);
    
    
?>
<script language="javascript">
	location = 'ManzanosList.php?ID=<?php echo $manzano->ID_URBANIZACION?>'; 
</script>