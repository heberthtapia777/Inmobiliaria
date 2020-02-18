<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
	
    $contacto = new Contacto($_POST["ID_CONTACTO_EDIT"]);
	$contacto->USUARIO_ASIGNADO = $_POST["AGENTE_EDIT"];
    $idCasa = Contacto::update($contacto);
?>
<script language="javascript">
	location = 'listar-interesados.php?p=<?php echo $_POST["p"]?>&a=<?php echo $_POST["a"]?>'; 
</script>