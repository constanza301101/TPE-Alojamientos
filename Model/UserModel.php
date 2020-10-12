<?php

class UserModel{
     //accedemos a la base de dayos 
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }
     
    //obtenemos los datos de la base de datos 
    //la usamos en el controller 
    function ObtenerUsuario($usario){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE email=?");
        $sentencia->execute(array($usuario));
        //nos devuelve el usuario
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
}

?>