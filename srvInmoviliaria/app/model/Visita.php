<?php
 class Visita {
    var $ID_VISITA;
    var $ID_CLIENTE;
    var $FECHA;
    var $DIRECCION;
    var $DESCRIPCION;
    var $OBSERVACION;
    var $TELEFONO;
    var $EMAIL;
    var $USUARIO_ASIGNADO;

    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM visitas where id_visita = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_VISITA = $result[0]["ID_VISITA"];
				$this->ID_CLIENTE = $result[0]["ID_CLIENTE"];
				$this->FECHA = $result[0]["FECHA"];
				$this->DIRECCION = $result[0]["DIRECCION"];
				$this->DESCRIPCION = $result[0]["DESCRIPCION"];
				$this->OBSERVACION = $result[0]["OBSERVACION"];
				$this->TELEFONO = $result[0]["TELEFONO"];
				$this->EMAIL = $result[0]["EMAIL"];
				$this->USUARIO_ASIGNADO = $result[0]["USUARIO_ASIGNADO"];
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
			$query = "DELETE FROM visitas WHERE id_visita = $id";
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
			$query = "SELECT  * FROM visitas order by id_visita";
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
			$query = "SELECT  * FROM visitas where $campo = '$valor' $orden";
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
			$query = "INSERT INTO visitas (ID_CLIENTE, FECHA, DIRECCION, DESCRIPCION, OBSERVACION, TELEFONO, EMAIL, USUARIO_ASIGNADO) 
						VALUES 
						(	'$objeto->ID_CLIENTE',
							'$objeto->FECHA',
							'$objeto->DIRECCION',
							'$objeto->DESCRIPCION',
							'$objeto->OBSERVACION',
							'$objeto->TELEFONO',
							'$objeto->EMAIL',
							'$objeto->USUARIO_ASIGNADO'
						) ; SELECT LAST_INSERT_ID()";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			//print ($connection->lastInsertId()); 
			
        	return $connection->lastInsertId(); 
			
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
 }
 ?>