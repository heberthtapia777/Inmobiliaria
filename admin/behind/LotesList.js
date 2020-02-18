$(document).ready(function () {
    
	$('#dataTables-example').dataTable();
}); 

function eliminar(id){
    if(confirm("Seguro de eliminar el registro?")){
        location = 'LotesDelete.php?ID='+id;
    }
}
function editar(id){	
	$("#LotesEdit").load('LotesEdit.php?ID='+id);	
}
function Nuevo(id){
    jQuery.getScript("config/config.js").done(function(){
        $.get(GLOBAL_VARS.srv+'/inmoviliaria/manzano/'+id,{}, function(resp){
            var urbanizacion = JSON.parse(resp);
            console.log(urbanizacion);

			$.get(GLOBAL_VARS.srv+'/inmoviliaria/getLotesOfManzano/'+id,{}, function(respLotes){
				var lotes = JSON.parse(respLotes);
				var maximo = 0;
				 
				for(var i=0; i<lotes.length; i++){
					if(maximo<lotes[i].NUMERO_LOTE){
						maximo = lotes[i].NUMERO_LOTE
					}
				}						
				numeroLote = parseInt(maximo) + 1;
				//console.log(numeroLote);
				if(numeroLote>urbanizacion.NUMERO_LOTES){
					alert("Supero el numero de lotes permitidos, no puede ingresar un nuevo lote");
					$("#NuevoLoteModal").hide();
					//$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					return false;
				}
				else{
					$("#NUMERO_LOTE").val(numeroLote);					
				}
			});
        });	            
    });
}

function AbrirImagenes(idLote){
	//console.log("ssss");
	$("#LotesView").load('LotesView.php?ID='+idLote);
	
}