<?php

 require_once ('./Model/HotelModel.php');
 require_once ('./Model/HabitacionModel.php');
 require_once ('./View/AdminView.php');
 require_once ('UserController.php');
 require_once ('./helpers/AuthHelper.php');


 class AdminController{
     private $AdminView;
     private $HabitacionModel;
     private $HotelModel;
     private $UserModel;
     private $helper;

     public function __construct(){
         $this->HotelModel = new HotelModel();
         $this->HabitacionModel = new HabitacionModel();
         $this->AdminView = new AdminView();
         $this->UserModel = new UserModel();
        $this->helper= new AuthHelper();
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
            $val = $_POST['input_Valoracion'];
            $descripcionHot = $_POST['input_descriptionHot'];
            $this->HotelModel->InsertHotel($hotel,  $localidad, $nombre, $direccion, $telContacto, $val, $descripcionHot);
            $this->AdminView->Home();
        }
    }
    
    function agregar_habs(){
        if((isset($_POST['input_habitacion'])) && (isset($_POST['input_hotel'])) && (isset($_POST['input_capacidadMaxima'])))
        {

            $habitacion= $_POST['input_habitacion'];
            $hotel = $_POST['input_hotel'];
            $capacidadMaxima = $_POST['input_capacidadMaxima'];
            $cantCamas = $_POST['input_cantCamas'];
            $cantBanios = $_POST['input_cantBanios'];
            $WiFi = $_POST['input_Wifi'];
            $Tv = $_POST['input_TV'];
            $descripcionHab = $_POST['input_descripcion'];
            
            $this->HabitacionModel->InsertHab($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios,  $WiFi, $Tv, $descripcionHab);
            $this->AdminView->renderHabitaciones($this->HabitacionModel->GetHabs(), $this->helper->checkLogIn());

        }
    }

    function mostrarFormHotel(){
        //mostrar form para cargar nuevo hotel
    }

    function mostrarFormInsertHab(){
        $hoteles=$this->HotelModel->GetHotels();
        $this->AdminView->AgregarHabs($hoteles,$this->helper->checkLogIn());
    }


    function mostrarFormHab($params=null){
        $idHabitacion=$params[':IDHA'];
        $idHotel=$params[':IDHO'];
        $habitacion=$this->HabitacionModel->GetHab($idHabitacion, $idHotel);
        $hoteles=$this->HotelModel->GetHotels();
        $this->AdminView->editarHabs($habitacion,$hoteles,$this->helper->checkLogIn());
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

            $this->HotelModel->ActualizVaraloresHot($hotel, $nombre, $localidad, $direccion, $telContacto, $descripcionHot);
            $this->AdminView->Home();
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
            $this->HabitacionModel->ActualizarValoresHab($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv , $WiFi, $descripcionHab);
            $this->AdminView->ShowHome();

        }else {
            $this->AdminView->showError("Ingrese todos los campos", $this->helper->checkLogIn());
        }
    }


    function  DeleteHotel($params=null) {
        $id_hotel= $params[':ID'];
        $this->HotelModel->DeleteHotel($id_hotel);
        $this->AdminViewiew->showTablaLocation(); 
    }

    function  DeleteHabitacion($params=null) {
        $idHabitacion=$params[':IDHA'];
        $idHotel=$params[':IDHO'];
        $this->HabitacionModel->DeleteHab($idHabitacion,$idHotel);
        $this->AdminView->renderHabitaciones($this->HabitacionModel->GetHabs(),$this->helper->checkLogIn()); 
    } 


 }
?>    