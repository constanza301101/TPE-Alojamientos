<?php

//añadio el model y el view
require_once "./View/UserView.php";
require_once "./Model/UserModel.php";

//le assignamos la class
class UserController{
    private $view;
    private $model;
    
    //generar instancia de la clase
    function __construct(){
        //creamos insancia de la clase
        $this->view = new LoginView;
    }

    //funcion de loguarse con el view
    function Login(){
        //tengo que ver como lo hago desde 0 con smarty
        $this->view->MostrarLogin();     

    }

    //funcion de verificar el usuario
    function VerificarUsuario(){
        //nos traemos los datos de la base de datos 
        $IDlogin = $_POST["IDLogin"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(isset($usuario)){

            $usuarioBD = $this->model->ObtenerUsuario($email);{}

            if(isset($email) && $usuarioBD){
                // Existe el usuario
                //verificamos el password 
                if (password_verify($pass, $usuarioBD->password)){
                    //iniciamos sesion
                    session_start();
                    $_SESSION["IDLogin"] = $usuarioBD->IDLogin;
                    $_SESSION["EMAIL"] = $usuarioBD->email;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    
                    //nos dirigimos al home
                    header("Location: ".BASE_URL."home");
                    die();//equivale al exit
                }
                //password incorrercta 
                else{
                    $this->view->MostrarLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->MostrarLogin("El usuario no existe");
            }
        }
    }

    //chequear si esta logueado

    //funcion de desloguearse
    //function Logout(){
        //session iniciada
      //  session_start();
        //sesion cerrrada
        //session_destroy();
        //redirige al login 
        //header("Location: ".LOGIN);
    //}
} 





?>