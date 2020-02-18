<?php
 class Urbanizacion {
    var $ID_URBANIZACION;
    var $NOMBRE;
    var $NUMERO_LOTES;
    var $DIMENSION;
    var $UBICACION;
    var $DEPARTAMENTO;
    var $GEOREFERENCIACION;
    var $IMAGEN;
    
    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM urbanizaciones where id_urbanizacion = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_URBANIZACION = $result[0]["ID_URBANIZACION"];
				$this->NOMBRE = $result[0]["NOMBRE"];
				$this->DIMENSION = $result[0]["DIMENSION"];
				$this->NUMERO_LOTES = $result[0]["NUMERO_LOTES"];
				$this->UBICACION = $result[0]["UBICACION"];
				$this->DEPARTAMENTO = $result[0]["DEPARTAMENTO"];
				$this->GEOREFERENCIACION = $result[0]["GEOREFERENCIACION"];
				$this->IMAGEN = $result[0]["IMAGEN"];				
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
			$query = "DELETE FROM urbanizaciones WHERE id_urbanizacion  = $id";
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
			$query = "SELECT  * FROM urbanizaciones order by id_urbanizacion desc";
			//echo $query; die(); 
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
			$query = "SELECT  * FROM urbanizaciones where $campo = '$valor' $orden";
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
			$query = "INSERT INTO urbanizaciones (NOMBRE, DIMENSION, NUMERO_LOTES, UBICACION, DEPARTAMENTO, GEOREFERENCIACION, IMAGEN) 
						VALUES 
						(	'$objeto->NOMBRE',
							'$objeto->DIMENSION',
							'$objeto->NUMERO_LOTES',
							'$objeto->UBICACION',
							'$objeto->DEPARTAMENTO',
							'$objeto->GEOREFERENCIACION',
							'$objeto->IMAGEN'
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
	
 	public static function update($objeto) {
		try {
			$connection = getConnection();            
			$query = "UPDATE urbanizaciones SET 
								NOMBRE = '$objeto->NOMBRE', 
								DIMENSION= '$objeto->DIMENSION', 
								NUMERO_LOTES= '$objeto->NUMERO_LOTES', 
								UBICACION= '$objeto->UBICACION', 
								DEPARTAMENTO= '$objeto->DEPARTAMENTO', 
								GEOREFERENCIACION= '$objeto->GEOREFERENCIACION',
								IMAGEN= '$objeto->IMAGEN'
						WHERE
							ID_URBANIZACION='$objeto->ID_URBANIZACION'";
			//echo $query; die();
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			//print ($connection->lastInsertId()); 
			
        	return $objeto->ID_URBANIZACION; 
			
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
 }
 ?>