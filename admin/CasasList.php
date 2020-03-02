<?php
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Casa.php";
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
                             Casas
                        </div>
                        <div class="card-content">
                            <div align=right >
                            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevaCasaModal">
                            		Nueva Casa
								</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Registro</th>
                                            <th>Detalle</th>
                                            <th>Estado</th>
					    <th>Cuota Inicial</th>
                                            <th>Costo Total</th>
                                            <th>Superficie</th>
                                            <th>Pisos</th>
                                            <th>Servicios Basicos</th>
                                            <th>Dormitorios</th>
                                            <th>Cocina</th>
                                            <th>Comedor</th>
                                            <th>Salas</th>
                                            <th>Ba&ntildeos</th>
                                            <th>Lavanderia</th>
                                            <th>Estudio</th>
                                            <th>Otros</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $Data = Casa::getAll();

                                            foreach($Data as $Index => $Record){
                                                $propiedad = new Propiedad($Record["ID_PROPIEDAD"]);
                                                $capacidad = explode("|",$Record["CAPACIDAD"]);
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $propiedad->FECHA ?></td>
                                                <td><?php echo $Record["DETALLE"] ?></td>
                                                <td class="center"><?php echo $propiedad->ESTADO ?></td>
                                                <td class="center"><?php echo $Record["CUOTA_INICIAL"] ?></td>
                                                <td class="center"><?php echo $Record["COSTO_TOTAL"] ?></td>

                                                  <?php for($i=0;$i<11;$i++){
                                                  	$det = explode("=",$capacidad[$i]);?>
                                               	<td class="center"><?php echo $det[1]; ?></td>
                                               	<?php }?>

                                                <td class="center">
                                                	<?php if(trim($Record["IMAGEN"])!=""){ ?>
	                                                <button onclick="AbrirImagenes(<?php echo $Record["ID_CASA"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ImagenesModal">
                        													  Imagenes
                        													</button>
                        													<?php }?>
                                                </td>
                                                <td class="center" width="70px">
                                                    <a href="#EditarModal" data-toggle="modal" data-target="#EditarModal"
                                                		onclick="editar(<?php echo $Record["ID_CASA"] ?>)">
                                                    	<i class="material-icons" >edit</i>
                                                    </a>

                                                    <a href="#">
                                                    <i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_CASA"] ?>)">delete</i>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Imagenes Cargadas</h4>
        </div>
      	<div id="CasasView">
		</div>

      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      	</div>
    </div>
  </div>
</div>

<div class="modal fade" id="NuevaCasaModal" tabindex="-1" role="dialog" aria-labelledby="NuevaCasaModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="mdialTamanio" role="document">
    <div class="modal-content">
        <form class="" autocomplete="off" id="formNew" name="formNew" method="POST" action="CasasAddSave.php"  >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Casa</h4>
            </div>
            <?php include 'CasasAdd.php'; ?>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" >Grabar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="mdialTamanioEdit" role="document">
    <div class="modal-content">
        <form class="" autocomplete="off" id="formularioEdit" name="formularioEdit" method = "POST" action="CasasEditSave.php">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Actualizar Casa</h4>
            </div>
            <div id="CasasEdit">
    	    </div>
            <div class="modal-footer">
          	     <button type="submit" class="btn btn-primary" >Grabar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="behind/CasasList.js"></script>
<!-- <script type="text/javascript" src="behind/ValidateSelect.js"></script> -->

<script>
    $(document).ready(function(){
        $('select').material_select();

        $('select[required]').css({
            position: 'absolute',
            display: 'inline',
            height: 0,
            padding: 0,
            border: '1px solid rgba(255,255,255,0)',
            width: 0
        });

        $( "#formNew" ).validate( {
            rules: {
                TITULO: "required",
                RESUMEN: "required",
                cx: "required",
                cy: "required",
                SUPERFICIE: "required",
                PISOS: "required",
                SERVICIOS: "required",
                DORMITORIOS: "required",
                COCINAS: "required",
                COMEDOR: "required",
                SALAS: "required",
                BANIOS: "required",
                LAVANDERIA: "required",
                ESTUDIO: "required",
                DETALLE:{
                         required: function()
                        {
                            alert("entra");
                         CKEDITOR.instances.cktext.updateElement();
                        },

                         minlength:10
                    },
                username1: {
                    required: true,
                    minlength: 2
                },
                password1: {
                    required: true,
                    minlength: 5
                },
                confirm_password1: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password1"
                },
                email1: {
                    required: true,
                    email: true
                },
                agree1: "required"
            },
            messages: {
                firstname1: "Please enter your firstname",
                lastname1: "Please enter your lastname",
                username1: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email1: "Please enter a valid email address",
                agree1: "Please accept our policy"
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents( ".input-field" ).addClass( "has-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else {
                    error.insertAfter( element );
                }

                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if ( !element.next( "span" )[ 0 ] ) {
                    $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                }

                /**************/

                // position error label after generated textarea
                if (element.is("textarea")) {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element)
                }
            },
            success: function ( label, element ) {
                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if ( !$( element ).next( "span" )[ 0 ] ) {
                    $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".input-field" ).addClass( "has-error" ).removeClass( "has-success" );
                $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".input-field" ).addClass( "has-success" ).removeClass( "has-error" );
                $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                $( element ).parents(".select-wrapper").find('em').remove();
                $( element ).parents(".select-wrapper").find( "span.glyphicon" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
            }
        });

        //deal with copying the ckeditor text into the actual textarea
CKEDITOR.on('instanceReady', function () {
    $.each(CKEDITOR.instances, function (instance) {
        CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
        CKEDITOR.instances[instance].document.on("paste", CK_jQ);
        CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
        CKEDITOR.instances[instance].document.on("blur", CK_jQ);
        CKEDITOR.instances[instance].document.on("change", CK_jQ);
    });
});

function CK_jQ() {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
}

        // $.validate({
        //     form: '#formNew',
        //     lang: 'es',
        //     modules : 'security, modules/logic',
        //     onSuccess : function($form) {
        //       validar();
        //     }
        // });

        // $.validate({
        //     form: '#formularioEdit',
        //     lang: 'es',
        //     modules : 'security, modules/logic',
        //     onSuccess : function($form) {
        //       validarEdit();
        //     }
        // });


    });
</script>

<?php
    include "pie.php";
?>
