<?php
   require_once("../config/conexion.php");
   require_once("../models/Paciente.php");
   $paciente = new Paciente();

   switch($_GET["op"]){

      case "listar":
         $datos = $paciente->get_paciente();
         $data = Array();
         foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["nombrePac"]; //Va el nombre de nuestro campo de la BD
            $sub_array[] = $row["fecha_crea"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["idPaciente"].');"  id="'.$row["idPaciente"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["idPaciente"].');"  id="'.$row["idPaciente"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[]=$sub_array;
         }

         $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
         echo json_encode($results);

      break;

      case "guardaryeditar":
         $datos = $paciente->get_paciente_x_id($_POST["idPaciente"]);
         if(empty($_POST["idPaciente"])){ //Si "idPaciente" esta vacio o no tiene alguna informacion
            if(is_array($datos) == true and count($datos) == 0){ //Si la variable "datos" no me trajo ningun registro o ningun array, se realiza el insert
               $paciente->insert_paciente($_POST["nombrePac"],$_POST["apellidoP"],$_POST["apellidoM"],$_POST["edad"],
               $_POST["Sexo_idSexo"],$_POST["Ocupacion_idOcupacion"],$_POST["telefono"],$_POST["calleNumero"],$_POST["colonia"],
               $_POST["cp"],$_POST["ciudad"]); //La variable "paciente" llama a la funcion insert_paciente
            }
         }else{
            $paciente->update_paciente($_POST["idPaciente"], $_POST["nombrePac"], $_POST["apellidoP"], $_POST["apellidoM"],
            $_POST["edad"], $_POST["Sexo_idSexo"], $_POST["Ocupacion_idOcupacion"], $_POST["telefono"], $_POST["calleNumero"],
            $_POST["colonia"], $_POST["cp"], $_POST["ciudad"]);
         }
      break;

      case "mostrar": //Traera todos los datos y los separa en un JSON para que se puedan reutilizar
         $datos = $paciente->get_paciente_x_id($_POST["idPaciente"]);
         if(is_array($datos) == true and count($datos) > 0){
            foreach($datos as $row){
               $output["idPaciente"] = $row["idPaciente"];
               $output["nombrePac"] = $row["nombrePac"];
               $output["apellidoP"] = $row["apellidoP"];
               $output["apellidoM"] = $row["apellidoM"];
               $output["edad"] = $row["edad"];
               $output["Sexo_idSexo"] = $row["Sexo_idSexo"];
               $output["Ocupacion_idOcupacion"] = $row["Ocupacion_idOcupacion"];
               $output["telefono"] = $row["telefono"];
               $output["calleNumero"] = $row["calleNumero"];
               $output["colonia"] = $row["colonia"];
               $output["cp"] = $row["cp"];
               $output["ciudad"] = $row["ciudad"];
            }
            echo json_encode($output);
         }
      break;

      case "eliminar":
         $paciente->delete_paciente($_POST["idPaciente"]);
      break;

   }
?>