<?php
    require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Usuario.php";
    require_once "../srvInmoviliaria/app/model/UsuarioRol.php";
    require_once "../srvInmoviliaria/app/model/Persona.php";
    require_once "config/session.php";
    
    validarSession();
    $rolArray = explode("-",$_SESSION["ROLES"]);

?>