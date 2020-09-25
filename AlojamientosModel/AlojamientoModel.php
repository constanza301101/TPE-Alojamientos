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
}