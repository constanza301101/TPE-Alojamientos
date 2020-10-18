<?php

    require_once ('./Model/HotelModel.php');
    require_once ('./Model/HabitacionModel.php');
    require_once ('./View/PublicView.php');

    class PublicController{
        private $view;
        private $HabitacionModel;
        private $HotelModel;

        public function __construct(){
            $this->HotelModel = new HotelModel();
            $this->HabitacionModel = new HabitacionModel();
            $this->view = new PublicView();
        }


            //chequear si esta logueado
        private function checkLoggedIn(){
            session_start();
            if(!isset($_SESSION['email'])){
                return false;
            }
            else{
                return true;
            }
        }

        function ShowHome(){
            $hoteles = $this->HotelModel->GetHotels();
            $this->view->Home($hoteles);
        }
        function showHoteles() {

            // obtener todas las habitaciones
            $hoteles = $this->HotelModel->GetHotels();
    
            // actualizo la vista
            $this->view->renderHoteles($hoteles);
        }
    
        function insertHotel(){
            $this->view->renderInsertHotel();
    
        }



        function showHabitaciones() {

            // obtener todas las habitaciones
            $Habitaciones = $this->HabitacionModel->GetHabs();
    
            // actualizo la vista
            $this->view->renderHabitaciones($Habitaciones);
        }
    
        function insertHabitacion(){
            $this->view->renderInsertHabitacion();
    
        }
         
        
        function HabitacionesPorHotel(){
            if(empty($_POST['idHotel']) || !isset($_POST['idHotel'])){
                $this->view->showError("No se pudo encontrar las habitaciones. Por favor intentelo nuevamente.", $logeado);
            }
            else{
                $idHotel=$_POST['idHotel'];
                $habsporhotel=$this->HabitacionModel->GetHabsPorHotel($idHotel);
                $this->view->renderHabitaciones($habsporhotel);
            }
        }

        function ShowHabitacion($params=null){
            $logeado=$this->checkLoggedIn();
            $idHabitacion=$params[':IDHA'];
            $idHotel=$params[':IDHO'];
            $habitacion=$this->HabitacionModel->GetHab($idHabitacion, $idHotel);
            $this->view->showMasHabitacion($habitacion,$logeado);
        }



    }
?>