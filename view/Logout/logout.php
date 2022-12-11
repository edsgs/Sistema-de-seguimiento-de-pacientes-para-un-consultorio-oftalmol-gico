<?php
   require_once("../../config/conexion.php"); //Requiere del acceso a la conexion de la BD
   session_destroy(); //Destruye la sesion
   header("Location: ../index.php"); //Los manda al index que es la ventana principal
   exit();
?>