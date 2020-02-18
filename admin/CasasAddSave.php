<?php
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
	require_once "../srvInmoviliaria/app/model/Propiedad.php";

    $propiedad = new Propiedad();
    $casa = new Casa();
    $propiedad->TIPO = 'CASA';
    $propiedad->FECHA = date('Y-m-d');
    $propiedad->ESTADO = $_POST["ESTADO"];
    $idpropiedad = Propiedad::insert($propiedad);

    $casa->ID_PROPIEDAD = $idpropiedad;
    $capacidad = "SUPERFICIE=".$_POST["SUPERFICIE"];
    $capacidad.= "|"."PISOS=".$_POST["PISOS"];
    $capacidad.= "|"."SERVICIOS=".$_POST["SERVICIOS"];
    $capacidad.= "|"."DORMITORIOS=".$_POST["DORMITORIOS"];
    $capacidad.= "|"."COCINAS=".$_POST["COCINAS"];
    $capacidad.= "|"."COMEDOR=".$_POST["COMEDOR"];
    $capacidad.= "|"."SALAS=".$_POST["SALAS"];
    $capacidad.= "|"."BANIOS=".$_POST["BANIOS"];
    $capacidad.= "|"."LAVANDERIA=".$_POST["LAVANDERIA"];
    $capacidad.= "|"."ESTUDIO=".$_POST["ESTUDIO"];
    $capacidad.= "|"."OTROS=".$_POST["OTROS"];

    $casa->CAPACIDAD = $capacidad;
    $casa->TITULO = $_POST["TITULO"];
    $casa->RESUMEN = $_POST["RESUMEN"];
    $casa->DETALLE = $_POST["DETALLE"];
    $casa->GEOREFERENCIACION = $_POST["cx"]."|".$_POST["cy"];
    $casa->IMAGEN = $_POST["imagenSerializada"];
    $casa->CUOTA_INICIAL = $_POST["CUOTA_INICIAL"];
    $casa->COSTO_TOTAL = $_POST["COSTO_TOTAL"];
    $casa->ENLACE = $_POST["enlaceSerializada"];
    $idCasa = Casa::insert($casa);
?>
<script language="javascript">
    location = 'CasasList.php';
</script>
