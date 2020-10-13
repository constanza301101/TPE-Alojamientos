<?php

class HotelModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }

    function GetHotels(){
        $sentencia = $this->db->prepare("SELECT * FROM hotel");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetHotel($id_hotel){
        $sentencia = $this->db->prepare("SELECT * FROM hotel WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
    function InsertHotel($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO hotel (id_hotel, localidad, nombre, direccion, telContacto, valoracion, descripcion) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }
      
    function DeleteHotel($id_hotel){
        $sentencia = $this->db->prepare("DELETE FROM hotel WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel));
    }
      
    function UpdateEstado($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("UPDATE hotel SET id_hotel=?, localidad=?, nombre=?, direccion=?, telContacto=?, valoracion=?, descripcion=? WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }
      

}