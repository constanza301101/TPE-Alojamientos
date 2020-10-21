<?php

//añadio el model y el view
require_once "./View/AdminView.php";
require_once "./Model/UserModel.php";

//le assignamos la class
class UserController{
    private $view;
    private $model;
    
    //generar instancia de la clase
    function __construct(){
        //creamos insancia de la clase
        $this->view = new AdminView();
        $this->model = new UserModel();
    }

    //funcion de loguarse con el view
    function Login(){
        //tengo que ver como lo hago desde 0 con smarty
        $logeado=$this->checkLoggedIn();
        $this->view->showLogin($logeado);     

    }

    function VerificarUsuario()
    {
        $usuario = $_POST['inputUser'];
        $contrasena = $_POST['inputPass'];

        if (isset($usuario)) {
            $userFromDB = $this->model->getUsuario($usuario);
            
            if ((isset($userFromDB)) && ($userFromDB)) {
                $password = $userFromDB->password;
                if (password_verify($contrasena, $password)) {
                    
                    session_start();
                    $_SESSION['USUARIO'] = $userFromDB->usuario;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $this->view->ShowAdmin();
                } else {
                    $this->view->showError("Contraseña incorrecta",$logeado);
                }
            } else {
                $this->view->showError("Usuario no registrado",$logeado);
            }
        }
    }

    //chequear si esta logueado
    private function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['USUARIO'])){
            return false;
        }
        else{
            return true;
        }
    }

   
    //log out
    function Logout(){
        session_start();
        session_destroy();
        $logeado=$this->checkLoggedIn();
        $this->view->showHomeLocation($logeado);
    }
} 





?>