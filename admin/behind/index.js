
$("#btnIngresar").click(function(){
    
    
    if($("#USUARIO").val().trim()!="" && $("#PASS").val().trim()!="") {
        //var datos = JSON.stringify($("#login-form").serializeArray());
        
        var datos = $("#login-form").serialize();
       
        var user = $("#USUARIO").val();
        var pass = $("#PASS").val();

        jQuery.getScript("config/config.js").done(function(){
            //console.log(GLOBAL_VARS.srv+'/personas/all');
            /*$.get(GLOBAL_VARS.srv+'/personas/all',{}, function(resp){
                var respuesta = JSON.parse(resp);
                console.log(respuesta);
            });*/
            $.post(GLOBAL_VARS.srv+'/login',{"USUARIO":user,"PASS":pass}, function(resp){
                var respuesta = JSON.parse(resp);
                console.log(respuesta);
                if(respuesta.status){
                    localStorage.setItem('uid', respuesta.ID_USUARIO); 
                    location.href ="link.php?uid="+respuesta.ID_USUARIO; 
                }
                else{
                    alert(respuesta.message);
                }
            });
            /*$.post(GLOBAL_VARS.srv+'/public/login', {"USUARIO":user,"PASS":pass}, function(resp) {
                console.log(resp);
                var respuesta = JSON.parse(resp);
                console.log(respuesta.msg);
                
                /*switch(respuesta.msg){
                    case "101U":    alert("Error 101U, consulte a JTIC"); break;
                    case "102U":    alert("Usuario y/o Password incorresctos"); break;
                    case "100U":    console.log("logueado con: " + respuesta.msg);
                                    console.log("logueado con: " + respuesta.nombre_entidad);
                                    console.log("logueado con: " + respuesta.codigo_entidad);
                                                              
                                    break;
                }
            });*/
        });        
    }
    else{
       alert("Error en Usuario y/o Contraseña!!!")       
    }
});