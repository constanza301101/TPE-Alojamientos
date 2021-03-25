<?php

require_once './api/ApiComentariosController.php';

class ComentariosModel{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //TRAIGO LOS COMENTARIO DE UNA HABITACION
    function GetCommentByHabitacion($id_habitacion){
        $sentencia=$this->db->prepare("SELECT * FROM comentario WHERE id_habitacion=?");
        $sentencia->execute(array($id_habitacion));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    //TRAIGO UN COMENTARIO POR UN ID
    function GetComment($id_comentario){
        $sentencia=$this->db->prepare("SELECT * FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id_comentario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    //INSERTA UN COMENTARIO
    function InsertComment($comentario, $valoracion, $id_usuario, $id_habitacion){
        $sentencia = $this->db->prepare("INSERT INTO comentario(comentario, valoracion, id_usuario, id_habitacion)
         VALUES(?,?,?,?)");
        $sentencia->execute(array($comentario, $valoracion, $id_usuario, $id_habitacion));
        return $this->db->lastInsertId();
    }
    //BORRA UN COMENTARIO
    function DeleteComment($id_comentario){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id_comentario));
    }
}