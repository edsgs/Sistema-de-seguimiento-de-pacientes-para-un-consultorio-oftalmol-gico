<?php
  class Paciente extends Conectar{
    public function get_paciente(){ //Para que traiga todos los pacientes
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM paciente;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_paciente_x_id($idPaciente){ //"idPaciente" Mismo nombre que se tiene en la BD para llamar esa informacion
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM paciente 
        join tiempouso on paciente.idPaciente=tiempouso.Paciente_idPaciente
        join cuadroclinico on paciente.idPaciente=cuadroclinico.Paciente_idPaciente
        join dolor on cuadroclinico.Dolor_idDolor=dolor.idDolor
        join refraccion on dolor.Localizacion_idLocalizacion=refraccion.Localizacion_idLocalizacion
        join diagnosticovista on paciente.idPaciente=diagnosticovista.Paciente_idPaciente
        join paciente_has_padecimientos on paciente.idPaciente=paciente_has_padecimientos.Paciente_idPaciente
        join padecimientos on paciente_has_padecimientos.Padecimientos_idPadecimientos=padecimientos.idPadecimientos
        WHERE idPaciente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$idPaciente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_paciente($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM paciente WHERE idPaciente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_tiemUso($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM tiempouso WHERE Paciente_IdPaciente= ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_dolor($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM dolor WHERE idDolor= ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_inflamacion($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM inflamacion WHERE idInflamacion= ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idInflamacion']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_cuadroclinico($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM cuadroclinico WHERE Paciente_IdPaciente= ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_diagnosticovista($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM diagnosticovista WHERE Paciente_IdPaciente= ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_paciente($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO paciente (nombrePac, apellidoP, apellidoM, edad, Sexo_idSexo, Ocupacion_idOcupacion, telefono, calleNumero, colonia, cp, ciudad, fecha_crea, fecha_modi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),null)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['nombrePac']);
        $sql->bindValue(2,$aPost['apellidoP']);
        $sql->bindValue(3,$aPost['apellidoM']);
        $sql->bindValue(4,$aPost['edad']);
        $sql->bindValue(5,$aPost['Sexo_idSexo']);
        $sql->bindValue(6,$aPost['Ocupacion_idOcupacion']);
        $sql->bindValue(7,$aPost['telefono']);
        $sql->bindValue(8,$aPost['calleNumero']);
        $sql->bindValue(9,$aPost['colonia']);
        $sql->bindValue(10,$aPost['cp']);
        $sql->bindValue(11,$aPost['ciudad']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function insert_tiemUso($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tiempouso (Paciente_idPaciente, UsoAnteojosLC_idUsoAnteojosLC, tiempoUso) VALUES (?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Paciente_idPaciente']);
        $sql->bindValue(2,$aPost['UsoAnteojosLC_idUsoAnteojosLC']);
        $sql->bindValue(3,$aPost['tiempoUso']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_dolor($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO dolor (Localizacion_idLocalizacion, sintomas) VALUES (?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Localizacion_idLocalizacion']);
        $sql->bindValue(2,$aPost['sintomas']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function insert_inflamacion($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inflamacion (Localizacion_idLocalizacion) VALUES (?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Localizacion_idLocalizacion']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function insert_cuadroclinico($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO cuadroclinico (Paciente_idPaciente, Dolor_idDolor, Inflamacion_idInflamacion, alteracionesParpados, tratamiento, fechaConsulta, Colores_idColores, Grado_idGrado) VALUES (?, ?, ?, ?, ?, ? , ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Paciente_idPaciente']);
        $sql->bindValue(2,$aPost['Dolor_idDolor']);
        $sql->bindValue(3,$aPost['Inflamacion_idInflamacion']);
        $sql->bindValue(4,$aPost['alteracionesParpados']);
        $sql->bindValue(5,$aPost['tratamiento']);
        $sql->bindValue(6,$aPost['fechaConsulta']);
        $sql->bindValue(7,$aPost['Colores_idColores']);
        $sql->bindValue(8,$aPost['Grado_idGrado']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_refraccion($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO refraccion (Rx_idRx, AgudezaVisual_idAgudezaVisual, Localizacion_idLocalizacion, Graduacion_idGraduacion) VALUES (?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Rx_idRx']);
        $sql->bindValue(2,$aPost['AgudezaVisual_idAgudezaVisual']);
        $sql->bindValue(3,$aPost['Localizacion_idLocalizacion']);
        $sql->bindValue(4,$aPost['Graduacion_idGraduacion']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_diagnosticovista($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO diagnosticovista (Paciente_idPaciente, UsoAnteojosLC_idUsoAnteojosLC, Refraccion_idRx, oftalmoscopia, diagnosticoRefractivo, especificaciones) VALUES (?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Paciente_idPaciente']);
        $sql->bindValue(2,$aPost['UsoAnteojosLC_idUsoAnteojosLC']);
        $sql->bindValue(3,$aPost['Rx_idRx']);
        $sql->bindValue(4,$aPost['oftalmoscopia']);
        $sql->bindValue(5,$aPost['diagnosticoRefractivo']);
        $sql->bindValue(6,$aPost['especificaciones']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function insert_padecimientos($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO padecimientos (descripcion, tipoPadecimiento_idtipoPadecimiento) VALUES (?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['descripcion']);
        $sql->bindValue(2,$aPost['tipoPadecimiento_idtipoPadecimiento']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function insert_pacienteHasPadecimientos($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO paciente_has_padecimientos (Paciente_idPaciente, Padecimientos_idPadecimientos, tratamientoPadecimiento) VALUES (?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Paciente_idPaciente']);
        $sql->bindValue(2,$aPost['Padecimientos_idPadecimientos']);
        $sql->bindValue(3,$aPost['tratamientoPadecimiento']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_paciente($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE paciente SET nombrePac=?, apellidoP=?, apellidoM=?, edad=?, Sexo_idSexo=?, Ocupacion_idOcupacion=?, telefono=?, calleNumero=?, colonia=?, cp=?, ciudad=?, fecha_modi=now() WHERE idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['nombrePac']);
        $sql->bindValue(2,$aPost['apellidoP']);
        $sql->bindValue(3,$aPost['apellidoM']);
        $sql->bindValue(4,$aPost['edad']);
        $sql->bindValue(5,$aPost['Sexo_idSexo']);
        $sql->bindValue(6,$aPost['Ocupacion_idOcupacion']);
        $sql->bindValue(7,$aPost['telefono']);
        $sql->bindValue(8,$aPost['calleNumero']);
        $sql->bindValue(9,$aPost['colonia']);
        $sql->bindValue(10,$aPost['cp']);
        $sql->bindValue(11,$aPost['ciudad']);
        $sql->bindValue(12,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_tiemUso($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tiempouso SET UsoAnteojosLC_idUsoAnteojosLC=?, tiempoUso=? WHERE Paciente_idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['UsoAnteojosLC_idUsoAnteojosLC']);
        $sql->bindValue(2,$aPost['tiempoUso']);
        $sql->bindValue(3,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_dolor($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE dolor
        SET Localizacion_idLocalizacion=?, sintomas=?
        where idDolor=(
            select Dolor_idDolor from cuadroclinico
            where Paciente_idPaciente=?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Localizacion_idLocalizacion']);
        $sql->bindValue(2,$aPost['sintomas']);
        $sql->bindValue(3,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_cuadroclinico($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE cuadroclinico SET Inflamacion_idInflamacion=?, alteracionesParpados=?, tratamiento=?, fechaConsulta=?, Colores_idColores=?, Grado_idGrado=? WHERE Paciente_idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['Inflamacion_idInflamacion']);
        $sql->bindValue(2,$aPost['alteracionesParpados']);
        $sql->bindValue(3,$aPost['tratamiento']);
        $sql->bindValue(4,$aPost['fechaConsulta']);
        $sql->bindValue(5,$aPost['Colores_idColores']);
        $sql->bindValue(6,$aPost['Grado_idGrado']);
        $sql->bindValue(7,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_diagnosticovista($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE diagnosticovista SET UsoAnteojosLC_idUsoAnteojosLC=?, Refraccion_idRx=?, oftalmoscopia=?, diagnosticoRefractivo=?, especificaciones=? WHERE Paciente_idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['UsoAnteojosLC_idUsoAnteojosLC']);
        $sql->bindValue(2,$aPost['Rx_idRx']);
        $sql->bindValue(3,$aPost['oftalmoscopia']);
        $sql->bindValue(4,$aPost['diagnosticoRefractivo']);
        $sql->bindValue(5,$aPost['especificaciones']);
        $sql->bindValue(6,$aPost['idPaciente']);
        $sql->execute();
        return $conectar->lastInsertId();
    }

    public function update_padecimientos($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE padecimientos
        SET descripcion=?, tipoPadecimiento_idtipoPadecimiento=?
        where idPadecimientos=(
            select Padecimientos_idPadecimientos from paciente_has_padecimientos
            where Paciente_idPaciente=?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['descripcion']);
        $sql->bindValue(2,$aPost['tipoPadecimiento_idtipoPadecimiento']);
        $sql->bindValue(3,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_pacienteHasPadecimientos($aPost){ 
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE paciente_has_padecimientos SET tratamientoPadecimiento=? WHERE Paciente_idPaciente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$aPost['tratamiento']);
        $sql->bindValue(2,$aPost['idPaciente']);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

  }

?>