<?php

class HabitacionModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
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
      
    function InsertHab($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO habitacion(id,id_hotel,capacidadMax,cantCamas,cantBanios,wifi,tv, descripcion) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion));
    }
      
    function DeleteHab($id){
        $sentencia = $this->db->prepare("DELETE FROM habitacion WHERE id=?");
        $sentencia->execute(array($id));
    }
      
    function UpdateEstado($id){
        //cuando se reserva una habitacion el estado se carga en 1.
        $sentencia = $this->db->prepare("UPDATE habitacion SET estado=1 WHERE id=?");
        $sentencia->execute(array($id));
    }
      
}

?>