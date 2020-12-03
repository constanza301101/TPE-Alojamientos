<?php

//añadio el model y el view
require_once "./View/AdminView.php";
require_once "./Model/UserModel.php";
require_once "./helpers/AuthHelper.php";
//le assignamos la class
class UserController{
    private $view;
    private $model;
    private $helper;
    
    //generar instancia de la clase
    function __construct(){
        //creamos insancia de la clase
        $this->view = new AdminView();
        $this->model = new UserModel();
        $this->helper = new AuthHelper();
    }

    //funcion de loguarse con el view
    function Login(){
        //tengo que ver como lo hago desde 0 con smarty
        $logeado=$this->helper->checkLogIn();
        $this->view->showLogin($logeado);     

    }

    function VerificarUsuario()
    {
        $logeado=$this->helper->checkLogIn();
        $usuario = $_POST['inputUser'];
        $contrasena = $_POST['inputPass'];

        if (isset($usuario)) {
            $userFromDB = $this->model->getUsuario($usuario);
            
            if ((isset($userFromDB)) && ($userFromDB)) {
                $password = $userFromDB->password;
                if (password_verify($contrasena, $password)) {
                    
                    session_start();
                    $_SESSION['USUARIO'] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $this->view->showHomeLocation($this->helper->checkLogIn());
                    die();
                } else {
                    $this->view->showError("Contraseña incorrecta",$logeado);
                }
            } else {
                $this->view->showError("Usuario no registrado",$logeado);
            }
        }
    }

    //log out
    function Logout(){
        session_start();
        session_destroy();
        $logeado=$this->helper->checkLogIn();
        $this->view->showHomeLocation($logeado);
    }
} 
function showRegisterForm(){
    $this->AdminView->renderRegisterForm();
}

 function registerUser(){
        if((!empty($_POST['nombre'])) && (!empty($_POST['input_user'])) && (!empty($_POST['input_User']))
         && (!empty($_POST['input_password'])) && (!empty($_POST['input_Password']))){
            $name = $_POST['nombre'];
            $username = $_POST['input_user'];
            $Username =  $_POST['input_User'];
            $password = $_POST['input_password'];
            $Password = $_POST['input_Password'];
            $existeUsuario = $this->userModel->getUserInfo($username);
            if (!$existeUsuario) {
                //un if para saber si el 1er mail es igual al 2do y lo mismo que con el password
                //si son iguales 
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        //si se puedo registrar, establecer un username, el timeout
                       //si no un error
                        else{ $this->AdminView->renderError("Registro inválido. Reintente");}
                    else {
                        $this->AdminView->renderRegisterForm('Las contraseñas no coinciden');
                        die();
                    }
                }
                else {
                    $this->AdminView->renderRegisterForm('Los emails no coinciden');
                    die();
                }
            }
            else {
                $this->AdminView->renderRegisterForm('El mail ingresado no esta disponible');
                die();
            }
        }
    }





?>