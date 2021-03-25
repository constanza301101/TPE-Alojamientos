<?php
    //correguir esto
    require_once "./View/HotelView.php";
    require_once "./Model/HotelModel.php";
    require_once "./View/LoginView.php";
    require_once "./View/HabitacionView.php";
    require_once "Helper.php";

    class HotelController extends Helper{

        private $HotelView;
        private $HotelModel;
        private $HabitacionView;

        function __construct(){
            $this->HotelView = new HotelView();
            $this->HotelModel = new HotelModel();
            $this->HabitacionView = new HabitacionView();
        }
        //LLAMA AL HOME DE HOTELES
        function HomeHoteles(){
            $hotels = $this->HotelModel->GetHotels();
            $this->hotelView->ShowHotels($hotels);
        }
        //INSERTA UN NUEVO HOTEL
        function InsertHotel(){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){ 
                if (isset($_POST['input_hotel']) && isset($_POST['input_category'])) {
                    $hotel = $_POST['input_hotel'];
                    $category = $_POST['input_category'];
                    $this->HotelModel->InsertHotel($hotel, $category);
                }
                $this->HabitacionView->ShowLocation('admin');
            }else{
                $this->HabitacionView->ShowLocation('login');
            }
        }
        //ELIMINA UN HOTEL POR ID
        function DeleteHotel($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id_hotel= $params[':ID'];
                $this->HotelModel->DeleteHotel($id_hotel);
                $this->HabitacionView->ShowLocation('admin');
            }else{
                $this->HabitacionView->ShowLocation('login');
            }
        }

        //LLAMA LA VISTA PARA EDITAR UN HOTEL POR ID
        function Edithotel($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id_hotel = $params[':ID'];
                $hotel = $this->HotelModel->GetHotelById($id_hotel);
                $this->hHtelView->ShowEditHotel($hotel);
            }else{
                $this->HabitacionView->ShowLocation('login');
            }
        }

        //LLAMA A ACTUALIZAR UN HOTEL
        function UpdateHotel($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id_hotel = $params[':ID'];
                if (isset($_POST['edit_hotel']) && isset($_POST['edit_localidad'])&& isset($_POST['edit_nombre'])
                && isset($_POST['edit_direccion'])&& isset($_POST['edit_telContacto']) 
                && isset($_POST['edit_valoracion'])&& isset($_POST['edit_descripcion'])) {
                    $hotel = $_POST['edit_hotel'];
                    $id_hotel = $_POST['edit_hotel_id'];
                    $localidad = $_POST['edit_localidad'];
                    $nombre= $_POST['edit_nombre'];
                    $direccion = $_POST['edit_direccion'];
                    $telContacto = $_POST['edit_telContacto'];
                    $valoracion = $_POST['edit_valoracion'];
                    $descripcion = $_POST['edit_descripcion'];
                    $this->HotelModel->UpdateHotel($hotel,$id_hotel, $localidad, $nombre, $direccion, $telContacto, $valoracion, $descripcion);
                }
                $this->HabitacionView->ShowLocation('admin');
            }else{
                $this->HabitacionView->ShowLocation('login');
            }
        }
    }
?>|