<?php

class UserModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }
     
    function getUsuario($mail){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE e-mail=?");
        $sentencia->execute(array($mail));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }








}