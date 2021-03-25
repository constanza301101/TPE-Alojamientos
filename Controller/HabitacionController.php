<?php

    require_once "./View/HabitacionView.php";
    require_once "./Model/HabitacionModel.php";
    require_once "./Model/HotelModel.php";
    require_once "./Model/UserModel.php";
    require_once "./Model/ImgModel.php";
    require_once "./Model/ComentariosModel.php";
    require_once "Helper.php";

    class HabitacionController extends Helper{

        private $View;
        private $Model;
        private $HotelModel;
        private $UserModel;
        private $ComentariosModel;
        private $ImgModel;

        function __construct(){
            $this->View = new HabitacionView();
            $this->Model = new HabitacionModel();
            $this->HotelModel = new HotelModel();
            $this->UserModel = new UserModel();
            $this->ComentariostModel = new ComentarioModel();
            $this->ImgModel = new ImgModel();
        }
        //LLAMA AL HOME
        function Home($params = null){
            $logeado = $this->CheckLoggedIn();
            $hotel = $this->HotelModel->Gethotel();

            $data_pagination = $this->Pagination($params);

            $habitacionLimit = $data_pagination[0];
            $pagination = $data_pagination[1];
            $page = $data_pagination[2];
            if($logeado){
                $user = $_SESSION['EMAIL'];
                $this->view->ShowHome($habitacionLimit, $hotel, $pagination, $page, $user);
            }else{
                $this->view->ShowHome($habitacionimit, $hotel, $pagination, $page);
            }

        }
        //PAGINACIÓN
        function Pagination($params){
            $habitacion = $this->model->GetHabitaciones();
            $data_pagination = [];
            $habitacionByPage = 3;
            if(isset($params[':PAGE'])){
                $page = $params[':PAGE'];
            }else{
                $page = 1;
            }
            $rows = count($habitacion);
            $totalPage = ceil($rows/$habitacionByPage);
            $since = ($page-1)*$habitacionByPage;
            $habitacionLimit= $this->model->GetHabitacionByLimit($since, $habitacionPage);
            $pagination = [];
            for ($i = 1; $i <= $totalPage; $i++){
                array_push($pagination, $i);
            }
            array_push($data_pagination, $habitacionLimit, $pagination, $page);
            return $data_pagination;
        }
        //INSERTA UNA NUEVA HABITACION
        function InsertHabitacion(){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                if (isset($_POST['input_habitacion']) && isset($_POST['input_id_hotel']) &&
                    isset($_POST['input_capacidadMax']) && isset($_POST['input_cantCamas']) 
                    && isset($_POST['input_cantBanios'])&& isset($_POST['input_wifi'])&& isset($_POST['input_tv'])
                    && isset($_POST['input_descripcion'])&& isset($_POST['input_estado'])) {

                    $habitacion = $_POST['input_habitacion'];
                    $id_hotel = $_POST['input_id_hotel'];
                    $capacidadMax = $_POST['input_capacidadMax'];
                    $cantCamas = $_POST['input_cantCamas'];
                    $cantBanios = $_POST['input_cantBanios'];
                    $wifi = $_POST['input_wifi'];
                    $tv = $_POST['input_tv'];
                    $description = $_POST['input_description'];
                    $estado= $_POST['input_estado'];

                    $id_habitacion = $this->model->InsertHabitacion($habitacion, $id_hotel, $capacidadMax, $cantCamas,$cantBanios, 
                    $wifi, $tv, $description, $estado);
                    $fileTemp = $_FILES['input_file']['tmp_name'];
                    for($i=0; $i<count($_FILES['input_file']['tmp_name']); $i++){
                        $name = basename($_FILES["input_file"]["name"][$i]);
                        if($name){
                            $filepath = "img/". $name;
                            move_uploaded_file($fileTemp[$i], $filepath);
                            $this->imageModel->InsertImg($filepath, $id_habitacion);
                        }
                    }
                }
                $this->view->ShowLocation('admin');
            }else{
                $this->view->ShowLocation('login');
            }
        }
        //ELIMINA UNA HAB POR ID
        function DeleteHabitacion($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $habitacion_id = $params[':ID'];
                $images = $this->imageModel->GetImagenByHabitacion($habitacion_id);
                $this->model->DeleteHabitacion($habitacion_id);
                for($i=0; $i<count($images); $i++){
                    $imageInUse = $this->imageModel->SearchImageInUse($images[$i]->imagen);
                    if(!$imageInUse){
                        unlink($images[$i]->imagen);
                    }
                }
                $this->view->ShowLocation('admin');
            }else{
                $this->view->ShowLocation('login');
            }
        }
        //LLAMA LA VISTA PARA EDITAR UNA HAB POR ID
        function EditHabitacion($params = null){
            $logeado = $this->checkLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $phabitacion_id = $params[':ID'];
                $hotel = $this->HotelModel->Gethotel();
                $habitacion = $this->model->GetHabitacinById($habitacion_id);
                $images = $this->imageModel->GetImagenByHabitacin($habitacion_id);
                $this->view->ShowEditHabitacin($habitacion, $hotel, $images);
            }else{
                $this->view->ShowLocation('login');
            }
        }
        //LLAMA A ACTUALIZAR UNA
        function UpdateHabitacin($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $habitacion_id = $params[':ID'];
                if (isset($_POST['input_habitacion']) && isset($_POST['input_id_hotel']) &&
                    isset($_POST['input_capacidadMax']) && isset($_POST['input_cantCamas']) 
                    && isset($_POST['input_cantBanios'])&& isset($_POST['input_wifi'])&& isset($_POST['input_tv'])
                    && isset($_POST['input_descripcion'])&& isset($_POST['input_estado'])) {

                    $habitacion = $_POST['input_habitacion'];
                    $id_hotel = $_POST['input_id_hotel'];
                    $capacidadMax = $_POST['input_capacidadMax'];
                    $cantCamas = $_POST['input_cantCamas'];
                    $cantBanios = $_POST['input_cantBanios'];
                    $wifi = $_POST['input_wifi'];
                    $tv = $_POST['input_tv'];
                    $description = $_POST['input_description'];
                    $estado= $_POST['input_estado'];

                    $id_habitacion = $this->model->UpdateHabitacion($habitacion, $id_hotel, $capacidadMax, $cantCamas,$cantBanios, 
                    $wifi, $tv, $description, $estado);
                    $fileTemp = $_FILES['input_file']['tmp_name'];
                    for($i=0; $i<count($_FILES['input_file']['tmp_name']); $i++){
                        $name = basename($_FILES["input_file"]["name"][$i]);
                        if($name){
                        $filepath = "img/". $name;
                            move_uploaded_file($fileTemp[$i], $filepath);
                            $this->imageModel->InsertImg($filepath, $habitacion_id);
                        }
                    }
                }
                $this->view->ShowLocation('admin');
            }else{
                $this->view->ShowLocation('login');
            }
        }
        //LLAMA AL FILTRO DE LAS HABS POR HOTEL
        function FilterHabitacionByHotel($params = null){
            if (isset($_POST['select_brand'])) {
                $hotel_id = $_POST['select_brand'];
                $habitacion = $this->model->GetHabitacionByHotel($hotel_id);
                $hotel = $this->HotelModel->Gethotel();
                $this->view->ShowSearch($habitacion, $hotel, $user = null, $hotel_id);
            }
        }
        //LLAMA A LA VISTA EN DETALLE DE UNA HABs
        function ItemDetail($params = null){
            $logeado = $this->CheckLoggedIn();
            $habitacion_id = $params[':ID'];
            $habitacion = $this->model->GetHabitacionById($habitacion_id);
            $images = $this->imageModel->GetImagenByHabitacion($habitacion_id);
            $hotel_id = $habitacion->id_mhotel;
            $hotel = $this->HotelModel->GetHotelById($hotel_id);
            //prepara rango de valoracion de habs
            $starRank = 5;
            $stars = [];
            for ($i = $starRank; $i >= 1; $i--){
                array_push($stars, $i);
            }
            if($logeado){
                $user = $_SESSION['EMAIL'];
                $usuario = $this->userModel->GetUser($user);
                $Iduser = $usuario->id;
                $admin = $_SESSION['ADMIN'];
                $this->view->ShowItemDetail($habitacion, $hotel, $images, $stars, $user, $Iduser, $admin);
            }else{
                $this->view->ShowItemDetail($habitacion, $hotel, $images);
            }
        }
        //BORRA UNA IMAGEN
        function DeleteImg($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $image_id = $params[':ID'];
                $filepath = $this->imageModel->SearchFilepath($image_id);
                $this->imageModel->DeleteImg($image_id);
                //busco si esta imagen está relacionada a otro habitacion
                $imageInUse = $this->imageModel->SearchImageInUse($filepath->imagen);
                if(!$imageInUse){
                    unlink($filepath->imagen);
                }
                $habitacion_id = $params[':HABITACION'];
                $this->view->ShowLocation('edit/'. $habitacion_id);
            } else {
                $this->view->ShowLocation('login');
            }
        }
        //BUSCA ITEMS
        function SearchItem(){
            $habitacion=null;
            if(!empty($_POST["input_name"])&&!empty($_POST["select_price"])){
                $name = $_POST["input_name"];
                $rangocapacidad = $_POST["select_price"];
                $capacidadSeparado = explode("-", $rangocapacidad);
                $capacidadMinimo = $capacidadSeparado[0];
                $capacidadMaximo = $capacidadSeparado[1];
                $hahabitacion= $this->model->SearchItem($name, $capacidadMinimo, $capacidadMaximo);
            } else if(!empty($_POST["select_price"])){
                $rangocapacidad = $_POST["select_price"];
                $capacidadSeparado = explode("-", $rangocapacidad);
                $capacidadMinimo = $capacidadSeparado[0];
                $capacidadMaximo = $capacidadSeparado[1];
                $hahabitacion= $this->model->SearchItemByPrice($capacidadMinimo, $capacidadMaximo);
            } else if(!empty($_POST["input_name"])){
                $search = $_POST["input_name"];
                $hahabitacion= $this->model->SearchItemByName($search);
            }
            $logeado = $this->CheckLoggedIn();
            $hotel = $this->HotelModel->Gethotel();
            if($logeado){
                $user = $_SESSION['EMAIL'];
                $this->view->ShowSearch($habitacion, $hotel, $user);
            } else{
                $this->view->ShowSearch($habitacion, $hotel);
            }
        }
    }
?>