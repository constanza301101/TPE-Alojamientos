<?php

 require_once ('./Model/AdminModel.php');
 require_once ('./View/UserView.php');
 require_once ('UserController.php');

 class AdminController{
     private $UserView;
     private $AdminModel;
     private $UserModel;

     public function __construct(){
         $this->AdminModel = new AdminModel();
         $this->UserView = new UserView();
         $this->UserModel = new UserModel();

     }


    private function StillLogueado(){
        session_start();
        if (!isset($_SESSION['usuario'])){
            header("Location: ".BASE_URL."home");
            die();
        }else{
                header("Location: ".BASE_URL."logout");  
                die();
            }
            $_SESSION['timeout'] = time();
        }
    }


    function adminController(){
        $this->StillLogueado();
        $habitaciones=$this->AdminModel->GetHabs();
        $hoteles=$this->AdminModel->GetHotels();
        $this->UserView->renderAdmin($habitaciones, $hoteles);
    }

    function adminAgregar(){
        $this->StillLogueado();
        $hoteles=$this->AdminModel->GetHotels();
        $this->UserView->renderInserthotels($hoteles);
    }

    function agregar_hotels(){
        $this->StillLogueado();
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
            $this->UserView->ShowAdmin();
        }
    }
    function agregar_habs(){
        $this->StillLogueado();
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
            $this->UserView->ShowHome();

        }
    }
        
    function editarHotel($params = null){
        $this->StillLogueado();
        if((isset($_POST['input_hotel'])) && (isset($_POST['input_localidad'])) && (isset($_POST['input_localidad']))
        && (isset($_POST['input_direccion'])) && (isset($_POST['input_telContacto']))  
        && (isset($_POST['input_Valoracion'])) && (isset($_POST['input_descriptionHot']))){

            $hotel= $_POST['input_hotel'];
            $nombre = $_POST['input_Nombre'];
            $localidad = $_POST['input_localidad'];
            $direccion = $_POST['input_direccion'];
            $telContacto = $_POST['input_telContacto'];
            $descripcionHot = $_POST['input_descriptionHot'];

            $this->AdminModel->ActualizVaraloresHot ($hotel, $nombre, $localidad, $direccion, $telContacto, $descripcionHot);
            $this->UserView->ShowHome();
        }
    }

    function editarHabs($params = null){
        $this->StillLogueado();
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
            $this->AdminModel->ActualizarValoresHab ($habitacion, $hotel, $capacidadMaxima, $cantCamas, $cantBanios, $Tv , $WiFi; $descripcionHab);
            $this->UserView->ShowHome();

        }
    }


    function  DeleteHoteles($params=null) {
        $id_hotel= $params[':ID'];
        $this->AdminModel->DeleteHotel($id_hotel);
        $this->view->showTablaLocation(); 
    }

    function  DeleteHabitacion($params=null) {
        $id_habitacion= $params[':ID'];
        $this->AdminModel->DeleteHabitacion($id_hotel);
        $this->view->showTablaLocation(); 
    } 

?>    