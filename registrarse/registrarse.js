function init(){
    $("#usuario_form").on("submit",function(e){ //Sirve para cuando el usuario de mas de un click no se guarde repetidas veces
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]); //"formData" es lo que se declaron en la clase "index"
                            
    $.ajax({
        url: "../controller/usuario.php?op=guardar", //ruta a la cual se direcciona a la clase usuario del controller
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            if (datos=="pass"){
                Swal.fire(
                    'Consultorio Oftalmológico',
                    'Error Contraseñas no Coinciden',
                    'error'
                );
            }else if (datos=="correo"){
                Swal.fire(
                    'Consultorio Oftalmológico',
                    'La cuenta de correo electronico ya existe, intente recuperar su contraseña',
                    'error'
                );
            }else{
                Swal.fire(
                    'Consultorio Oftalmológico',
                    'Se registro Correctamente',
                    'success'
                );
    
                var usu_correo = $('#usu_correo').val();
                $.post("../controller/email.php?op=send_nuevo", { usu_correo : usu_correo}, function(data){
                
                });

            }
            $('#usuario_form')[0].reset();
        }
    });
}

init();