<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
	require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    $propiedad = new Propiedad();
    $departamento = new Departamento();    
    $propiedad->TIPO = 'DEPARTAMENTO';
    $propiedad->FECHA = date('Y-m-d');
    $propiedad->ESTADO = $_POST["ESTADO"];
    
    $idpropiedad = Propiedad::insert($propiedad);
    
    $departamento->ID_PROPIEDAD = $idpropiedad ;
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
    $departamento->CAPACIDAD = $capacidad;
    $departamento->DETALLE = $_POST["DETALLE"];
    $departamento->GEOREFERENCIACION = $_POST["cx"]."|".$_POST["cy"];
    $departamento->IMAGEN = $_POST["imagenSerializada"];    
    $departamento->CUOTA_INICIAL = $_POST["CUOTA_INICIAL"];    
    $departamento->COSTO_TOTAL = $_POST["COSTO_TOTAL"];    
    $departamento->ENLACE = $_POST["enlaceSerializada"];    
    //print_r($departamento); die();
    $idDepartamento = Departamento::insert($departamento);
?>
<script language="javascript">
	location = 'DepartamentosList.php'; 
</script>