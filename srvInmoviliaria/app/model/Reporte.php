<?php
 class Reporte {
    
    public static function getListadoPropiedadesPorEstado($estado,$tipo) {
		try {
			$connection = getConnection();
			
			switch ($tipo){
				case "CASA": 
							$query = "select p.FECHA, d.DETALLE, d.CUOTA_INICIAL, d.COSTO_TOTAL, '-' AS NUMERO_LOTE  
										from propiedades p inner join casas d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
											where p.TIPO='$tipo' and p.ESTADO='$estado'";
							break;
				case "DEPARTAMENTO": 
							$query = "select p.FECHA, d.DETALLE, d.CUOTA_INICIAL, d.COSTO_TOTAL, '-' AS NUMERO_LOTE  
										from propiedades p inner join departamentos d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
											where p.TIPO='$tipo' and p.ESTADO='$estado'";
							break;
				case "LOTE": 
							$query = "select p.FECHA, d.DETALLE, d.CUOTA_INICIAL, d.COSTO_TOTAL, d.NUMERO_LOTE 
										from propiedades p inner join lotes d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
											where p.TIPO='$tipo' and p.ESTADO='$estado'";
							break;
											
			}
			
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

	
 	public static function getListadoPropiedadesMasVisitados($estado,$tipo) {
		try {
			$connection = getConnection();
			
			switch ($tipo){
				case "CASA": 
							$query = "select c.ID_PROPIEDAD, COUNT(c.ID_PROPIEDAD) as CANTIDAD from propiedades p
											inner join casas d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
										    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
											where p.TIPO='CASA' AND c.FLUJO = 'VISITA AGENDADA' 	
										group by c.ID_PROPIEDAD
										order by COUNT(c.ID_PROPIEDAD) desc ";
							break;
				case "DEPARTAMENTO": 
							$query = "select c.ID_PROPIEDAD, COUNT(c.ID_PROPIEDAD) as CANTIDAD from propiedades p
											inner join departamentos d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
										    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
											where p.TIPO='DEPARTAMENTO' AND c.FLUJO = 'VISITA AGENDADA' 	
										group by c.ID_PROPIEDAD
										order by COUNT(c.ID_PROPIEDAD) desc	";
							break;
				case "LOTE": 
							$query = "select c.ID_PROPIEDAD, COUNT(c.ID_PROPIEDAD) as CANTIDAD from propiedades p
											inner join lotes d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
										    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
											where p.TIPO='LOTE' AND c.FLUJO = 'VISITA AGENDADA'	
										group by c.ID_PROPIEDAD
										order by COUNT(c.ID_PROPIEDAD) desc ";
							break;
											
			}
			
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
	
     public static function getListadoAgentesMasContactados($fechaInicio,$fechaFin) {
		try {
			$connection = getConnection();
						
			$query = "select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join casas d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='CASA'
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'CONTACTADO'
						group by c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO
						
						union
						
						select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join departamentos d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='DEPARTAMENTO' 
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'CONTACTADO'
						group by c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO
						
						union
						
						select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join lotes d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='LOTE' 
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'CONTACTADO'
						group by c.ID_PROPIEDAD, c.FECHA, c.NOMBRE_COMPLETO
						
						order by COUNT(*) desc";
			
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
	
 
     public static function getListadoAgentesMasVisitados($fechaInicio,$fechaFin) {
		try {
			$connection = getConnection();
						
			$query = "select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join casas d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='CASA'
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'VISITA AGENDADA'
						group by c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO
						
						union
						
						select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join departamentos d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='DEPARTAMENTO' 
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'VISITA AGENDADA'
						group by c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO
						
						union
						
						select c.USUARIO_ASIGNADO, c.FECHA, c.NOMBRE_COMPLETO, COUNT(*) as CANTIDAD from propiedades p
							inner join lotes d on (p.ID_PROPIEDAD = d.ID_PROPIEDAD)
						    inner join contactos c on (c.ID_PROPIEDAD = p.ID_PROPIEDAD)
							where c.USUARIO_ASIGNADO <> 0 AND p.TIPO='LOTE' 
									AND c.FECHA between '$fechaInicio' AND '$fechaFin'
									AND c.FLUJO = 'VISITA AGENDADA'
						group by c.ID_PROPIEDAD, c.FECHA, c.NOMBRE_COMPLETO
						
						order by COUNT(*) desc";
			
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
	
	
 }
 ?>