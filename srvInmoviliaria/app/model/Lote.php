<?php
 class Lote {
    var $ID_LOTE;
    var $ID_MANZANO;
    var $ID_PROPIEDAD;
    var $DETALLE;
    var $NUMERO_LOTE;
    var $DIMENSION;
    var $IMAGEN;
    var $VIDEO;
    var $ADJUNTOS;
    var $CUOTA_INICIAL;
    var $COSTO_TOTAL;
    var $ENLACE;

    public function __construct($id=""){
    	
        if($id!=""){
	        try {
	        	
	            $connection = getConnection();            
	            
	            $query = "SELECT  * FROM lotes where id_lote = $id ";
	            
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_LOTE = $result[0]["ID_LOTE"];
				$this->ID_MANZANO = $result[0]["ID_MANZANO"];
				$this->ID_PROPIEDAD = $result[0]["ID_PROPIEDAD"];
				$this->DETALLE = $result[0]["DETALLE"];
				$this->NUMERO_LOTE = $result[0]["NUMERO_LOTE"];
				$this->DIMENSION = $result[0]["DIMENSION"];
				$this->IMAGEN = $result[0]["IMAGEN"];
				$this->VIDEO = $result[0]["VIDEO"];
				$this->ADJUNTOS = $result[0]["ADJUNTOS"];
				$this->CUOTA_INICIAL = $result[0]["CUOTA_INICIAL"];
				$this->COSTO_TOTAL = $result[0]["COSTO_TOTAL"];
				$this->ENLACE = $result[0]["ENLACE"];
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
			$query = "DELETE FROM lotes WHERE id_lote  = $id";
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
			$query = "SELECT  * FROM lotes order by id_lote";
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
			$query = "SELECT  * FROM lotes where $campo = '$valor' $orden";
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
			$query = "INSERT INTO lotes (ID_MANZANO, ID_PROPIEDAD, DETALLE, NUMERO_LOTE, DIMENSION, IMAGEN, VIDEO, ADJUNTOS, CUOTA_INICIAL, COSTO_TOTAL, ENLACE) 
						VALUES 
						(	'$objeto->ID_MANZANO',
							'$objeto->ID_PROPIEDAD',
							'$objeto->DETALLE',
							'$objeto->NUMERO_LOTE',
							'$objeto->DIMENSION',
							'$objeto->IMAGEN',
							'$objeto->VIDEO',
							'$objeto->ADJUNTOS',
							'$objeto->CUOTA_INICIAL',
							'$objeto->COSTO_TOTAL',
							'$objeto->ENLACE'							
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
			$query = "UPDATE lotes SET 
							ID_MANZANO = '$objeto->ID_MANZANO',
							ID_PROPIEDAD = '$objeto->ID_PROPIEDAD',
							DETALLE = '$objeto->DETALLE',
							NUMERO_LOTE = '$objeto->NUMERO_LOTE',
							DIMENSION = '$objeto->DIMENSION',
							IMAGEN = '$objeto->IMAGEN',
							VIDEO = '$objeto->VIDEO',
							ADJUNTOS = '$objeto->ADJUNTOS',
							CUOTA_INICIAL = '$objeto->CUOTA_INICIAL',
							COSTO_TOTAL = '$objeto->COSTO_TOTAL',
							ENLACE = '$objeto->ENLACE'							 
						WHERE ID_LOTE='$objeto->ID_LOTE'";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			return $objeto->ID_LOTE; 
			
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}

 }
 ?>