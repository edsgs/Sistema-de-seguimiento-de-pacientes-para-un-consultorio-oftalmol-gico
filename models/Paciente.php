<?php
  class Paciente extends Conectar{
    public function get_paciente(){ //Para que traiga todos los pacientes
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM paciente";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_paciente_x_id($idPaciente){ //"idPaciente" Mismo nombre que se tiene en la BD para llamar esa informacion
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM paciente WHERE idPaciente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$idPaciente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_paciente($idPaciente){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM paciente WHERE idPaciente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$idPaciente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_paciente($nombrePac,$apellidoP,$apellidoM,$edad,$sexo,$ocupacion,$telefono,$calleNum,$colonia,$cp,$ciudad){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO paciente (idPaciente, nombrePac, apellidoP, apellidoM, edad, Sexo_idSexo, Ocupacion_idOcupacion, telefono, calleNumero, colonia, cp, ciudad, fecha_crea, fecha_modi) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),null)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$nombrePac);
        $sql->bindValue(2,$apellidoP);
        $sql->bindValue(3,$apellidoM);
        $sql->bindValue(4,$edad);
        $sql->bindValue(5,$sexo);
        $sql->bindValue(6,$ocupacion);
        $sql->bindValue(7,$telefono);
        $sql->bindValue(8,$calleNum);
        $sql->bindValue(9,$colonia);
        $sql->bindValue(10,$cp);
        $sql->bindValue(11,$ciudad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_paciente($idPaciente,$nombrePac,$apellidoP,$apellidoM,$edad,$sexo,$ocupacion,$telefono,$calleNum,$colonia,$cp,$ciudad){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE paciente SET nombrePac=?, apellidoP=?, apellidoM=?, edad=?, Sexo_idSexo=?,  Ocupacion_idOcupacion=?, telefono=?, calleNumero=?, colonia=?, cp=?, ciudad=?, fecha_modi=now() WHERE idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$nombrePac);
        $sql->bindValue(2,$apellidoP);
        $sql->bindValue(3,$apellidoM);
        $sql->bindValue(4,$edad);
        $sql->bindValue(5,$sexo);
        $sql->bindValue(6,$ocupacion);
        $sql->bindValue(7,$telefono);
        $sql->bindValue(8,$calleNum);
        $sql->bindValue(9,$colonia);
        $sql->bindValue(10,$cp);
        $sql->bindValue(11,$ciudad);
        $sql->bindValue(12,$idPaciente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

  }

?>