<?php 
	require_once "config/head_lib.php";
    
    $persona = new Persona();
    $usuario = new Usuario();
    $usuarioRol = new UsuarioRol();

    $persona->NOMBRE = $_POST["NOMBRE"];
    $persona->PATERNO = $_POST["PATERNO"];
    $persona->MATERNO = $_POST["MATERNO"];
    $persona->TELEFONO = $_POST["TELEFONO"];
    $persona->EMAIL = $_POST["EMAIL"];

    $idPersona = Persona::insert($persona);
    $usuario->ID_PERSONA = $idPersona;
    $usuario->CUENTA = $_POST["CUENTA"];
    $usuario->CONTRASENIA = $_POST["CONTRASENIA"];
    $usuario->FECHA = date('Y-m-d');
    $usuario->ESTADO = 'A';

    $idUsuario = Usuario::insert($usuario);
    $usuarioRol->ID_USUARIO = $idUsuario;
    if(isset($_POST["ADMINISTRADOR"]))  $usuarioRol->ROL = "ADMINISTRADOR";
    if(isset($_POST["GERENTE"]))  $usuarioRol->ROL = "GERENTE";
    if(isset($_POST["AGENTE"]))  $usuarioRol->ROL = "AGENTE";
    if(isset($_POST["CLIENTE"]))  $usuarioRol->ROL = "CLIENTE";
    UsuarioRol::insert($usuarioRol);  
	
?>
	<script language="javascript">
		location = 'UsuariosList.php';
	</script>
