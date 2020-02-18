<?php 
	require_once "config/head_lib.php";
    
    $usuario = new Usuario($_GET["ID"]);
    Persona::delete($usuario->ID_PERSONA);
    UsuarioRol::delete($usuario->ID_USUARIO);
    Usuario::delete($usuario->ID_USUARIO);    
?>
	<script language="javascript">
		location = 'UsuariosList.php';
	</script>
