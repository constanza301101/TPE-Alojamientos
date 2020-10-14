<?php

 require_once ('./Model/HabitacionModel.php');
 require_once ('./Model/HotelModel.php');
 require_once ('./Model/AdminModel.php');
 require_once ('./View/UserView.php');
 require_once ('UserController.php');

 class AdminController{
     private $adminView;
     private $HabitacionModel;
     private $HotelModel;
     private $AdminModel;

     public function __construct(){
         $this->HabitacionModel = new HabitacionModel();
         $this->HotelModel = new HotelModel();
         $this->AdminView = new AdminView();
         $this->AdminModel = new AdminModel();

     }
//controlar si sigue logueado el usuario 
 private function StillLogueado(){
    session_start();
    if (!isset($_SESSION['usuario'])){
        header("Location: ".BASE_URL."home");
        die();
    }else{
        
        //hacer un if de que se paso el tiempo
            header("Location: ".BASE_URL."logout");  
            die();
        }
        // se actualiza el tiempo desde 0
        $_SESSION['timeout'] = time();
    }
}






?>    