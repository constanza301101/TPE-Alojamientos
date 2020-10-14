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
          

}