<?php
 class PropiedadCliente {
    var $ID_PROPIEDAD_CLIENTE;
    var $ID_PROPIEDAD;
    var $ID_CLIENTE;
    var $ESTADO;
    var $FECHA;
    
    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM propiedad_clientes where id_propiedad_cliente = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_PROPIEDAD_CLIENTE = $result[0]["ID_PROPIEDAD_CLIENTE"];
				$this->ID_PROPIEDAD = $result[0]["ID_PROPIEDAD"];
				$this->ID_CLIENTE = $result[0]["ID_CLIENTE"];
				$this->ESTADO = $result[0]["ESTADO"];
				$this->FECHA = $result[0]["FECHA"];
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
			$query = "DELETE FROM propiedad_clientes WHERE id_propiedad_cliente = $id";
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
			$query = "SELECT  * FROM propiedad_clientes order by id_propiedad_cliente";
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
			$query = "SELECT  * FROM propiedad_clientes where $campo = '$valor' $orden";
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
			$query = "INSERT INTO propiedad_clientes (ID_PROPIEDAD, ID_CLIENTE, ESTADO, FECHA) 
						VALUES 
						(	'$objeto->ID_PROPIEDAD',
							'$objeto->ID_CLIENTE',
							'$objeto->ESTADO',
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