<?php
 class Contacto {
    var $ID_CONTACTO;
    var $ID_PROPIEDAD;
    var $USUARIO_ASIGNADO;
    var $FECHA;
	var $NOMBRE_COMPLETO;
    var $TELEFONO;
    var $EMAIL;
    var $INTERES;
    var $COMENTARIO;
    var $FLUJO;
    var $ESTADO;

    public function __construct($id=""){
        if($id!=""){
	        try {
	            $connection = getConnection();            
	            $query = "SELECT  * FROM contactos where id_contacto = $id ";
	            $dbh = $connection->prepare($query);          
	            $dbh->execute();
	            $result = $dbh->fetchAll();
				$this->ID_CONTACTO = $result[0]["ID_CONTACTO"];
				$this->ID_PROPIEDAD = $result[0]["ID_PROPIEDAD"];
				$this->USUARIO_ASIGNADO = $result[0]["USUARIO_ASIGNADO"];
				$this->FECHA = $result[0]["FECHA"];
				$this->NOMBRE_COMPLETO = $result[0]["NOMBRE_COMPLETO"];
				$this->TELEFONO = $result[0]["TELEFONO"];
				$this->EMAIL = $result[0]["EMAIL"];
				$this->INTERES = $result[0]["INTERES"];
				$this->COMENTARIO = $result[0]["COMENTARIO"];
				$this->FLUJO = $result[0]["FLUJO"];
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
			$query = "DELETE FROM contactos WHERE id_contacto  = $id";
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
			$query = "SELECT  * FROM contactos order by id_contacto";
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
			$query = "SELECT  * FROM contactos where $campo = '$valor' $orden";
			
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
			$query = "INSERT INTO contactos (ID_PROPIEDAD, USUARIO_ASIGNADO, FECHA, NOMBRE_COMPLETO, TELEFONO, EMAIL, INTERES, COMENTARIO, FLUJO, ESTADO) 
						VALUES 
						(	'$objeto->ID_PROPIEDAD',
							'$objeto->USUARIO_ASIGNADO',
							'$objeto->FECHA',
							'$objeto->NOMBRE_COMPLETO',
							'$objeto->TELEFONO',
							'$objeto->EMAIL',
							'$objeto->INTERES',
							'$objeto->COMENTARIO',
							'$objeto->FLUJO',
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
			$query = "UPDATE contactos SET 
							ID_PROPIEDAD='$objeto->ID_PROPIEDAD', 
							USUARIO_ASIGNADO='$objeto->USUARIO_ASIGNADO', 
							FECHA='$objeto->FECHA', 
							NOMBRE_COMPLETO='$objeto->NOMBRE_COMPLETO', 
							TELEFONO='$objeto->TELEFONO', 
							EMAIL='$objeto->EMAIL',
							INTERES='$objeto->INTERES',
							COMENTARIO='$objeto->COMENTARIO',
							FLUJO='$objeto->FLUJO',
							ESTADO='$objeto->ESTADO' 
						WHERE ID_CONTACTO = '$objeto->ID_CONTACTO'";
			$stmt = $connection->prepare($query);   
			$connection->beginTransaction();       
			$stmt->execute();
			$connection->commit();
			
			return $objeto->ID_CONTACTO; 
			unset($connection);
        } catch(PDOException $e) {   
        	$connection->rollback();          
            $error['error'] = $e->getMessage();            
            die($error['error']);
        } 
	}

 }
 ?>