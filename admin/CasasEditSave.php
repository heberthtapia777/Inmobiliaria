<?php
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
	require_once "../srvInmoviliaria/app/model/Propiedad.php";

    $casa = new Casa($_POST["ID_CASA_EDIT"]);
	$propiedad = new Propiedad($casa->ID_PROPIEDAD);

    $propiedad->TIPO = 'CASA';
    $propiedad->FECHA = date('Y-m-d');
    $propiedad->ESTADO = $_POST["ESTADO_EDIT"];
    $idpropiedad = Propiedad::update($propiedad);

    $capacidad = "SUPERFICIE=".$_POST["SUPERFICIE_EDIT"];
    $capacidad.= "|"."PISOS=".$_POST["PISOS_EDIT"];
    $capacidad.= "|"."SERVICIOS=".$_POST["SERVICIOS_EDIT"];
    $capacidad.= "|"."DORMITORIOS=".$_POST["DORMITORIOS_EDIT"];
    $capacidad.= "|"."COCINAS=".$_POST["COCINAS_EDIT"];
    $capacidad.= "|"."COMEDOR=".$_POST["COMEDOR_EDIT"];
    $capacidad.= "|"."SALAS=".$_POST["SALAS_EDIT"];
    $capacidad.= "|"."BANIOS=".$_POST["BANIOS_EDIT"];
    $capacidad.= "|"."LAVANDERIA=".$_POST["LAVANDERIA_EDIT"];
    $capacidad.= "|"."ESTUDIO=".$_POST["ESTUDIO_EDIT"];
    $capacidad.= "|"."OTROS=".$_POST["OTROS_EDIT"];
    $casa->CAPACIDAD = $capacidad;
    $casa->DETALLE = $_POST["DETALLE_EDIT"];
    $casa->GEOREFERENCIACION = $_POST["cx_EDIT"]."|".$_POST["cy_EDIT"];
    $casa->IMAGEN = $_POST["imagenSerializadaEdit"];
    $casa->CUOTA_INICIAL = $_POST["CUOTA_INICIAL_EDIT"];
    $casa->COSTO_TOTAL = $_POST["COSTO_TOTAL_EDIT"];
    $casa->ENLACE = $_POST["enlaceSerializadaEdit"];
    $idCasa = Casa::update($casa);
?>
<script language="javascript">
	location = 'CasasList.php';
</script>
