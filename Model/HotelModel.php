<?php

class AlojamientoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }

  
    /**
     *  Obtiene la lista de habitaciones de la DB según hotel
     */
    
    function getHabitacionesByHotel($hotel) {
        $query = $this->db->prepare('SELECT * FROM habitacion WHERE id_hotel = ?');
        $query->execute([$hotel]); 
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);
        return $habitaciones;
    }
    /**
     * Obtiene todos las habitaciones
     */
    function getHabitaciones() {
        $query = $this->db->prepare('SELECT * FROM habitacion');
        $query->execute();
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);
        return $habitaciones;
    }

    function getHoteles() {
        $query = $this->db->prepare('SELECT * FROM hotel');
        $query->execute();
        $hoteles = $query->fetchAll(PDO::FETCH_OBJ);
        return $hoteles;
    }

    //ABM Hotel (categoría)
    //Alta de un Hotel 
    function InsertHotel($id_hotel,$localidad,$nombre,$direccion, $tel, $valoracion, $descrip){
        $sentencia = $this->db->prepare("INSERT INTO hotel(id_hotel, localidad, nombre, direccion, telContacto, valoracion, descripcion) VALUES(?,?,?,?)");
        $sentencia->execute(array($id_hotel, $localidad, $nombre, $direccion, $tel, $valoracion, $descrip));
    }
    
    function DeleteTaskDelModelo($task_id){
        $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
        $sentencia->execute(array($task_id));
    }

}