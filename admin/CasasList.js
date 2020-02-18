$(document).ready(function () {
    $('#dataTables-example').dataTable();
    initMap();
    //initMapEditView(0,0,"zz");
    
});

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
		
		//UBICAR EL MARCADOR EN EL MAPA
		markers.push(marcador);
		
		deleteMarkers(markers);
		marcador.setMap(mapa);
	});

}

function initMapEdit(x,y,titulo){
	if(x==0 || y==0)
		var punto = new google.maps.LatLng(-16.499299167397574, -68.1646728515625);
	else		
		var punto = new google.maps.LatLng(x,y);
	var config = {
		zoom:12,
		center:punto,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};		
	mapa = new google.maps.Map( $("#mapaEdit")[0], config );
	var marker = new google.maps.Marker({
	    position: punto,
	    title:titulo
	});

	// To add the marker to the map, call setMap();
	google.maps.event.addListener(mapa, "click", function(event){
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
		formulario.find("input[name='cx_EDIT']").val(lista[0]);
		formulario.find("input[name='cy_EDIT']").val(lista[1]);
		
		//UBICAR EL MARCADOR EN EL MAPA
		//setMapOnAll(null);
		deleteMarkers(markers);
		markers.push(marcador);
		
	});
	deleteMarkers(markers);
	marker.setMap(mapa);
	
	var formulario = $('#formularioEdit');
	//PASAR LAS COORDENADAS AL FORMULARIO
	formulario.find("input[name='cx_EDIT']").val(x);
	formulario.find("input[name='cy_EDIT']").val(y);
}

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
$('#search').on('click', function() {
	// Obtenemos la direcci�n y la asignamos a una variable
	var address = $('#buscar').val();
	// Creamos el Objeto Geocoder
	var geocoder = new google.maps.Geocoder();
	// Hacemos la petici�n indicando la direcci�n e invocamos la funci�n
	// geocodeResult enviando todo el resultado obtenido
	geocoder.geocode({ 'address': address}, geocodeResult);
});

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

function AbrirImagenes(idCasa){
	//console.log("ssss");
	$("#CasasView").load('CasasView.php?ID='+idCasa);	
}
function eliminar(id){
    if(confirm("Seguro de eliminar el registro?")){
        location = 'CasasDelete.php?ID='+id;
    }
}
function editar(id){	
	$("#CasasEdit").load('CasasEdit.php?ID='+id);	
}
function validarEdit(){
    
	var imagenSerializada = "";
	$(".file-preview-image").each(function(index) {
		imagenSerializada = imagenSerializada + $(this).attr('src') + "@";   
	    
	});
	if(imagenSerializada!="")
		imagenSerializada = imagenSerializada.substring(0,imagenSerializada.length-1);

	//console.log(imagenSerializada);
	
	$("#imagenSerializadaEdit").val(imagenSerializada);
    
	//console.log($('.file-preview-image').attr('src'));
    $("#formularioEdit").submit();   

}