<?php

class ImageModel {
    private $db;
    //CREO LA CONEXIÓN CON LA BASE DE DATOS
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //BUSCO TODAS LAS IMAGENES
    function GetImagen(){
        $sentencia = $this->db->prepare("SELECT * FROM imagen");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCO LAS IMAGENES DE UNA HAB EN ESPECIFICO
    function GetImagenByHab($id_habitacion){
        $sentencia = $this->db->prepare("SELECT * FROM imagen WHERE id_habitacion=?");
        $sentencia->execute(array($id_habitacion));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //BUSCA FILEPATH DE IMAGEN PARA LUEGO ELIMINARLA DEL SERVIDOR
    function SearchFilepath($image_id){
        $sentencia = $this->db->prepare("SELECT imagen FROM imagen WHERE id=?");
        $sentencia->execute(array($image_id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    //BORRA LA IMAGEN
    function DeleteImg($image_id){
        $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id=?");
        $sentencia->execute(array($image_id));
    }
    //BUSCA SI ESTE FILEPATH ESTA EN USO
    function SearchImageInUse($filepath){
        $sentencia = $this->db->prepare("SELECT imagen FROM imagen WHERE imagen=?");
        $sentencia->execute(array($filepath));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //AGREGAR UNA IMAGEN
    function InsertImg($filepath, $id_habitacion){
        $sentencia = $this->db->prepare("INSERT INTO imagen(imagen, id_habitacion) VALUES(?,?)");
        $sentencia->execute(array($filepath, $id_habitacion));
    }
}
?>