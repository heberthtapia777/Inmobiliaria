<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    
    
    
    
    $propiedad = new Propiedad();
    $lote = new Lote();

    $propiedad->TIPO = 'LOTE';
    $propiedad->FECHA = date('Y-m-d');
    $propiedad->ESTADO = $_POST["ESTADO"];
    $idpropiedad = Propiedad::insert($propiedad);
    
    $lote->ID_MANZANO = $_POST["ID_MANZANO"];
    $lote->ID_PROPIEDAD = $idpropiedad;
    $lote->DETALLE = $_POST["DETALLE"];
    $lote->NUMERO_LOTE = $_POST["NUMERO_LOTE"];
    $lote->IMAGEN = $_POST["imagenSerializada"];
    $lote->CUOTA_INICIAL = $_POST["CUOTA_INICIAL"];
    $lote->COSTO_TOTAL = $_POST["COSTO_TOTAL"];
    $lote->ENLACE = $_POST["enlaceSerializada"];
    //$urbanizacion->DEPARTAMENTO = $_POST["DEPARTAMENTO"];
    
    $idLote = Lote::insert($lote);    
?>
	<script language="javascript">
		location = 'LotesList.php?ID=<?php echo $_POST["ID_MANZANO"] ?>';
	</script>
