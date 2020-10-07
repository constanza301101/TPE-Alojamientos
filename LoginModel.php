<?php

class UserModel{
     //accedemos a la base de dayos 
    private $db;

    function __construct(){
        $this->db = new PDO(// tengo que acceder a la base de datos );
    }
     
    //obtenemos los datos de la base de datos 
    //la usamos en el controller 
    function ObtenerUsuario($usario){
        $sentencia = $this->db->prepare("SELECT * FROM nombre de la base de donde esta guardada WHERE email=?");
        $sentencia->execute(array($usario));
        //nos devuelve el usuario
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
}

?>