<?php

    require_once ('./Model/HotelModel.php');
    require_once ('./Model/HabitacionModel.php');
    require_once ('./View/PublicView.php');
    require_once ('./helpers/AuthHelper.php');


    class PublicController{
        private $view;
        private $HabitacionModel;
        private $HotelModel;
        private $helper;

        public function __construct(){
            $this->HotelModel = new HotelModel();
            $this->HabitacionModel = new HabitacionModel();
            $this->view = new PublicView();
            $this->helper= new AuthHelper();
        }


        function Home(){
            $hoteles = $this->HotelModel->GetHotels();
            $logeado = $this->helper->checkLogIn();
            $this->view->Home($hoteles, $logeado);
        }
        function showHoteles() {

            // obtener todas las habitaciones
            $hoteles = $this->HotelModel->GetHotels();
            $log = $this->helper->checkLogIn();
            // actualizo la vista
            $this->view->renderHoteles($hoteles,$log);
        }
    
        function insertHotel(){
            $this->view->renderInsertHotel();
    
        }



        function showHabitaciones() {

            // obtener todas las habitaciones
            $Habitaciones = $this->HabitacionModel->GetHabs();
            $log = $this->helper->checkLogIn();
            // actualizo la vista
            $this->view->renderHabitaciones($Habitaciones, $log);
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
            $logeado=$this->helper->checkLogIn();
            $idHabitacion=$params[':IDHA'];
            $idHotel=$params[':IDHO'];
            $habitacion=$this->HabitacionModel->GetHab($idHabitacion, $idHotel);
            $this->view->showMasHabitacion($habitacion,$logeado);
        }



    }
?>