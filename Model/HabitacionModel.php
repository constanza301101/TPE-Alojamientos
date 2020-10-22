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

    function GetHab($id_hab, $id_hotel){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id=? and id_hotel=?");
        $sentencia->execute(array($id_hab, $id_hotel));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      

    //Funciones admin
    function InsertHab($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO habitacion(id,id_hotel,capacidadMax,cantCamas,cantBanios,wifi,tv, descripcion) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion));
    }
      
    function DeleteHab($id, $hotel){
        $sentencia = $this->db->prepare("DELETE FROM habitacion WHERE id=? and id_hotel=?");
        $sentencia->execute(array($id,$hotel));
    }
    
    function UpdateEstadoHab($id){
        //cuando se reserva una habitacion el estado se carga en 1.
        $sentencia = $this->db->prepare("UPDATE habitacion SET estado=1 WHERE id=?");
        $sentencia->execute(array($id));
    }

    function ActualizarValoresHab ($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv , $WiFi, $descripcionHab){
        $sentencia = $this->db->prepare("UPDATE habitacion SET id=?, id_hotel=?, capacidadMax=?, cantCamas=?, cantBanios=?, tv=?, wifi=?, descripcion=?  WHERE id=? and id_hotel=?");
        $sentencia->execute(array($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv , $WiFi, $descripcionHab, $habitacion, $id_hotel));
    }


}




?>