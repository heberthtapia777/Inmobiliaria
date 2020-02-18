<?php
 class Manzano {
    var $ID_MANZANO;
    var $ID_URBANIZACION;
    var $NOMBRE;
    var $NUMERO_LOTES;
    var $GEOREFERENCIACION;
    var $IMAGEN;
    
    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM manzanos where id_manzano = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_MANZANO = $result[0]["ID_MANZANO"];
				$this->ID_URBANIZACION = $result[0]["ID_URBANIZACION"];
				$this->NOMBRE = $result[0]["NOMBRE"];
				$this->NUMERO_LOTES = $result[0]["NUMERO_LOTES"];
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
			$query = "DELETE FROM manzanos WHERE id_manzano = $id";
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
			$query = "SELECT  * FROM manzanos order by id_manzano";
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
			$query = "SELECT  * FROM manzanos where $campo = '$valor' $orden";
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
			$query = "INSERT INTO manzanos (ID_URBANIZACION, NOMBRE, NUMERO_LOTES, GEOREFERENCIACION, IMAGEN) 
						VALUES 
						(	'$objeto->ID_URBANIZACION',
							'$objeto->NOMBRE',
							'$objeto->NUMERO_LOTES',
							'$objeto->GEOREFERENCIACION',
							'$objeto->IMAGEN'
						) ; SELECT LAST_INSERT_ID()";
			//$connection->beginTransaction();
			$stmt = $connection->prepare($query);   
			//       
			$stmt->execute();
			//$connection->commit();
			
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
			$query = "UPDATE manzanos SET 
								ID_URBANIZACION = '$objeto->ID_URBANIZACION', 
								NOMBRE= '$objeto->NOMBRE', 
								NUMERO_LOTES= '$objeto->NUMERO_LOTES', 
								GEOREFERENCIACION= '$objeto->GEOREFERENCIACION',
								IMAGEN= '$objeto->IMAGEN'
						WHERE
							ID_MANZANO='$objeto->ID_MANZANO'";
			//echo $query; die();
			$stmt = $connection->prepare($query);   
			//$connection->beginTransaction();       
			$stmt->execute();
			//$connection->commit();
			
			//print ($connection->lastInsertId()); 
			
        	return $objeto->ID_MANZANO; 
			
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
 }
 ?>