<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
    require_once "../srvInmoviliaria/app/model/Manzano.php";
    
    $manzano = new Manzano($_GET["ID"]);
    $urbanizacion = new Urbanizacion($manzano->ID_URBANIZACION);
    
?>
    <div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Urbanizacion: <?php echo $urbanizacion->NOMBRE?>. <br>Manzano: <?php echo $manzano->NOMBRE ?>. <br> Lotes
                        </div>
                        <div class="card-content">
                            <div align=right >
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoLoteModal" onClick="javascript:location='ManzanosList.php?ID=<?php echo $manzano->ID_URBANIZACION ?>';" >Atras</button>
                            
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoLoteModal" onclick="Nuevo(<?php echo $_GET["ID"]?>)">
									Nuevo Lote
								</button>
                            	<!-- 
                                <button type="button" class="btn btn-primary" onClick="javascript:location='LotesAdd.php?ID=<?php echo $_GET["ID"] ?>'" >NUEVO</button>
                            	 -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Numero de Lote</th>
                                            <th>Detalle</th>
                                            <th>Cuota inicial</th>
                                            <th>Costo total</th>                                            
                                            <th>Estado</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $Data = Lote::getObject("ID_MANZANO",$_GET["ID"]);
                                            foreach($Data as $Index => $Record){             
                                                $propiedad = new Propiedad($Record["ID_PROPIEDAD"]);                                    
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $Record["NUMERO_LOTE"] ?></td>
                                                <td><?php echo $Record["DETALLE"] ?></td>
                                                <td><?php echo $Record["CUOTA_INICIAL"] ?></td>
                                                <td><?php echo $Record["COSTO_TOTAL"] ?></td>
                                                <td class="center"><?php echo $propiedad->ESTADO ?></td>
                                                <td class="center">
                                                	<?php if(trim($Record["IMAGEN"])!=""){ ?>
	                                                <button onclick="AbrirImagenes(<?php echo $Record["ID_LOTE"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ImagenesLoteModal">
													  Imagenes
													</button>
													<?php }?>
                                                </td>
                                                <td class="center" width="70px">
                                                    <a href="#EditarLoteModal" data-toggle="modal" data-target="#EditarLoteModal" 
                                                		onclick="editar(<?php echo $Record["ID_LOTE"] ?>)">
                                                    	<i class="material-icons" >edit</i>
                                                    </a>
                                                    
                                                    <a href="#">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_LOTE"] ?>)">delete</i>
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

<div class="modal fade" id="ImagenesLoteModal" tabindex="-1" role="dialog" aria-labelledby="ImagenesLoteModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ImagenesLoteModalLongTitle">Imagenes cargadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div id="LotesView">			
		</div>
      
      	<div class="modal-footer">      	
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>        
      	</div>
    </div>
  </div>
</div>

<div class="modal fade" id="NuevoLoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php include 'LotesAdd.php'; ?>
      <div class="modal-footer">      	
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validar()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarLoteModal" tabindex="-1" role="dialog" aria-labelledby="EditarLoteModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditarLoteModalLongTitle">Actualizar Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="LotesEdit">			
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
<script src="behind/LotesList.js"></script>
<?php 
    include "pie.php";
?>            