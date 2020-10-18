<?php

class HotelModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }
     


    function GetHotels(){
        $sentencia = $this->db->prepare("SELECT * FROM hotel");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


    //Funciones admin
    function InsertHotel($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO hotel (id_hotel, localidad, nombre, direccion, telContacto, valoracion, descripcion) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }
    //faltaria actualizar la tabla de hotel si fue modificada 
    function DeleteHotel($id_hotel){
        $sentencia = $this->db->prepare("DELETE FROM hotel WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel));
    }
    
    function UpdateEstadoHotel($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("UPDATE hotel SET id_hotel=?, localidad=?, nombre=?, direccion=?, telContacto=?, valoracion=?, descripcion=? WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }



}




?>