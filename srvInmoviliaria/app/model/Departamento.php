<?php
 class Departamento {
    var $ID_DEPARTAMENTO;
    var $ID_PROPIEDAD;
    var $DETALLE;
    var $CAPACIDAD;
    var $GEOREFERENCIACION;
    var $IMAGEN;
    var $CUOTA_INICIAL;
    var $COSTO_TOTAL;
    var $ENLACE;
            
    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM departamentos where id_departamento = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_DEPARTAMENTO = $result[0]["ID_DEPARTAMENTO"];
				$this->ID_PROPIEDAD = $result[0]["ID_PROPIEDAD"];
				$this->DETALLE = $result[0]["DETALLE"];
				$this->CAPACIDAD = $result[0]["CAPACIDAD"];
				$this->GEOREFERENCIACION = $result[0]["GEOREFERENCIACION"];
				$this->IMAGEN = $result[0]["IMAGEN"];
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
			$query = "DELETE FROM departamentos WHERE id_departamento = $id";
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
			$query = "SELECT  * FROM departamentos order by id_departamento";
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
			$query = "SELECT  * FROM departamentos where $campo = '$valor' $orden";
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
			$query = "INSERT INTO departamentos (ID_PROPIEDAD, DETALLE, CAPACIDAD, GEOREFERENCIACION, IMAGEN, CUOTA_INICIAL, COSTO_TOTAL, ENLACE) 
						VALUES 
						(	'$objeto->ID_PROPIEDAD',
							'$objeto->DETALLE',
							'$objeto->CAPACIDAD',
							'$objeto->GEOREFERENCIACION',
							'$objeto->IMAGEN',
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
			$query = "UPDATE departamentos SET 
							ID_PROPIEDAD='$objeto->ID_PROPIEDAD', 
							DETALLE='$objeto->DETALLE', 
							CAPACIDAD='$objeto->CAPACIDAD', 
							GEOREFERENCIACION='$objeto->GEOREFERENCIACION', 
							IMAGEN='$objeto->IMAGEN',
							CUOTA_INICIAL='$objeto->CUOTA_INICIAL' ,
							COSTO_TOTAL='$objeto->COSTO_TOTAL' ,
							ENLACE='$objeto->ENLACE'  
						WHERE ID_DEPARTAMENTO = '$objeto->ID_DEPARTAMENTO'";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			//print ($connection->lastInsertId()); 
			return $objeto->ID_DEPARTAMENTO; 
        				
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}
 }
 ?>