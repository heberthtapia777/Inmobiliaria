<?php 
    include "cabecera.php";
    
?>
    <div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Advanced Tables
                        </div>
                        <div class="card-content">
                            <div align=right >
                                <button type="button" class="btn btn-primary" onClick="javascript:location='UsuariosAdd.php'" >NUEVO</button>
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Rol</th>
                                            <th>Fecha</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $Data = Usuario::getAll();
                                            foreach($Data as $Index => $Record){ 
                                                $persona = new Persona($Record["ID_PERSONA"]);
                                                $rolU = UsuarioRol::getRoles($Record["ID_USUARIO"]);
                                                $cadRol = "";
                                                foreach($rolU as $i=> $RecordRol){
                                                    $cadRol.=$RecordRol["ROL"]." ";
                                                }
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $Record["CUENTA"] ?></td>
                                                <td><?php echo $persona->NOMBRE." ".$persona->PATERNO." ".$persona->MATERNO ?></td>
                                                <td><?php echo $cadRol ?></td>
                                                <td class="center"><?php echo $Record["FECHA"] ?></td>
                                                <td class="center">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_USUARIO"] ?>)">delete</i>
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

<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        }); 
        function eliminar(id){
            if(confirm("Seguro de eliminar el registro?")){
                location = 'UsuariosDelete.php?ID='+id;
            }
        }        
</script>

<?php 
    include "pie.php";
?>
            