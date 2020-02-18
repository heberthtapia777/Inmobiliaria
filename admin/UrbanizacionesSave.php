<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    
    $urbanizacion = new Urbanizacion();
    
    $urbanizacion->NOMBRE = $_POST["NOMBRE"];
    $urbanizacion->DIMENSION = $_POST["DIMENSION"];
    $urbanizacion->NUMERO_LOTES = $_POST["NUMERO_LOTES"];
    $urbanizacion->UBICACION = $_POST["UBICACION"];
    $urbanizacion->DEPARTAMENTO = $_POST["DEPARTAMENTO"];
    $urbanizacion->GEOREFERENCIACION = $_POST["cx"]."|".$_POST["cy"];
    $urbanizacion->IMAGEN = $_POST["imagenSerializada"];
    $idUsuario = Urbanizacion::insert($urbanizacion);
    
?>
	<script language="javascript">
		location = 'UrbanizacionesList.php';
	</script>