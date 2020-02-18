<?php

    /*if ( !defined("MAIN_ACCESS") ) {
        header('HTTP/1.1 403 Forbiden');
        echo "You shall not pass!";
        die();
    }*/
    /*
    function getConnection() {
        try {
            $db_host = "sql211.epizy.com";
            $db_database = "epiz_22312863_inmoviliariadb";
            $db_username = "epiz_22312863";
            $db_password = "JHjcSLMc2tLBBF";
            $connection = new PDO("mysql:host=$db_host;dbname=$db_database", $db_username, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            header('HTTP/1.1 501 Internal Server Error');
            $msgError = array();
            $msgError['status'] = "error";
            $msgError['type'] = "database conexion";
            $msgError['longDesc'] = $error->getMessage();
            echo json_encode($msgError);
            die();
        }
        return $connection;
    }
	*/

    /*function getConnection() {
        try {
            $db_host = "localhost";
            $db_database = "epiz_22312863_inmoviliariadb";
            $db_username = "root";
            $db_password = "";
            $connection = new PDO("mysql:host=$db_host;dbname=$db_database", $db_username, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            header('HTTP/1.1 501 Internal Server Error');
            $msgError = array();
            $msgError['status'] = "error";
            $msgError['type'] = "database conexion";
            $msgError['longDesc'] = $error->getMessage();
            echo json_encode($msgError);
            die();
        }
        return $connection;
    }*/

    function getConnection() {
        try {
            /*$db_host = "gator4225.hostgator.com";
            $db_database = "hosting_inmoproy";
            $db_username = "hosting_inmoAdmi";
            $db_password = "jXd#94{,Di%t";*/

            $db_host = "localhost";
            $db_database = "bd_inmobiliaria";
            $db_username = "root";
            $db_password = "mysql";

            $connection = new PDO("mysql:host=$db_host;dbname=$db_database", $db_username, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            header('HTTP/1.1 501 Internal Server Error');
            $msgError = array();
            $msgError['status'] = "error";
            $msgError['type'] = "database conexion";
            $msgError['longDesc'] = $error->getMessage();
            echo json_encode($msgError);
            die();
        }
        return $connection;
    }

    /*
    function testGetConnection(){
        getConnection();
    }
    testGetConnection();
    echo "ok";
    */
?>
