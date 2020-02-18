<?php 
	require_once "config/head_lib.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    //print_r($_POST); die();
    $lote = new Lote($_POST["ID_LOTE_EDIT"]);
    $lote->DETALLE = $_POST["DETALLE_EDIT"];
    $lote->IMAGEN = $_POST["imagenSerializadaEdit"];
    $lote->CUOTA_INICIAL = $_POST["CUOTA_INICIAL_EDIT"];
    $lote->COSTO_TOTAL = $_POST["COSTO_TOTAL_EDIT"];
    $lote->ENLACE = $_POST["enlaceSerializadaEdit"];
    
    $propiedad = new Propiedad($lote->ID_PROPIEDAD);
    
    $propiedad->TIPO = 'LOTE';
    $propiedad->FECHA = date('Y-m-d');
    $propiedad->ESTADO = $_POST["ESTADO_EDIT"];
    
    $idPropiedad = Propiedad::update($propiedad);
    $idLote = Lote::update($lote);
    
?>
	<script language="javascript">
		location = 'LotesList.php?ID=<?php echo $_POST["ID_MANZANO_EDIT"] ?>';
	</script>
