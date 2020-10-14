<?php

    require_once ('./Model/HabitacionModel.php');
    require_once ('./Model/HotelModel.php');
    require_once ('./View/PublicView.php');

    class PublicController{
        private $HabitacionModel;
        private $view;
        private $HotelModel;

        public function __construct(){
            $this->HabitacionModel = new HabitacionModel();
            $this->HotelModel = new HotelModel();
            $this->view = new PublicView();
        }

        function ShowHome(){
            $hoteles = $this->HotelModel->GetHotels();
            $this->view->Home($hoteles);
        }
        function showHoteles() {

            // obtener todas las habitaciones
            $hoteles = $this->model->GetHotels();
    
            // actualizo la vista
            $this->view->renderHoteles($hoteles);
        }
    
        function insertHotel(){
            $this->view->renderInsertHotel();
    
        }



        function showHabitaciones() {

            // obtener todas las habitaciones
            $Habitaciones = $this->model->GetHabs();
    
            // actualizo la vista
            $this->view->renderHabitaciones($Habitaciones);
        }
    
        function insertHabitacion(){
            $this->view->renderInsertHabitacion();
    
        }
         
        
        function HabitacionesPorHotel($hotel){
            $logeado=$this->checkLoggedIn();
            if(empty($_POST['idHotel']) || !isset($_POST['idHotel'])){
                $this->view->showError("No se pudo encontrar las habitaciones. Por favor intentelo nuevamente.", $logeado);
            }
            else{
                $idHotel=$_POST['idHotel'];
                $habsporhotel=$this->model->GetHabsPorHotel($idHotel);
                $this->view->renderHabitaciones($habsporhotel);
            }
        }



    }
?>