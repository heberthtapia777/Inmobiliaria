<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    $departamento = new Departamento($_GET["ID"]);
    
    Propiedad::delete($departamento->ID_PROPIEDAD);
    Departamento::delete($_GET["ID"]);
?>
<script language="javascript">
	location = 'DepartamentosList.php';
</script>