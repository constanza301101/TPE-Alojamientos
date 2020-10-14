<?php

class HabitacionModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }
    
    function GetHabsPorHotel($a){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id_hotel=?");
        $sentencia->execute(array($a));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
       
    function GetHabs(){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetHab($id_hab){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id=?");
        $sentencia->execute(array($id_hab));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
  
      
}

?>