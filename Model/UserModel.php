<?php

class UserModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_alojamientos;charset=utf8', 'root', '');
    }
     
    function getUsuario($mail){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($mail));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
/* funcion que traiga todos los usuarios
function getAllUsers(){
            $query=$this->db->prepare('SELECT * FROM usuario');

funcion que los guarde 
function saveUser(paso el nombre, el mail y el passwordhass){
            $query = $this->db->prepare("INSERT INTO usuario(nombre, mail, password) VALUES(?,?,?)");

funcion que los obtenga 
con un select

funcion que si son admin puedan editar
'UPDATE usuario SET admin=? WHERE id=?'


*/
}