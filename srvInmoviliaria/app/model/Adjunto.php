<?php
 class Adjunto {
    var $ID_ADJUNTO;
    var $ID_PROPIEDAD;
    var $TIPO;
    var $DESCRIPCION;
    var $FECHA;
    
    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM adjuntos where id_adjunto = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_PERSONA = $result[0]["ID_ADJUNTO"];
				$this->NOMBRE = $result[0]["ID_PROPIEDAD"];
				$this->PATERNO = $result[0]["TIPO"];
				$this->MATERNO = $result[0]["DESCRIPCION"];
				$this->DNI = $result[0]["FECHA"];
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
			$query = "DELETE FROM adjuntos WHERE id_adjunto = $id";
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
			$query = "SELECT  * FROM adjuntos order by id_adjunto";
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
			$query = "SELECT  * FROM adjuntos where $campo = '$valor' $orden";
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
			$query = "INSERT INTO adjuntos (ID_PROPIEDAD, TIPO, DESCRIPCION, FECHA) 
						VALUES 
						(	'$objeto->ID_PROPIEDAD',
							'$objeto->TIPO',
							'$objeto->DESCRIPCION',
							'$objeto->FECHA'
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