<?php

class HotelModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //BUSCO TODOS LOS HOTEL
    function GetHotels(){
        $sentencia = $this->db->prepare("SELECT * FROM hotel");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCO UN HOTEL POR ID
    function GethotelById($hotel_id){
        $sentencia = $this->db->prepare("SELECT * FROM hotel WHERE id_hotel=?");
        $sentencia->execute(array($hotel_id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    //INSERTA UN HOTEL
    function Inserthotel($hotel,$id_hotel, $localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO hotel(hotel, localidad, nombre, direccion, telContacto, valoracion, descripcion)
         VALUES(?,?)");
        $sentencia->execute(array($hotel, $localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }
    //ELIMINO UN HOTEL
    function Deletehotel($hotel_id){
        $sentencia = $this->db->prepare("DELETE FROM hotel WHERE id_hotel=?");
        $sentencia->execute(array($hotel_id));
    }
    //ACTUALIZA DATOS DE UN HOTEL
    function Updhotel($hotel, $id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
        $sentencia = $this->db->prepare("UPDATE hotel SET hotel=?, localidad=?, nombre=?, direccion=?, telContacto=?, valoracion=?, descripcion=? 
         WHERE hotel.id_hotel=?");
        $sentencia->execute(array($hotel, $id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
    }
}

?>