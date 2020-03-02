<?php
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Departamento.php";
    require_once "../srvInmoviliaria/app/model/Propiedad.php";
?>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
<style>
#mdialTamanio{
  width: 80% !important;
}
#mdialTamanioEdit{
  width: 80% !important;
}
</style>
<div class="dashboard-cards">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Departamentos
                        </div>
                        <div class="card-content">
                            <div align=right >
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoModal">
                            		Nuevo Departamento
								</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Registro</th>
                                            <th>Detalle</th>
                                            <th>Cuota inicial</th>
                                            <th>Costo total</th>
                                            <th>Estado</th>
                                            <th>Datos</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $Data = Departamento::getAll();

                                            foreach($Data as $Index => $Record){
                                                $propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
                                                $capacidad = explode("|",$Record["CAPACIDAD"]);
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $propiedad->FECHA ?></td>
                                                <td><?php echo $Record["DETALLE"] ?></td>
                                                <td><?php echo $Record["CUOTA_INICIAL"] ?></td>
                                                <td><?php echo $Record["COSTO_TOTAL"] ?></td>

						<td class="center"><?php echo $propiedad->ESTADO ?></td>
                                             	<td><?php
                                             		for($i=0;$i<11;$i++){
                                                		$det = explode("=",$capacidad[$i]);
                                             			echo $det[0]." : ".$det[1]."<br>";
                                             		}?>
                                             	</td>
                                                <td class="center">
                                                	<?php if(trim($Record["IMAGEN"])!=""){ ?>
	                                                <button onclick="AbrirImagenes(<?php echo $Record["ID_DEPARTAMENTO"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ImagenesModal">
													  Imagenes
													</button>
													<?php }?>
                                                </td>
                                                <td class="center" width="70px">
                                                    <a href="#EditarModal" data-toggle="modal" data-target="#EditarModal"
                                                		onclick="editar(<?php echo $Record["ID_DEPARTAMENTO"] ?>)">
                                                    	<i class="material-icons" >edit</i>
                                                    </a>
                                                    <a href="#">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_DEPARTAMENTO"] ?>)">delete</i>
                                                    <span></span>
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
      	<div id="DepartamentosView">
		</div>

      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      	</div>
    </div>
  </div>
</div>
<div class="modal fade" id="NuevoModal" tabindex="-1" role="dialog" aria-labelledby="NuevoModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="mdialTamanio" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NuevoModalLongTitle">Nuevo Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php include 'DepartamentosAdd.php'; ?>
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
      <div id="DepartamentosEdit">
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
<script src="behind/DepartamentosList.js"></script>
<?php
    include "pie.php";
?>
