<?php

require_once './api/ApiComentariosController.php';

class ComentariosModel{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }

    function getComentarios(){
        $query=$this->db->prepare('SELECT usuario.email, usuario.id, comentario.id, comentario.id_usuario, comentario.id_hotel
            comentario.puntaje, comentario.comentario FROM usuario INNER JOIN comentario
            WHERE  usuario.id = comentario.id_usuario');
        $query->execute();
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function addComentariosModel($idusuario, $idhabitacion, $id_hotel, $puntaje, $comentario){
        $query = $this->db->prepare("INSERT INTO comentario(id_usuario,  id_hotel,  puntaje, comentario) VALUES(?,?,?,?)");
        $query->execute(array($idusuario, $idHotel, $puntaje, $comentario));
        return $query->rowCount();
    }

    function getComentarios($id){
        $query = $this->db->prepare('SELECT comentario.id, comentario.id_usuario, comentario.id_hotel, comentario.puntaje, 
            comentario.comentario, usuario.id, usuario.email, hotel.id, hotel.nombre FROM comentario INNER JOIN usuario 
                ON comentario.id_usuario = usuario.id INNER JOIN hoteles ON hoteles.id = comentario.id_hotel
                WHERE comentario.id_hotel=?');
        $query->execute(array($id));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

    function deleteComentarios($id){
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $query->execute(array($id));
        return $query->rowCount();
    }
}