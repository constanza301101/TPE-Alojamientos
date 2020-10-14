<?php

 class AdminModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root' , '');
    }
    function InsertHab($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO habitacion(id,id_hotel,capacidadMax,cantCamas,cantBanios,wifi,tv, descripcion) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($id,$id_hotel,$capacidadMax,$cantCamas,$cantBanios, $wifi, $tv, $descripcion));
    }
      
    function DeleteHab($id){
        $sentencia = $this->db->prepare("DELETE FROM habitacion WHERE id=?");
        $sentencia->execute(array($id));
    }
      ///////faltaria actualizar la tabla de haitaciones  si fue mofificada 

    function UpdateEstadoHab($id){
        //cuando se reserva una habitacion el estado se carga en 1.
        $sentencia = $this->db->prepare("UPDATE habitacion SET estado=1 WHERE id=?");
        $sentencia->execute(array($id));
    }
  ////////////////////////////////
  
  function InsertHotel($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
    $sentencia = $this->db->prepare("INSERT INTO hotel (id_hotel, localidad, nombre, direccion, telContacto, valoracion, descripcion) VALUES(?,?,?,?,?,?,?)");
    $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
}
  //faltaria actualizar la tabla de hotel si fue modificada 
function DeleteHotel($id_hotel){
    $sentencia = $this->db->prepare("DELETE FROM hotel WHERE id_hotel=?");
    $sentencia->execute(array($id_hotel));
}
  
function UpdateEstadoHtel($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion){
    $sentencia = $this->db->prepare("UPDATE hotel SET id_hotel=?, localidad=?, nombre=?, direccion=?, telContacto=?, valoracion=?, descripcion=? WHERE id_hotel=?");
    $sentencia->execute(array($id_hotel,$localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion));
}

 }
?>