<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){

        case "guardar":
            $datos = $usuario->get_correo_usuario($_POST["usu_correo"]); //Se crea una funcion que traiga el correo del usuario 
          
            if($_POST["usu_pass1"] == $_POST["usu_pass2"]){ //Si pass1 y pass2 son iguales nos permite guardar el registro
                
                if(is_array($datos)==true and count($datos)==0){ //Si el array datos es verdadero y el contenido de datos es igual a 0
                                                 //Es decir que get_correo_usuario no a traido nada se perimte que el usuario se registre
                   
                        $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass1"]);
                }else{ //En caso de que el correo ya se registro
                    echo "correo";
                } 
            }else{ //Cuando no son iguales que nos devuelva un mensaje de error
                echo "pass";
            }
        break;

        case "correo":
            $datos = $usuario->get_correo_usuario($_POST["usu_correo"]);
            echo json_encode( $datos);
        break;

    }

?>