<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
	require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
	$departamento = new Departamento($_POST["ID_DEPARTAMENTO_EDIT"]);
	$propiedad = new Propiedad($departamento->ID_PROPIEDAD);
        
    $propiedad->TIPO = 'DEPARTAMENTO';
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
    $departamento->CAPACIDAD = $capacidad;
    $departamento->DETALLE = $_POST["DETALLE_EDIT"];
    $departamento->GEOREFERENCIACION = $_POST["cx_EDIT"]."|".$_POST["cy_EDIT"];
    $departamento->IMAGEN = $_POST["imagenSerializadaEdit"]; 
    $departamento->CUOTA_INICIAL = $_POST["CUOTA_INICIAL_EDIT"];
    $departamento->COSTO_TOTAL = $_POST["COSTO_TOTAL_EDIT"];    
    $departamento->ENLACE = $_POST["enlaceSerializadaEdit"];    
    $idDepartamento = Departamento::update($departamento);
?>
<script language="javascript">
	location = 'DepartamentosList.php'; 
</script>