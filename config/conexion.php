<?php
   session_start(); //Cuando el usuario inicie sesion, dispara una variable de sesion en todo el proyecto para saber
                    //que hay un usuario logiado en el sistema
   class Conectar{
        protected $dbh; //Proteccion a la cadena de conexion y comandos

        protected function Conexion(){ //Cadena de conexion
            try{ 
                $conectar = $this->dbh = new PDO("mysql:local=localhost; dbname=optica2","root","");

                return $conectar; //Retorna a la funcion Conexion
            }catch(Exception $e){
                print "¡Error!: ".$e->getMessage()."</br>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'"); //Sirve para identificar las "ñ" y otras letras
        }

        public function ruta(){
            return "http://localhost/optica2/";
        }
   }
?>