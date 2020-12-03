<?php

class AuthHelper
{

    function __construct()
    {
    }
    //array de sesion
    /*function login($userFromDB)
    {
        session_start();
        $_SESSION['USUARIO'] = $userFromDB->usuario;
        $_SESSION['LAST_ACTIVITY'] = time();
    }*/

    public function login(){
        if(!isset($_SESSION)){ 
            session_start(); 
            if (!isset($_SESSION['usuario'])){
                header("Location: ".BASE_URL."login");
                die();
            }else{
                // Pasados los 2 minutos de inactividad, se cierra automaticamente la sesión
                if(isset($_SESSION['timeout']) && (time()-$_SESSION['timeout'] > 800)){
                    header("Location: ".BASE_URL."logout");  
                    die();
                }
                // De lo contrario, se actualiza el temporizador
                $_SESSION['timeout'] = time();
            }
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

   
    static public function checkLogIn() { 
        if (!isset($_SESSION)){
            session_start();
            if (isset($_SESSION['usuario'])) {
                return true;
            }       
            else{
                return false;
            }
        }else{
            if (isset($_SESSION['usuario'])) {
                return true;
            }       
            else{
                return false;
            }
        }
    }

    public function isAdmin(){
        if (!isset($_SESSION)){
            session_start();
            if (isset($_SESSION['usuario'])){
                if($_SESSION['admin'] === "1"){
                    return true;
                }
                else{
                    return false;
                }
            }
        }else{
            if (isset($_SESSION['usuario'])){
                if($_SESSION['admin'] === "1"){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }  
 }
