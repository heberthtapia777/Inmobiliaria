<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    
    $urbanizacion = new Urbanizacion($_POST["ID_URABNIZACION_EDIT"]);
    
    $urbanizacion->NOMBRE = $_POST["NOMBRE_EDIT"];
    $urbanizacion->DIMENSION = $_POST["DIMENSION_EDIT"];
    $urbanizacion->NUMERO_LOTES = $_POST["NUMERO_LOTES_EDIT"];
    $urbanizacion->UBICACION = $_POST["UBICACION_EDIT"];
    $urbanizacion->DEPARTAMENTO = $_POST["DEPARTAMENTO_EDIT"];
    $urbanizacion->GEOREFERENCIACION = $_POST["cxE"]."|".$_POST["cyE"];
    $urbanizacion->IMAGEN = $_POST["imagenSerializadaEdit"];
    $idUsuario = Urbanizacion::update($urbanizacion);
    
?>
	<script language="javascript">
		location = 'UrbanizacionesList.php';
	</script>
