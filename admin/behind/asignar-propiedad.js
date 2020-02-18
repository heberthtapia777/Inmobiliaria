$(document).ready(function () {
    $('#dataTables-example').dataTable();    
});
function Asignacion(id, p, a){
	//alert(a);
	$("#AsignacionEdit").load('AsignacionEdit.php?ID='+id+'&p='+p+'&a='+a);	
}
function validarEdit(){
    $("#formularioEdit").submit();   
}

function Desasignacion(id, p, a){
	//alert(a);
	location = 'AsignacionInit.php?ID='+id+'&p='+p+'&a='+a;
}
