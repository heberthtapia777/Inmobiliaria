<?php 
    function InicializarSession($idUsuario,$usuario='', $roles='', $datosPersonales=''){
        $_SESSION = array();
        session_set_cookie_params(0,"/");
        //init_set("session.gc_maxlifetime",50000);
        session_start();
        $_SESSION['LAST_LOGIN']=time();
        $_SESSION['ID_USUARIO']=$idUsuario; 
        $_SESSION['USUARIO']=$usuario;
        $_SESSION['ROLES']=$roles;
        $_SESSION['NOMBRE_COMPLETO']=$datosPersonales;
        $value = "Efracho";
        setcookie("TestCookie_dos", $value, time()+3600);
        $virtual = array();
    }

function validarSession(){
        //init_set("session.gc_maxlifetime",50000);
if(isset($_COOKIE['PHPSESSID'])){
            //init_set("session.gc_maxlifetime",50000);
session_start();
            if(isset($_SESSION['LAST_LOGIN']) && (time() - $_SESSION['LAST_LOGIN'] > 129600000)){
                if(isset($_COOKIE[session_name()])){
                    setcookie(session_name(),"",time()-360000,"/");
                    session_unset();
                    session_destroy();
                }
                echo "Tiempo expirado...";
                exit;
            }
}
else{
            echo "Acceso denegado";
            die();            
}
}

function finalizarSession(){
session_start();
$_COOKIE["PHPSESSID"] = array();
}
?>