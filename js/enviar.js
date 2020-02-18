$('document').ready(function(){

	$(".formulario-contacto").bind("submit", funtion(){

		$.ajax({
			type: $(this).attr("method");
			url: $(this).attr("action");
			data:$(this).serialize(),
			success: function(respuesta) {
				if (respuesta == "OK") {
					$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-success");
					$(".respuesta").html("Enviado");
					$(".mensaje-alerta").html("El mensaje fue enviado correctamente");
				}else{
					$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
					$(".respuesta").html("Error al Enviar");
					$(".mensaje-alerta").html("El mensaje no fue enviado");
				}
				
			},
			error: function() {
				$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
				$(".respuesta").html("Error al Enviar");
				$(".mensaje-alerta").html("El mensaje no fue enviado");
			}
		});


		return false;
	});

});