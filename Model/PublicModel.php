<?php

class PublicModel{
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

    function GetHab($id_hab, $id_hotel){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id=? and id_hotel=?");
        $sentencia->execute(array($id_hab, $id_hotel));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      

    //todo

    function GetHotels(){
        $sentencia = $this->db->prepare("SELECT * FROM hotel");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }



}




?>