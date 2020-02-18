<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Lote.php";
    require_once "../srvInmoviliaria/app/model/Cliente.php";
?>
    <div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Clientes
                        </div>
                        <div class="card-content">
                            <div align=right >
                                <button type="button" class="btn btn-primary" onClick="javascript:location='ClientesAdd.php?ID=<?php echo $_GET["ID"] ?>'" >NUEVO</button>
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <th>Fecha Registro</th>
                                            <th>Estado</th>
                                            <th>Propiedades</th>                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $Data = Cliente::getAll();
                                            foreach($Data as $Index => $Record){             
                                                $propiedades =  PropiedadCliente::getObject("ID_CLIENTE",$Record["ID_CLIENTE"]);                                    
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo ""?></td>
                                                <td><?php echo "" ?></td>
                                                <td class="center"><?php echo "" ?></td>
                                                <td class="center"><?php echo "" ?></td>
                                                
                                                <td class="center">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_LOTE"] ?>)">delete</i>
                                                    <spna></span>
                                                    
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

<?php 
    include "pie.php";
?>
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        }); 
        function eliminar(id){
            if(confirm("Seguro de eliminar el registro?")){
                location = 'LotesDelete.php?ID='+id;
            }
        }
        
</script>
            