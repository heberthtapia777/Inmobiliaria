<?php 
	require_once "../srvInmoviliaria/app/lib/db.php";
    require_once "../srvInmoviliaria/app/model/Contacto.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/UsuarioRol.php";
    require_once "../srvInmoviliaria/app/model/Usuario.php";
    require_once "../srvInmoviliaria/app/model/Persona.php";
    $contacto = new Contacto($_GET["ID"]); 
    $propiedad = new Propiedad($contacto->ID_PROPIEDAD);
     
?>		
		<div class="card">
            <div class="card-content">
                <form class="" autocomplete="off" id="formularioEdit" name="formularioEdit" method = "POST" action="AsignacionEditSave.php">
                    <div class="row">
                        <div class="input--group col s11">
                        	<input id="ID_CONTACTO_EDIT" name="ID_CONTACTO_EDIT" type="hidden" value="<?php echo $contacto->ID_CONTACTO?>">
                            <input id="p" name="p" type="hidden" value="<?php echo $_GET["p"]?>">
                            <input id="a" name="a" type="hidden" value="<?php echo $_GET["a"]?>">
                            <label for="NOMBRE_EDIT">Nombre</label>
                            <input id="NOMBRE_EDIT" name="NOMBRE_EDIT" type="text" value="<?php echo $contacto->NOMBRE_COMPLETO?>" class="form-control" readonly/>
	                    </div>
	                    <div class="input--group col s11">
	                    	<label for="TELEFONO_EDIT">Telefono</label>
	                        <input id="TELEFONO_EDIT" name="TELEFONO_EDIT" type="text" value="<?php echo $contacto->TELEFONO?>" class="form-control" readonly/>
	                    </div>                                   
	                    <div class="input--group col s11">
	                    	<label for="AGENTE_EDIT">seleccione Agente</label>
	                    	<select class="form-control" id="AGENTE_EDIT" name="AGENTE_EDIT">
                                <?php 
                                	$data = UsuarioRol::getObject("ROL", "AGENTE"); 
                                	foreach($data as $Index => $Record){             
                                		$usuario = new Usuario($Record["ID_USUARIO"]);
                                		$persona = new Persona($usuario->ID_PERSONA);
                                ?>
                                <option value="<?php echo $Record["ID_USUARIO"]?>"><?php echo $persona->PATERNO." ".$persona->MATERNO." ".$persona->NOMBRE ?></option>
                                <?php 
                                	} 
                                ?>                                
                            </select>
	                    </div>                                   
                    </div>
                </form>
            </div>
        </div>