<?php

 require_once ('./Model/HotelModel.php');
 require_once ('./Model/HabitacionModel.php');
 require_once ('./View/AdminView.php');
 require_once ('UserController.php');

 class AdminController{
     private $AdminView;
     private $HabitacionModel;
     private $HotelModel;
     private $UserModel;

     public function __construct(){
         $this->HotelModel = new HotelModel();
         $this->HabitacionModel = new HabitacionModel();
         $this->AdminView = new AdminView();
         $this->UserModel = new UserModel();

     }
     private function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['USUARIO'])){
            return false;
        }
        else{
            return true;
        }
    }

    function adminAgregar(){
        $hoteles=$this->HotelModel->GetHotels();
        $this->AdminView->renderInserthotels($hoteles);
    }

    function agregar_hotels(){
        if((isset($_POST['input_hotel'])) && (isset($_POST['input_localidad'])) 
            && (isset($_POST['input_direccion'])) && (isset($_POST['input_telContacto']))  
            && (isset($_POST['input_Valoracion'])) && (isset($_POST['input_descriptionHot']))){

            $hotel= $_POST['input_hotel'];
            $nombre = $_POST['input_Nombre'];
            $localidad = $_POST['input_localidad'];
            $direccion = $_POST['input_direccion'];
            $telContacto = $_POST['input_telContacto'];
            $descripcionHot = $_POST['input_descriptionHot'];
            $this->AdminModel->AgregarHoteles($hotel, $nombre, $localidad, $direccion, $telContacto, $descripcionHot);
            $this->AdminView->ShowAdmin();
        }
    }
    function agregar_habs(){
        if((isset($_POST['input_habitacion'])) && (isset($_POST['input_hotel'])) && (isset($_POST['input_capcidadMaxima']))
            && (isset($_POST['input_cantCamas'])) && (isset($_POST['input_cantBanios']))  
            && (isset($_POST['input_Valoracion'])) && (isset($_POST['input_WiFi']))
            && (isset($_POST['input_tv']))&& (isset($_POST['input_descriptionHab']))){

            $habitacion= $_POST['input_habitacion'];
            $hotel = $_POST['input_hotel'];
            $capacidadMaxima = $_POST['input_capcidadMaxima'];
            $cantCamas = $_POST['input_cantCamas'];
            $cantBanios = $_POST['input_cantBanios'];
            $WiFi = $_POST['input_Wifi'];
            $Tv = $_POST['input_tv'];
            $descripcionHab = $_POST['input_descriptionHab'];
            
            $this->AdminModel->Agregarhabs($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv ,  $descripcionHab);
            $this->AdminView->ShowHome();

        }
    }

    function mostrarFormHotel(){
        //mostrar form para cargar nuevo hotel
    }

    function mostrarFormHab(){
        //mostrarform para cargar nueva habitacion o editar una
        $habitacion=$this->HabitacionModel->GetHab($params[':ID']);
        $hoteles=$this->HotelModel->GetHotels();
        $this->AdminView->editarHabs($habitacion,$hoteles);
    }
        
    function editarHotel($params = null){
        if((isset($_POST['input_hotel'])) &&  (isset($_POST['input_localidad']))
        && (isset($_POST['input_direccion'])) && (isset($_POST['input_telContacto']))  
        && (isset($_POST['input_Valoracion'])) && (isset($_POST['input_descriptionHot']))){

            $hotel= $_POST['input_hotel'];
            $nombre = $_POST['input_Nombre'];
            $localidad = $_POST['input_localidad'];
            $direccion = $_POST['input_direccion'];
            $telContacto = $_POST['input_telContacto'];
            $descripcionHot = $_POST['input_descriptionHot'];

            $this->HotelModel->ActualizVaraloresHot ($hotel, $nombre, $localidad, $direccion, $telContacto, $descripcionHot);
            $this->AdminView->ShowHome();
        }
    }

    function editarHabs($params = null){
        if((isset($_POST['input_habitacion'])) && (isset($_POST['input_hotel'])) && (isset($_POST['input_capacidadMaxima']))
                && (isset($_POST['input_cantCamas'])) && (isset($_POST['input_cantBanios']))  
                && (isset($_POST['input_WiFi']))
                && (isset($_POST['input_tv']))&& (isset($_POST['input_descriptionHab']))){

                $habitacion= $_POST['input_habitacion'];
                $hotel = $_POST['input_hotel'];
                $capacidadMaxima = $_POST['input_capcidadMaxima'];
                $cantCamas = $_POST['input_cantCamas'];
                $cantBanios = $_POST['input_cantBanios'];
                $WiFi = $_POST['input_Wifi'];
                $Tv = $_POST['input_tv'];
                $descripcionHab = $_POST['input_descriptionHab'];
            $this->HabitacionModel->ActualizarValoresHab ($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv , $WiFi, $descripcionHab);
            $this->UserView->ShowHome();

        }
    }


    function  DeleteHotel($params=null) {
        $id_hotel= $params[':ID'];
        $this->HotelModel->DeleteHotel($id_hotel);
        $this->view->showTablaLocation(); 
    }

    function  DeleteHabitacion($params=null) {
        $id_habitacion= $params[':ID'];
        $this->HabitacionModel->DeleteHabitacion($id_habitacion);
        $this->view->showTablaLocation(); 
    } 


 }
?>    