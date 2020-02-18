<?php
 class Propiedad {
    var $ID_PROPIEDAD;
    var $TIPO;
    var $FECHA;
    var $ESTADO;

    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM propiedades where id_propiedad = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_PROPIEDAD = $result[0]["ID_PROPIEDAD"];
				$this->TIPO = $result[0]["TIPO"];
				$this->FECHA = $result[0]["FECHA"];
				$this->ESTADO = $result[0]["ESTADO"];				
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
			$query = "DELETE FROM propiedades WHERE id_propiedad = $id";
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
			$query = "SELECT  * FROM propiedades order by id_propiedad";
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
			$query = "SELECT  * FROM propiedades where $campo = '$valor' $orden";
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
			$query = "INSERT INTO propiedades (TIPO, FECHA, ESTADO) 
						VALUES 
						(	'$objeto->TIPO',
							'$objeto->FECHA',
							'$objeto->ESTADO'
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
			$query = "UPDATE propiedades SET 
							TIPO='$objeto->TIPO', 
							FECHA='$objeto->FECHA', 
							ESTADO='$objeto->ESTADO' 
						WHERE ID_PROPIEDAD='$objeto->ID_PROPIEDAD'";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			return $objeto->ID_PROPIEDAD; 
			
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
 }
 ?>