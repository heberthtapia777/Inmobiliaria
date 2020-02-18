<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/app_loader.php';

require __DIR__.'/../service/srvToken.php';


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

//require_once __DIR__ . '/../app/lib/db.php';
//$app = new \Slim\App();
//define("MAIN_ACCESS", true);
//require_once __DIR__ . '/../app/lib/db.php';

$app->get('/test', function($req, $res){
    echo "funcionando...";

});

$app->get('/describe/{tabla}', function($req, $res){
    //echo "funcionando...";
    $_tabla = $req->getAttribute('tabla');
    echo $_tabla; 
    switch ($_tabla){
    	case "persona":	$thearray = (array) Persona::getAll(); break;
    	case "contacto":	$thearray = (array) Contacto::getAll(); break;
    	case "urbanizacion":	$thearray = (array) Urbanizacion::getAll(); break;
    	default :	$thearray = null;    	
    }
    echo json_encode($thearray);	
});

$app->get('/', function($req, $res){
    
});

$app->group('/personas', function () use ($app) {
	$app->get('/all', function ($request, $response) {        
        $thearray = (array) Persona::getAll();        
        echo json_encode($thearray);
    });
    $app->get('/{id}', function ($request, $response) {
        $_persona = new Persona($request->getAttribute('id'));
        $thearray = (array) $_persona;        
        echo json_encode($thearray);
        unset($_persona);
    });
    $app->get('/find/{campo}/{valor}', function ($request, $response) {
        $thearray = (array) Persona::getObject($request->getAttribute('campo'),$request->getAttribute('valor'));
        echo json_encode($thearray);
    });
    $app->post("/insert", function($request, $response) use ($app) {
    	$persona = new Persona();
    	$persona->NOMBRE = $request->getParsedBody()['NOMBRE'];
        $persona->PATERNO = $request->getParsedBody()['PATERNO'];
        $persona->MATERNO = $request->getParsedBody()['MATERNO'];
        $persona->DNI = $request->getParsedBody()['DNI'];
        $persona->TELEFONO = $request->getParsedBody()['TELEFONO'];
        $persona->EMAIL = $request->getParsedBody()['EMAIL'];        
        echo Persona::insert($persona);        
    });
    $app->post('/delete', function ($request, $response) {
        Persona::delete($request->getParsedBody()['ID_PERSONA']);
    });
});

$app->group('/usuarios', function () use ($app) {
	$app->get('/all', function ($request, $response) {        
        $thearray = (array) Usuario::getAll();        
        echo json_encode($thearray);
    });
    $app->get('/{id}', function ($request, $response) {
        $_persona = new Persona($request->getAttribute('id'));
        $thearray = (array) $_persona;        
        echo json_encode($thearray);
        unset($_persona);
    });
    $app->get('/find/{campo}/{valor}', function ($request, $response) {
        $thearray = (array) Persona::getObject($request->getAttribute('campo'),$request->getAttribute('valor'));
        echo json_encode($thearray);
    });
    $app->post("/insert", function($request, $response) use ($app) {
    	$persona = new Persona();
    	$persona->NOMBRE = $request->getParsedBody()['NOMBRE'];
        $persona->PATERNO = $request->getParsedBody()['PATERNO'];
        $persona->MATERNO = $request->getParsedBody()['MATERNO'];
        $persona->DNI = $request->getParsedBody()['DNI'];
        $persona->TELEFONO = $request->getParsedBody()['TELEFONO'];
        $persona->EMAIL = $request->getParsedBody()['EMAIL'];        
        echo Persona::insert($persona);        
    });
    $app->post('/delete', function ($request, $response) {
        Persona::delete($request->getParsedBody()['ID_PERSONA']);
    });
});


$app->group('/inmoviliaria', function () use ($app) {    
    $app->get('/test/{nom}', function ($request, $response) {
        $name = $request->getAttribute('nom');
        $response->getBody()->write("testeando acceso inmoviliearia..., hola $name");
    });

    $app->get('/urbanizacion/{id}', function ($request, $response) {
        $id = $request->getAttribute('id');
        //$response->getBody()->write("testeando $id");
        $urbanizacion = new Urbanizacion($id);
        $thearray = (array) $urbanizacion;        
        echo json_encode($thearray);
        unset($urbanizacion);        
    });
    $app->get('/manzano/{id}', function ($request, $response) {
        $id = $request->getAttribute('id');
        //$response->getBody()->write("testeando $id");
        $manzano = new Manzano($id);
        $thearray = (array) $manzano;        
        echo json_encode($thearray);
        unset($manzano);        
    });
    $app->get('/getLotesOfUrbanizacion/{idUrbanizacion}', function ($request, $response) {
        $id = $request->getAttribute('idUrbanizacion');
        //$response->getBody()->write("testeando $id");
        $lotes = Lote::getObject("ID_URBANIZACION", $id);
        $thearray = (array) $lotes;        
        echo json_encode($thearray);
        unset($lotes);        
    });
    $app->get('/getLotesOfManzano/{idManzano}', function ($request, $response) {
        $id = $request->getAttribute('idManzano');
        //$response->getBody()->write("testeando $id");
        $lotes = Lote::getObject("ID_MANZANO", $id);
        $thearray = (array) $lotes;        
        echo json_encode($thearray);
        unset($lotes);        
    });
    

    $app->post("/reg-tencuesta", function($request, $response) use ($app) {
        $codigodepartamento = $request->getParsedBody()['codigodepartamento'];
        $codigoencuestador = $request->getParsedBody()['codigoencuestador'];
        $codigoentidadencuesta = $request->getParsedBody()['codigoentidadencuesta'];
        $estadoregistro = $request->getParsedBody()['estadoregistro'];
        $localidadciudad = $request->getParsedBody()['localidadciudad'];
        $nombreencuestador = $request->getParsedBody()['nombreencuestador'];
        $numeroencuesta = $request->getParsedBody()['numeroencuesta'];
        $numerooficina = $request->getParsedBody()['numerooficina'];
                
        $fechaestado = date("Y-m-d H:i:s");
        $horainicio = date("H:i:s");
        //  $localidadciudad = 
        //  $hora_inicio = $date("")   
        try {
            $connection = getConnection();            
            $query = "insert into encuesta(
                            codigodepartamento,
                            codigoencuestador,
                            codigoentidadencuesta,
                            estadoregistro,
                            fechaestado,
                            horainicio,
                            localidadciudad,                            
                            nombreencuestador,
                            numeroencuesta,
                            numerooficina)
                        values( '$codigodepartamento',
                                '$codigoencuestador',
                                '$codigoentidadencuesta',
                                '$estadoregistro',
                                '$fechaestado',
                                '$horainicio',
                                '$localidadciudad',
                                '$nombreencuestador',
                                '$numeroencuesta',
                                '$numerooficina'
                                )";
            //echo $query;
            $dbh = $connection->prepare($query);          
            $dbh->execute();
            $result = $dbh->fetchAll();

            $query = "select max(idencuesta) from encuesta 
                        where   codigodepartamento='$codigodepartamento' and
                                codigoencuestador='$codigoencuestador' and
                                codigoentidadencuesta='$codigoentidadencuesta' and
                                fechaestado='$fechaestado' and
                                horainicio='$horainicio'";
            $dbh = $connection->prepare($query);          
            $dbh->execute();
            $result = $dbh->fetchAll();
            $idEncuesta = $result[0]["max"];
            echo '{"msg":"100U","id_encuesta":"'.$idEncuesta.'"}';            
            //echo json_encode($result);
            //$response->withHeader('Content-Type', 'application/json')->withStatus(200)->withJson($result, 200, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            $connection = null;                 
        } catch(PDOException $e) {            
            $error['error'] = $e->getMessage();
            $app->halt( 500, json_encode($error['error']) );     
        }
    });

    
    $app->post("/finalizar-tencuesta/{id}", function($request, $response) use ($app) {        
        try {
            $connection = getConnection(); 
            $id = $request->getAttribute('id');
            $query = "update encuesta set estadoregistro='F' where idencuesta=$id";
            echo $query;
            $dbh = $connection->prepare($query);          
            $dbh->execute();
            $result = $dbh->fetchAll();
            echo '{"msg":"100U"}';
        } catch(PDOException $e){
            $error['error'] = $e->getMessage();            
            $app->halt( 500, json_encode($error['error']) );
        }
    });
});

$app->get("/get-token",function($request, $response){
    $usuario  = 'ezsalinas';   
    echo "Token ($usuario): "; 
    echo Auth::SignIn([
            'id' => 1,
            'name' => $usuario,
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);
});

$app->get("/isValid-token/{token}",function($request, $response){
    $token = $request->getAttribute('token');
    try{
        $dato = Auth::GetData($token);
        echo json_encode($dato);
    }catch(\Firebase\JWT\ExpiredException $e){
        echo '{"msg":"Sesion expidara."}';
    }catch(\Exception $e){
        echo '{"msg":"'.$e->getMessage().'"}';
        //echo 'Excepcion no controlada: ',  $e->getMessage(), "\n";
    }
});

//------------------------------USUARIO ----------------------//
// esto dejamelo para mi, efrain:
$app->post("/login", function($request,$response) use ($app) {
    $usuario = $request->getParsedBody()['USUARIO'];
    $password = $request->getParsedBody()['PASS'];
    $id = Usuario::login($usuario,$password);
    if( $id != 0){
    	$usuarioObject = new Usuario($id);
    	$persona = new Persona($usuarioObject->ID_PERSONA);
    	$jsonPersona = json_encode($persona); 
    	$roles = UsuarioRol::getRoles($id);
    	$jsonRoles = json_encode($roles);
    	print( '{	"status":"true",
    				"ID_USUARIO":"'.$usuarioObject->ID_USUARIO.'",
    				"CUENTA":"'.$usuarioObject->CUENTA.'",
    				"FECHA":"'.$usuarioObject->FECHA.'",
    				"ESTADO":"'.$usuarioObject->ESTADO.'",
    				"TOKEN":"'.$usuarioObject->TOKEN.'",
    				"TIEMPO_HORAS":"'.$usuarioObject->TIEMPO_HORAS.'",
    				"TIEMPO_MINUTOS":"'.$usuarioObject->TIEMPO_MINUTOS.'",
    				"PESONA":'.$jsonPersona.',
    				"ROLES":'.$jsonRoles.'
    			}');
    }
    else{
    	echo json_response($mensaje = "Acceso Denegado", $code = 403 );
    }
    	
    /*try {
        $connection = getConnection();            

        $query ="SELECT m.id as idUsuario, 
                    m.codigo_paf as user,
                    m.codigo_entidad as idEntidad,
                    e.nombreentidad as nombreEntidad,
                    e.codigoentidad as codigoEntidad
                FROM muestra m
                    inner join entidad e on (m.codigo_entidad=e.codigoentidad) 
                WHERE codigo_paf = '$usuario' AND clave='$password'";
        $dbh = $connection->prepare($query);               
        $dbh->execute();            
        $result = $dbh->fetchAll();
        //print_r($result);
        if(count($result) > 0){            
            if(count($result) == 1){
                // generamos el token
                $t = Auth::SignIn([
                    'id' => $result[0]["idusuario"],
                    'uid' => $usuario,
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'nombre_entidad' => $result[0]["nombreentidad"],
                    'codigo_entidad'=> $result[0]["codigoentidad"]
                ]);                
                echo '{"msg":"100U","id":"'.$result[0]["idusuario"].'","t":"'.$t.'","nombre_entidad":"'.$result[0]["nombreentidad"].'","codigo_entidad":"'.$result[0]["codigoentidad"].'"}';
            } else{
                echo '{"msg":"101U"}';    
            }
        }else{
            echo '{"msg":"102U"}';    
        }
        
        //$response->withHeader('Content-Type', 'application/json')->withStatus(200)->withJson($result, 200, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);        
        $connection = null;                 
    } catch(PDOException $e) {            
        $error['error'] = $e->getMessage();            
        $app->halt( 500, json_encode($error['error']) );
    } */       
});


$app->run();
?>