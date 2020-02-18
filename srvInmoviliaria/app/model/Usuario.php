<?php
 class Usuario {
    var $ID_USUARIO;
    var $ID_PERSONA;
    var $CUENTA;
    var $CONTRASENIA;
    var $FECHA;
    var $ESTADO;
    var $TOKEN;
    var $TIEMPO_HORAS;
    var $TIEMPO_MINUTOS;

    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM usuarios where id_usuario = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_USUARIO = $result[0]["ID_USUARIO"];
				$this->ID_PERSONA = $result[0]["ID_PERSONA"];
				$this->CUENTA = $result[0]["CUENTA"];
				$this->CONTRASENIA = $result[0]["CONTRASENIA"];
				$this->FECHA = $result[0]["FECHA"];
				$this->ESTADO = $result[0]["ESTADO"];
				$this->TOKEN = $result[0]["TOKEN"];
				$this->TIEMPO_HORAS = $result[0]["TIEMPO_HORAS"];
				$this->TIEMPO_MINUTOS = $result[0]["TIEMPO_MINUTOS"];				
	            unset($connection);
	        } catch(PDOException $e) {            
	            $error['error'] = $e->getMessage();            
	            die($error['error']);
	        }	        	
        }
    }
	
	/**
	 * @see ITransaccion::delete()
	 *
	 * @param unknown_type $id
	 */
	public static function delete($id) {
		try {
			$connection = getConnection();            
			$query = "DELETE FROM usuarios WHERE id_usuario = $id";
			$dbh = $connection->prepare($query);
			$dbh->execute();			
			unset($connection);			
			return true;			
        } catch(PDOException $e) {            
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
	
	/**
	 * @see ITransaccion::getAll()
	 *
	 */
	public static function getAll() {
		try {
			$connection = getConnection();            
			$query = "SELECT  * FROM usuarios order by id_usuario";
			$dbh = $connection->prepare($query);          
			$dbh->execute();
			$result = $dbh->fetchAll();
			unset($connection);			
			return $result;			
        } catch(PDOException $e) {            
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
	
	/**
	 * @see ITransaccion::getObject()
	 *
	 * @param unknown_type $id
	 */
	public static function getObject($campo,$valor,$orden="") {
		try {
			$connection = getConnection();            
			$query = "SELECT  * FROM usuarios where $campo = '$valor' $orden";
			$dbh = $connection->prepare($query);          
			$dbh->execute();
			$result = $dbh->fetchAll();
			unset($connection);			
			return $result;			
        } catch(PDOException $e) {            
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
	
	/**
	 * @see ITransaccion::insert()
	 *
	 * @param unknown_type $objeto
	 */
	public static function insert($objeto) {
		try {
			$connection = getConnection();            
			$query = "INSERT INTO usuarios (ID_PERSONA, CUENTA, CONTRASENIA, FECHA, ESTADO, TOKEN, TIEMPO_HORAS, TIEMPO_MINUTOS) 
						VALUES 
						(	'$objeto->ID_PERSONA',
							'$objeto->CUENTA',
							'$objeto->CONTRASENIA',
							'$objeto->FECHA',
							'$objeto->ESTADO',
							'$objeto->TOKEN',
							'$objeto->TIEMPO_HORAS',
							'$objeto->TIEMPO_MINUTOS'
						) ; SELECT LAST_INSERT_ID()";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			return $connection->lastInsertId(); 
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
	
	public static function login($usuario,$password){
		$resultado = Usuario::getObject("CUENTA",$usuario);		
		$encontrado = 0;		
		for ($fila = 0; $fila < count($resultado); $fila++ ){			
			if($resultado[$fila]["CONTRASENIA"]==$password)
				$encontrado = $resultado[$fila]["ID_USUARIO"];
		}
		return $encontrado;
	}
 }
 ?>