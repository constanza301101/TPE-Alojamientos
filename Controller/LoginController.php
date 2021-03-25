<?php
    require_once "./View/LoginView.php";
    require_once "./View/HabitacionView.php";
    require_once "./Model/UserModel.php";
    require_once "./Model/HabitacionModel.php";
    require_once "./Model/HotelModel.php";
    require_once "./Model/ImgModel.php";
    require_once "Controller/Helper.php";

    class LoginController extends Helper {

        private $view;
        private $model;
        private $HabitacionView;
        private $HabitacionModel;
        private $HotelModel;
        private $ImgModel;

        function __construct(){
            $this->view= new LoginView();
            $this->model= new UserModel();
            $this->HabitacionView = new HabitacionView();
            $this->HabitacionModel = new HabitacionModel();
            $this->HotelModel = new HotelModel();
            $this->IngModel = new ImgModel();
        }
        //LLAMA AL LOGIN
        function Login(){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $this->HabsView->ShowLocation('admin');
            } else {
                $this->view->ShowLogin();
            }
        }
        //LLAMA A LA VISTA DEL REGISTRO DE UN NUEVO USUARIO
        function Register(){
            $this->view->ShowRegister();
        }
        //GENERA UN NUEVO USUARIO
        function NewUser(){
            if(!empty($_POST['input_username']) && !empty($_POST['input_password']) && !empty($_POST['repeat_password'])){
                $user = $_POST['input_username'];
                $password = $_POST['input_password'];
                $admin = 0;
                $exists = $this->model->GetUser($user);
                if(!$exists){
                    if($password == $_POST['repeat_password']){
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);
                        $this->model->CreateUser($user, $password_hash, $admin);
                        $this->VerifyUser();
                    }else{
                        $user = $_POST['input_username'];
                        $this->view->ShowRegister('Las contraseñas no coinciden', $user);
                    }
                } else {
                    $this->view->ShowRegister('Este usuario ya existe');
                }
            }else{
                $this->view->ShowRegister('Complete todos los campos');
            }
        }
        //LLAMO AL LOGOUT
        function Logout(){
            session_start();
            session_destroy();
            $this->HabitacionView->ShowLocation('login');
        }
        //VERIFICO MI USUARIO
        function VerifyUser(){
            $user = $_POST["input_username"];
            $password = $_POST["input_password"];

            if(isset($user)){
                $userFromDB = $this->model->GetUser($user);
                if(isset($userFromDB) && $userFromDB){
                    if (password_verify($password, $userFromDB->password)){
                        session_start();
                        $_SESSION["EMAIL"] = $userFromDB->email;
                        $_SESSION['ADMIN'] = $userFromDB->admin;
                        if($userFromDB->admin == 1){
                            $this->HabitacionView->ShowLocation('admin');
                        }else{
                            $this->HabitacionView->ShowLocation('home');
                        }
                    }else{
                        $this->view->ShowLogin("Contraseña incorrecta");
                    }
                }else{
                    $this->view->ShowLogin("El usuario no existe");
                }
            }
        }
        //MUESTRA LA PAGINA DONDE SE PUEDE MODIFICAR LOS HOTELES Y HABITACIONES
        function ShowAdmin(){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $hotel = $this->HotelModel->GetHotel();
                $Habitacion = $this->HabitacionModel->GetHabitacion();
                $imagen = $this->ImgModel->GetImagen();
                $this->view->ShowVerify($Habitacion, $hotel,$imagen);
            }else{
                $this->HabitacionView->ShowLocation('login');
            }
        }
    }
?>