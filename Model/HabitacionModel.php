<?php

class HabitacionModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //BUSCO TODAS LAS  HABITACION
    function GetHabs(){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion INNER JOIN hotel 
        ON habitacion.id_hotel = hotel.id_hotel ORDER BY habitacion.id");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCO UNA SOLA HABITACION POR ID
    function GetHabsById($id){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    //INSERTO UNA HABITACION
    function InsertHabs($habiatacion,$id_hotel, $capacidadMax, $cantCamas, $cantBanios, $wifi, $tv, $descripcion, $estado){
        $sentencia = $this->db->prepare("INSERT INTO habitacion(id_hotel, capacidadMax, cantCamas, cantBanios, wifi, tv, descripcion, estado)
         VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($habiatacion,$id_hotel, $capacidadMax, $cantCamas, $cantBanios, $wifi, $tv, $descripcion, $estado));
        return $this->db->lastInsertId();
    }
    //ELIMINO UNA HABITACION
    function DeleteHab($id){
        $sentencia = $this->db->prepare("DELETE FROM habitacion WHERE id=?");
        $sentencia->execute(array($id));
    }
    //ACTUALIZA DATOS DE UNA HABITACION
    function UpdateHab($habiatacion,$id_hotel, $capacidadMax, $cantCamas, $cantBanios, $wifi, $tv, $descripcion, $estado){
        $sentencia = $this->db->prepare("UPDATE habitacion SET id_hotel=?, capacidadMax=?, cantCamas=?, cantBanios=?, wifi=?,
         tv=?, descripcion=?, estado=? WHERE habitacion.id=?");
        $sentencia->execute(array($habiatacion,$id_hotel, $capacidadMax, $cantCamas, $cantBanios, $wifi, $tv, $descripcion, $estado));
    }

    //BUSCO LOS HABITACION QUE COICIDAN CON EL ID DEL FILTRO POR HOTEL
    function GethabsByHotel($id_hotel){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id_hotel=?");
        $sentencia->execute(array($id_hotel));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCA HABITACION CON UN LIMITE DESDE QUE HABITACION Y CUANTOS RESULTADOS
    function GetHabsByLimit($desde, $HabPorHotel){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion INNER JOIN hotel ON habitacion.id_hotel = hotel.id_hotel 
        LIMIT $desde,$HabPorHotel");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);//
    }
    //BUSCO ITEMS SEGÚN SU HOTEL
    function SearchItemByHotel($search){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE id_hotel LIKE '%' ? '%' ");
        $sentencia->execute(array($search));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCO ITEMS SEGÚN SU CAPACIDAD MAXIMA
    function SearchItemByCap($capMinimo, $capMaximo){
        $sentencia = $this->db->prepare("SELECT * FROM habitacion WHERE capacidadMax BETWEEN ? AND ?");
        $sentencia->execute(array($capMinimo, $capMaximo));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
