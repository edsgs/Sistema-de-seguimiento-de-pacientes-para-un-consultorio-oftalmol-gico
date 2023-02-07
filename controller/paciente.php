<?php
   require_once("../config/conexion.php");
   require_once("../models/db_paciente.php");
   $paciente = new Paciente();

   switch($_GET["op"]){

      case "listar":
         lecturaListadoPacientes();
      break;

      case "guardaryeditar":
         guardarEditar($_POST);
         
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
               $output["UsoAnteojosLC_idUsoAnteojosLC"] = $row["UsoAnteojosLC_idUsoAnteojosLC"];
               $output["tiempoUso"] = $row["tiempoUso"];
               $output["Localizacion_idLocalizacion"] = $row["Localizacion_idLocalizacion"];
               $output["sintomas"] = $row["sintomas"];
               $output["Inflamacion_idInflamacion"] = $row["Inflamacion_idInflamacion"];
               $output["alteracionesParpados"] = $row["alteracionesParpados"];
               $output["tratamiento"] = $row["tratamiento"];
               $output["fechaConsulta"] = $row["fechaConsulta"];
               $output["Colores_idColores"] = $row["Colores_idColores"];
               $output["Grado_idGrado"] = $row["Grado_idGrado"];
               $output["Rx_idRx"] = $row["Rx_idRx"];
               $output["AgudezaVisual_idAgudezaVisual"] = $row["AgudezaVisual_idAgudezaVisual"];
               $output["Localizacion_idLocalizacion"] = $row["Localizacion_idLocalizacion"];
               $output["Graduacion_idGraduacion"] = $row["Graduacion_idGraduacion"];
               $output["Paciente_idPaciente"] = $row["Paciente_idPaciente"];
               $output["oftalmoscopia"] = $row["oftalmoscopia"];
               $output["diagnosticoRefractivo"] = $row["diagnosticoRefractivo"];
               $output["especificaciones"] = $row["especificaciones"];
               $output["tipoPadecimiento_idtipoPadecimiento"] = $row["tipoPadecimiento_idtipoPadecimiento"];
               $output["descripcion"] = $row["descripcion"];
               $output["tratamientoPadecimiento"] = $row["tratamientoPadecimiento"];
            }
            echo json_encode($output);
         }
      break;

      case "eliminar":
         $datos = $paciente->get_paciente_x_id($_POST["idPaciente"]);
         $_POST['idInflamacion'] = $datos['idInflamacion'];
         $paciente->delete_cuadroclinico($_POST);
         $paciente->delete_tiemUso($_POST);
         $paciente->delete_dolor($_POST);
         $paciente->delete_inflamacion($_POST);
         $paciente->delete_diagnosticovista($_POST);
         $paciente->delete_paciente($_POST);
      break;

   }


function lecturaListadoPacientes(){
   $paciente = new Paciente();
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
      "datosCompletos"=>$datos,
      "aaData"=>$data);
   echo json_encode($results);
}

function guardarEditar($aPost){
   $paciente = new Paciente();
   if(empty($aPost["idPaciente"])){ //Si "idPaciente" esta vacio o no tiene alguna informacion
      $IdPacienteNuevo = $paciente->insert_paciente($aPost); 
      $aPost["Paciente_idPaciente"] = $IdPacienteNuevo;
      //Insert tabla tiempoUso
      $paciente->insert_tiemUso($aPost);
      //Insert tabla dolor
      $IdDolorNuevo = $paciente->insert_dolor($aPost); 
      $aPost["Dolor_idDolor"] = $IdDolorNuevo;
      //Insert tabla inflamacion
      $IdInflamacionNuevo = $paciente->insert_inflamacion($aPost);
      $aPost["Inflamacion_idInflamacion"] = $IdInflamacionNuevo;
      //insert cuadro clinico
      $paciente->insert_cuadroclinico($aPost); 
      //insert refraccion
      $paciente->insert_refraccion($aPost);
      //insert diagnosticovista
      $paciente->insert_diagnosticovista($aPost);
      //insert padecimiento
      $IdPadecimientoNuevo = $paciente->insert_padecimientos($aPost);
      $aPost["Padecimientos_idPadecimientos"] = $IdPadecimientoNuevo;
      //insert pacienteHasPadecimientos
      $paciente->insert_pacienteHasPadecimientos($aPost);

   }else{
      $paciente->update_paciente($aPost);
      $paciente->update_tiemUso($aPost);
      $paciente->update_dolor($aPost);
      $paciente->update_cuadroclinico($aPost);
      $paciente->update_diagnosticovista($aPost);
      $paciente->update_padecimientos($aPost);
      $paciente->update_pacienteHasPadecimientos($aPost);
   }
}