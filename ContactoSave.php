<?php 
	require_once "lib.php"; 
    require_once "srvInmoviliaria/app/model/Contacto.php";
    
    $contacto = new Contacto();
    $contacto->ID_PROPIEDAD = $_POST["ID_PROPIEDAD"];
    $contacto->FECHA = date('Y-m-d');
    $contacto->NOMBRE_COMPLETO = $_POST["NOMBRE_COMPLETO"];
    $contacto->TELEFONO = $_POST["TELEFONO"];
    $contacto->EMAIL = $_POST["EMAIL"];
    $contacto->INTERES = $_POST["INTERES"];
    $contacto->COMENTARIO = $_POST["COMENTARIO"];    
    $idContacto = Contacto::insert($contacto);
?>
<script language="javascript">
	alert("Gracias por el registro...");
	location = 'index.php'; 
</script>