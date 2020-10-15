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
    }

    //funcion de loguarse con el view
    function Login(){
        //tengo que ver como lo hago desde 0 con smarty
        
        $this->view->showLogin();     

    }

    function VerificarUsuario(){
        $logeado=$this->checkLoggedIn();
        if (empty($_POST['input_email_login']) || !isset($_POST['input_email_login']) || 
        empty($_POST['input_contraseña_login']) || !isset($_POST['input_contraseña_login'])){
            $this->view->showError("No se pudo iniciar sesion. Por favor complete todos los campos.", $logeado);
        }
        else{
            $email=$_POST['input_email_login'];
            $password=$_POST['input_contraseña_login'];
            $usuarioDB=$this->model->getUsuario($email);

            if(isset($usuarioDB) && $usuarioDB){
                if(password_verify($password, $usuarioDB->password)){
                    session_start();
                    $_SESSION["email"] = $usuarioDB->email;

                    $this->view->showHomeLocation();
                }
                else{
                    $this->view->showError("La password ingresada es incorrecta. Por favor intente nuevamente", $logeado);
                }
            }
            else{
                $this->view->showError("El email ingresado no esta registrado. Por favor intente nuevamente", $logeado);
            }
        }
    }

    //chequear si esta logueado
    private function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['email'])){
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