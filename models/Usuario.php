<?php
  class Usuario extends Conectar{

    public function login(){
        $conectar = parent::Conexion(); //Sirve para llamar a la funcion "Conexion" de la clase conexion desde la clase Usuario
        parent::set_names(); //Sirve para llamar a la funcion "set_names" de la clase conexion desde la clase Usuario

        if(isset($_POST["enviar"])){ //Si resive el valor "enviar", resivira 2 parametros

            $password = $_POST["password"];
            $correo = $_POST["correo"];

            if(empty($correo) and empty($password)){ //Si el correo y el password estan vacios
                header("Location: index.php?m=2"); //Se manda un mensaje de error a dicha ruta de tipo 2
                exit();
            }
            else{ //Si estan correctos los datos
                $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? AND usu_pass=? AND est=1";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->bindValue(2, $password);
                $sql->execute();
                $resultado = $sql->fetch();

                if(is_array($resultado) and count($resultado)>0){ //Si el resultado es un array y al contarlo es mayor a 0
                                                                  //Me traigo todos los datos para utilizarlos en el sistema
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_ape"] = $resultado["usu_ape"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];
                    header("Location: ../view/Home/"); //Si todo esta correcto me deja acceder a view/Home/
                    exit();
                }else{ //Si no, se manda otro mensaje de error
                    header("Location: index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function insert_usuario($usu_nom,$usu_ape,$usu_correo,$usu_pass){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_usuario VALUES (NULL,?,?,?,?, NULL, NULL, NULL, '1')";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_nom);
        $sql->bindValue(2,$usu_ape);
        $sql->bindValue(3,$usu_correo);
        $sql->bindValue(4,$usu_pass);
        $sql->execute();
    }

    public function get_correo_usuario($usu_correo){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? AND est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_correo);
        $sql->execute();
        return $resultado=$sql->fetchAll(); //Devuelve el resultado de la busqueda de la variable $sql
    }

  }
?>