<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
	
    $contacto = new Contacto($_POST["ID_CONTACTO_SAVE"]);
    //print_r($_POST); die();
	$contacto->FLUJO = $_POST["FLUJO"];
	$contacto->ESTADO = $_POST["ESTADO"];
    $idContacto = Contacto::update($contacto);
?>
<script language="javascript">
	location = 'propiedadasignada.php'; 
</script>