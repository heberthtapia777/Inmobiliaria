<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";    
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    $urbanizacion = new Urbanizacion($_GET["ID"]);    
?>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
<style>
#mdialTamanio{
  width: 60% !important;
}
#mdialTamanioEdit{
  width: 60% !important;
}
</style>
<div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Urbanizacion: <?php echo $urbanizacion->NOMBRE?>. <br>Manzanos
                        </div>
                        <div class="card-content">
                            <div align=right >
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoModal" onClick="javascript:location='UrbanizacionesList.php';" >Atras</button>
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoModal" >
                            		Nuevo Manzano
								</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Numero de lotes</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $Data = Manzano::getObject("ID_URBANIZACION",$_GET["ID"]);
                                            
                                            foreach($Data as $Index => $Record){             
                                                
                                        ?>
                                            <tr class="odd gradeX">
                                                <td width="55%"><?php echo $Record["NOMBRE"] ?></td>
                                                <td width="15%"><?php echo $Record["NUMERO_LOTES"] ?></td>
                                                <td class="center" width="10%">
                                                	<?php if(trim($Record["IMAGEN"])!=""){ ?>
	                                                <button onclick="AbrirImagenes(<?php echo $Record["ID_MANZANO"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ImagenesModal">
													  Imagenes
													</button>
													<?php }?>
                                                </td>
                                                <td class="center" width="10%">
                                                	<button onclick="LotesList(<?php echo $Record["ID_MANZANO"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
													  Lotes
													</button>
                                                </td>
                                                <td class="center" width="10%">
                                                    <a href="#EditarModal" data-toggle="modal" data-target="#EditarModal" 
                                                		onclick="editar(<?php echo $Record["ID_MANZANO"] ?>)">
                                                    	<i class="material-icons" >edit</i>
                                                    </a>
                                                    <a href="#">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_MANZANO"] ?>)">delete</i>
                                                    <spna></span>
                                                    </a>                                                    
                                                </td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
            </div>
        </div>
    </div>

<!-- Modales -->

<div class="modal fade" id="ImagenesModal" tabindex="-1" role="dialog" aria-labelledby="ImagenesModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ImagenesModalLongTitle">Imagenes cargadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div id="ManzanosView">			
		</div>
      
      	<div class="modal-footer">      	
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>        
      	</div>
    </div>
  </div>
</div>
<div class="modal fade" id="NuevoModal" tabindex="-1" role="dialog" aria-labelledby="NuevoModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" modal-lg id="mdialTamanio" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NuevoModalLongTitle">Nuevo Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php include 'ManzanosAdd.php'; ?>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validar()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="mdialTamanioEdit" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditarModalLongTitle">Actualizar Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ManzanosEdit">			
	  </div>
      <div class="modal-footer">      	
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validarEdit()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script src="behind/ManzanosList.js"></script>
<?php 
    include "pie.php";
?>