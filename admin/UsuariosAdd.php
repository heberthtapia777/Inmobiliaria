<?php 
    include "cabecera.php";
    
?>
   <div class="col-lg-12">
        <div class="card">
            <div class="card-action">
                Adicion de Usuarios
            </div>
            <div class="card-content">
                <form class="col s12" id="FORMULARIO" method = "POST" action="UsuarioSave.php">
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="NOMBRE" name="NOMBRE" type="text" class="validate">
                            <label for="NOMBRE">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="PATERNO" name="PATERNO" type="text" class="validate">
                            <label for="PATERNO">Apellido Paterno</label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="MATERNO" name="MATERNO" type="text" class="validate">
                            <label for="MATERNO">Apellido Materno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="TELEFONO" name="TELEFONO" type="text" class="validate">
                            <label for="TELEFONO">Telefono</label>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="EMAIL" name="EMAIL" type="text" class="validate">
                            <label for="EMAIL">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="CUENTA" name="CUENTA" type="text" class="validate">
                            <label for="CUENTA">Escriba una cuenta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="CONTRASENIA" name="CONTRASENIA" type="password" class="validate">
                            <label for="CONTRASENIA">Escriba contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="CONTRASENIA2" type="password" class="validate">
                            <label for="CONTRASENIA2">Vuela a Escribir contraseña</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s10">
                            <p>
                            <input name="ADMINISTRADOR" type="radio" id="ADMINISTRADOR" />
                            <label for="ADMINISTRADOR">Administrador</label>
                            </p>
                            <p>
                            <input name="GERENTE" type="radio" id="GERENTE" />
                            <label for="GERENTE">Gerente</label>
                            </p>
                            <p>
                            <input class="with-gap" name="AGENTE" type="radio" id="AGENTE"  />
                            <label for="AGENTE">Agente</label>
                            </p>
                            <p>
                                <input name="CLIENTE" type="radio" id="CLIENTE" />
                                <label for="CLIENTE">Cliente</label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10 center">
                            <button type="button" class="btn btn-primary" onclick="validar()">Grabar</button>
                        </div>
                    </div>
                    
                </form>
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
        function validar(){

            $("#FORMULARIO").submit();   

        } 
</script>