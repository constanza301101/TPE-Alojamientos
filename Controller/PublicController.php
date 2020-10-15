<?php

    require_once ('./Model/PublicModel.php');
    require_once ('./View/PublicView.php');

    class PublicController{
        private $view;
        private $PublicModel;

        public function __construct(){
            $this->PublicModel = new PublicModel();
            $this->view = new PublicView();
        }

        function ShowHome(){
            $hoteles = $this->PublicModel->GetHotels();
            $this->view->Home($hoteles);
        }
        function showHoteles() {

            // obtener todas las habitaciones
            $hoteles = $this->PublicModel->GetHotels();
    
            // actualizo la vista
            $this->view->renderHoteles($hoteles);
        }
    
        function insertHotel(){
            $this->view->renderInsertHotel();
    
        }



        function showHabitaciones() {

            // obtener todas las habitaciones
            $Habitaciones = $this->PublicModel->GetHabs();
    
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
                $habsporhotel=$this->PublicModel->GetHabsPorHotel($idHotel);
                $this->view->renderHabitaciones($habsporhotel);
            }
        }



    }
?>