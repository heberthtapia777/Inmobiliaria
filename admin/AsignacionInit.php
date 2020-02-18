<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
	
    $contacto = new Contacto($_GET["ID"]);
	$contacto->USUARIO_ASIGNADO = 0;
    $idContacto = Contacto::update($contacto);
?>
<script language="javascript">
	location = 'listar-interesados.php?p=<?php echo $_GET["p"]?>&a=<?php echo $_GET["a"]?>'; 
</script>