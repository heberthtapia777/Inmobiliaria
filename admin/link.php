<?php 
    
	
	require_once "../srvInmoviliaria/app/lib/db.php";
    
	// require_once "../srvInmoviliaria/app/model/Itransaccion.php";    
    
	require_once "../srvInmoviliaria/app/model/Usuario.php";
    
	require_once "../srvInmoviliaria/app/model/UsuarioRol.php";
    require_once "../srvInmoviliaria/app/model/Persona.php";
    
    require_once "config/session.php";

    
    $ID_USUARIO =  $_GET["uid"];

    $usuario = Usuario::getObject("ID_USUARIO",$ID_USUARIO );
    
    if(count($usuario)==1){
        $roles = UsuarioRol::getRoles($ID_USUARIO);
        $cadRoles = "";
        foreach($roles as $Index => $row){
            $cadRoles.= $roles[$Index]["ROL"].",";
        }
        if($cadRoles!="")
            $cadRoles = substr($cadRoles,0, strlen($cadRoles)-1);
        
        $persona = new Persona($usuario[0]["ID_PERSONA"]);
        InicializarSession($ID_USUARIO, $usuario[0]["CUENTA"], $cadRoles , $persona->NOMBRE." ".$persona->PATERNO." ".$persona->MATERNO);
        
        //header("Location: http://sistemasinformaticos.epizy.com/inmobiliaria/admin/central.php");
        header("Location: central.php");
    }
    else{
        die("<script languaje='javascript'>location=history.back()</script>");
    }
?>