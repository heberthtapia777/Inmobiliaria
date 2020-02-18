<?php 
    include "cabecera.php";
    require_once "../srvInmoviliaria/app/model/Urbanizacion.php";
?>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
	<style> 
  	  #mapaV {
	    width: 500px;
	    height: 300px;
	    border: 1px #ccc solid;
	}
	</style> 
	
	<script>
		var mapaV = null; //VARIABLE GENERAL PARA EL MAPA
		
		function initMapView(x,y,titulo){
			var punto = new google.maps.LatLng(x,y);
			var config = {
				zoom:16,
				center:punto,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};		
			mapaV = new google.maps.Map( $("#mapaV")[0], config );
			var marker = new google.maps.Marker({
			    position: punto,
			    title:titulo
			});

			// To add the marker to the map, call setMap();
			marker.setMap(mapaV);
		}
	</script>
	
	<script>
		var map;
		var markers = [];
		var marcadores_bd=[];
		var mapa = null; //VARIABLE GENERAL PARA EL MAPA
		
		function initMap(){
			/* GOOGLE MAPS */
			var formulario = $('#formNew');
			//COODENADAS INICIALES -16.5207007,-68.1615534
			//VARIABLE PARA EL PUNTO INICIAL
			var punto = new google.maps.LatLng(-16.499299167397574, -68.1646728515625);
			//VARIABLE PARA CONFIGURACION INICIAL
			var config = {
				zoom:10,
				center:punto,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
		
			mapa = new google.maps.Map( $("#mapa")[0], config );
		
			google.maps.event.addListener(mapa, "click", function(event){
				//OBTENER COORDENADAS POR SEPARADO
				var coordenadas = event.latLng.toString();
				coordenadas = coordenadas.replace("(", "");
				coordenadas = coordenadas.replace(")", "");
		
				var lista = coordenadas.split(",");
				//alert(lista[0]+"---"+lista[1])
				var direccion = new google.maps.LatLng(lista[0], lista[1]);
				//variable marcador
				var marcador = new google.maps.Marker({
					//titulo: prompt("Titulo del marcador"),
					position: direccion,
					map: mapa, //ENQUE MAPA SE UBICARA EL MARCADOR
					animation: google.maps.Animation.DROP, //COMO APARECERA EL MARCADOR
					draggable: false // NO PERMITIR EL ARRASTRE DEL MARCADOR
					//title:"Hello World!"
				});
		
				//PASAR LAS COORDENADAS AL FORMULARIO
				formulario.find("input[name='cx']").val(lista[0]);
				formulario.find("input[name='cy']").val(lista[1]);
				//UBICAR EL FOCO EN EL CAMPO TITULO
				formulario.find("input[name='addres']").focus();
		
				//UBICAR EL MARCADOR EN EL MAPA
				//setMapOnAll(null);
				markers.push(marcador);
		
				//AGREGAR EVENTO CLICK AL MARCADOR
				google.maps.event.addListener(marcador, "click", function(){
					//alert(marcador.titulo);
				});
				deleteMarkers(markers);
				marcador.setMap(mapa);
			});
		
		}
		
		//FUNCIONES PARA EL GOOGLE MAPS
		
		function deleteMarkers(lista){
			for(i in lista){
				lista[i].setMap(null);
			}
		}
		
		function geocodeResult(results, status) {
			// Verificamos el estatus
			if (status == 'OK') {
				// Si hay resultados encontrados, centramos y repintamos el mapa
				// esto para eliminar cualquier pin antes puesto
				var mapOptions = {
					center: results[0].geometry.location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				//mapa = new google.maps.Map($("#mapa").get(0), mapOptions);
				// fitBounds acercar� el mapa con el zoom adecuado de acuerdo a lo buscado
				mapa.fitBounds(results[0].geometry.viewport);
				// Dibujamos un marcador con la ubicaci�n del primer resultado obtenido
				//var markerOptions = { position: results[0].geometry.location }
				var direccion = results[0].geometry.location;
				var coordenadas = direccion.toString();
		
				coordenadas = coordenadas.replace("(", "");
				coordenadas = coordenadas.replace(")", "");
				var lista = coordenadas.split(",");
		
				//var direccion = new google.maps.LatLng(lista[0], lista[1]);
				//PASAR LAS COORDENADAS AL FORMULARIO
		
				$('#formNew').find("input[name='cx']").val(lista[0]);
				$('#formNew').find("input[name='cy']").val(lista[1]);
				//$('#form').find("input[name='buscar']").val('');
		
				var marcador = new google.maps.Marker({
					position: direccion,
					zoom:15,
					map: mapa, //ENQUE MAPA SE UBICARA EL MARCADOR
					animation: google.maps.Animation.DROP, //COMO APARECERA EL MARCADOR
					draggable: false // NO PERMITIR EL ARRASTRE DEL MARCADOR
				});
				markers.push(marcador);
				deleteMarkers(markers);
				marcador.setMap(mapa);
				//marker.setMap(mapa);
		
			} else {
				// En caso de no haber resultados o que haya ocurrido un error
				// lanzamos un mensaje con el error
				alert("El buscador no tuvo �xito debido a: " + status);
			}
		}

      </script>	
	

<script>
		var map;
		var markers = [];
		var marcadores_bd=[];
		var mapaE = null; //VARIABLE GENERAL PARA EL MAPA
		
		
		function initMapEditView(x,y,titulo){
			var punto = new google.maps.LatLng(x,y);
			var config = {
				zoom:16,
				center:punto,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};		
			mapaE = new google.maps.Map( $("#mapaE")[0], config );
			var marker = new google.maps.Marker({
			    position: punto,
			    title:titulo
			});

			// To add the marker to the map, call setMap();
			google.maps.event.addListener(mapaE, "click", function(event){
				var coordenadas = event.latLng.toString();
				coordenadas = coordenadas.replace("(", "");
				coordenadas = coordenadas.replace(")", "");
		
				var lista = coordenadas.split(",");
				//alert(lista[0]+"---"+lista[1])
				var direccion = new google.maps.LatLng(lista[0], lista[1]);
				//variable marcador
				var marcador = new google.maps.Marker({
					//titulo: prompt("Titulo del marcador"),
					position: direccion,
					map: mapaE, //ENQUE MAPA SE UBICARA EL MARCADOR
					animation: google.maps.Animation.DROP, //COMO APARECERA EL MARCADOR
					draggable: false // NO PERMITIR EL ARRASTRE DEL MARCADOR
					//title:"Hello World!"
				});
		
				//PASAR LAS COORDENADAS AL FORMULARIO
				formulario.find("input[name='cxE']").val(lista[0]);
				formulario.find("input[name='cyE']").val(lista[1]);
				//UBICAR EL FOCO EN EL CAMPO TITULO
				formulario.find("input[name='addresE']").focus();
		
				//UBICAR EL MARCADOR EN EL MAPA
				//setMapOnAll(null);
				deleteMarkers(markers);
				markers.push(marcador);
				
		
				
			});
			deleteMarkers(markers);
			marker.setMap(mapaE);


			
			var formulario = $('#formEdit');
			//PASAR LAS COORDENADAS AL FORMULARIO
			formulario.find("input[name='cxE']").val(x);
			formulario.find("input[name='cyE']").val(y);
			
			
		}
		
		//FUNCIONES PARA EL GOOGLE MAPS
		
		
      </script>	


	
    <div class="dashboard-cards"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-action">
                             Urbanizaciones
                        </div>
                        <div class="card-content">
                            <div align=right >
                            	<button onclick="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevaUrbanizacionModal">
								Nueva Urbanizacion
								</button>
                            
                                <!--  <button type="button" class="btn btn-primary" onClick="javascript:location='UrbanizacionesAdd.php'" >NUEVO</button>
                            	 -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>                                            
                                            <th>Dimension</th>
                                            <th>Numero de Lotes</th>
                                            <th>Ubicacion</th>
                                            <th>Departamento</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $Data = Urbanizacion::getAll();
                                            foreach($Data as $Index => $Record){
                                            	$_X = 0;
                                            	$_Y = 0;
                                            	if(isset($Record["GEOREFERENCIACION"]) && $Record["GEOREFERENCIACION"]!=""){                                            		 	
                                            		$georeferencia = explode("|",$Record["GEOREFERENCIACION"]);
                                            		if(count($georeferencia)==2){
                                            			$_X = $georeferencia[0];
                                            			$_Y = $georeferencia[1];
                                            		}
                                            	}
                                                
                                        ?>
                                            <tr class="odd gradeX">
                                                
                                                <td><?php echo $Record["NOMBRE"] ?></td>
                                                <td><?php echo $Record["DIMENSION"] ?></td>
                                                <td><?php echo $Record["NUMERO_LOTES"] ?></td>
                                                <td><?php echo $Record["UBICACION"] ?></td>
                                                <td><?php echo $Record["DEPARTAMENTO"] ?></td>
                                                <td>
                                                	<?php if(trim($Record["IMAGEN"])!=""){ ?>
	                                                <button onclick="AbrirImagenes(<?php echo $Record["ID_URBANIZACION"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ImagenesModal">
													  Imagenes
													</button>
													<?php }?>
                                                </td>
                                                <td>
                                                <?php if($_X!=0 && $_Y!=0){?>
                                                <button onclick="AbrirMapa(<?php echo $_X?>,<?php echo $_Y?>,'<?php echo $Record["NOMBRE"]?>')" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
												  Ubicacion
												</button>
												<?php }?>
                                                </td>
                                                <td>     
                                                	<button onclick="LotesList(<?php echo $Record["ID_URBANIZACION"] ?>)" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
													  Manzanos
													</button>                                           
                                                	<!-- <a href="#" onclick="LotesList(<?php echo $Record["ID_URBANIZACION"] ?>)">Lotes</a>
                                                	 -->
                                                </td>
                                                <td width="80px" align="center">
                                                	<a href="#EditarUrbanizacionModal" data-toggle="modal" data-target="#EditarUrbanizacionModal" 
                                                		onclick="editar(<?php echo $Record["ID_URBANIZACION"] ?>)">
                                                    	<i class="material-icons" >edit</i>
                                                    </a> 
                                                    <a href="#">
                                                    	<i class="material-icons dp48" onclick="eliminar(<?php echo $Record["ID_URBANIZACION"] ?>)">delete</i>
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
    
    
    <!-- Modal -->
    
<div class="modal fade" id="ImagenesModal" tabindex="-1" role="dialog" aria-labelledby="ImagenesModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ImagenesModalLongTitle">Imagenes cargadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div id="UrbanizacionesView">			
		</div>
      
      	<div class="modal-footer">      	
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>        
      	</div>
    </div>
  </div>
</div>
    
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubicacion Geografica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 330px">
        <div id="mapaV" ></div>
      </div>
      <div class="modal-footer">      	
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="NuevaUrbanizacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva Urbanizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php include 'UrbanizacionesAdd.php'; ?>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validar()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarUrbanizacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Urbanizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="UrbanizacionesEdit"></div>      
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validarEditar()">Grabar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
            	"ordering": false
            });
            initMap();
            //initMapEditView(0,0,"zz");
            
        }); 
        function eliminar(id){
            if(confirm("Seguro de eliminar el registro?")){
                location = 'UrbanizacionesDelete.php?ID='+id;
            }
        }
        function LotesList(id){
            location = 'ManzanosList.php?ID='+id;
        }
        function AbrirMapa(x, y, descripcion){
        	initMapView(x,y, descripcion);
        }
</script>
<script>

function validar(){
	var imagenSerializada = "";
	$(".file-preview-image").each(function(index) {
		imagenSerializada = imagenSerializada + $(this).attr('src') + "@";   
	    
	});
	if(imagenSerializada!="")
		imagenSerializada = imagenSerializada.substring(0,imagenSerializada.length-1);
	
	$("#imagenSerializada").val(imagenSerializada);
    $("#formNew").submit();  
}



        function validarEditar(){

        	var imagenSerializada = "";
        	$(".file-preview-image").each(function(index) {
        		imagenSerializada = imagenSerializada + $(this).attr('src') + "@";   
        	    
        	});
        	if(imagenSerializada!="")
        		imagenSerializada = imagenSerializada.substring(0,imagenSerializada.length-1);

        	$("#imagenSerializadaEdit").val(imagenSerializada);

			//alert($("#imagenSerializadaEdit").val());
            
        	$("#formEdit").submit();  
        }
        
         
        $('#search').on('click', function() {
			// Obtenemos la direcci�n y la asignamos a una variable
			var address = $('#buscar').val();
			// Creamos el Objeto Geocoder
			var geocoder = new google.maps.Geocoder();
			// Hacemos la petici�n indicando la direcci�n e invocamos la funci�n
			// geocodeResult enviando todo el resultado obtenido
			geocoder.geocode({ 'address': address}, geocodeResult);
		});

		function editar(id){
			$("#UrbanizacionesEdit").load('UrbanizacionesEdit.php?ID='+id);	
			
			/*
			jQuery.getScript("config/config.js").done(function(){
	            $.get(GLOBAL_VARS.srv+'/inmoviliaria/urbanizacion/'+id,{}, function(resp){
	                var respuesta = JSON.parse(resp);
	                console.log(respuesta);
	                $("#ID_URABNIZACION_EDIT").val(respuesta.ID_URBANIZACION);
	                $("#NOMBRE_EDIT").val(respuesta.NOMBRE);
	                $("#DIMENSION_EDIT").val(respuesta.DIMENSION);
	                $("#NUMERO_LOTES_EDIT").val(respuesta.NUMERO_LOTES);
	                $("#UBICACION_EDIT").val(respuesta.UBICACION);
	                $("#DEPARTAMENTO_EDIT").val(respuesta.DEPARTAMENTO);
	                var georeferenciacion = respuesta.GEOREFERENCIACION.split("|");
	                if(georeferenciacion.length>1){
	                	initMapEditView(georeferenciacion[0],georeferenciacion[1],respuesta.NOMBRE);
					}
	                document.getElementById("NOMBRE_EDIT").focus();
	                $("#imagenSerializadaEdit").val(respuesta.IMAGEN); 
					
					var imagenes = respuesta.IMAGEN.split("@");
					console.log(imagenes.length);
					var arrayImagenes = new array(imagenes.length);
					
					//for(var i=0; i<imagenes.length; i++){
					//	arrayImagenes[i] = "<img src='"+imagenes[0]+"' height='50px' class='file-preview-image'>";
					///}
					//console.log(arrayImagenes);
					
	                $("#archivos_EDIT").fileinput({
	                	uploadUrl: "upload.php?ID=", 
	                    uploadAsync: false,
	                    minFileCount: 1,
	                    maxFileCount: 20,
	                	showUpload: false, 
	                	showRemove: false,
	                	initialPreview: ["<img src='imagenes_/U15|cliente-windows.png' height='50px' class='file-preview-image'>",],
	                    initialPreviewConfig: ['U15|cliente-windows.png']
	                	}).on("filebatchselected", function(event, files) {
	                			
	                	$("#archivos_EDIT").fileinput("upload");	
	                }); 

	                
	                //$("#NOMBRE_EDIT").select();
	                
	                /*if(respuesta.status){
	                    localStorage.setItem('uid', respuesta.ID_USUARIO); 
	                    location.href ="link.php?uid="+respuesta.ID_USUARIO; 
	                }
	                else{
	                    alert(respuesta.message);
	                }
	            });	            
	        });	
	        */		
		}

		function AbrirImagenes(id){
			//console.log("ssss");
			$("#UrbanizacionesView").load('UrbanizacionesView.php?ID='+id);	
		}
				
		
</script>

<?php 
    include "pie.php";
?>