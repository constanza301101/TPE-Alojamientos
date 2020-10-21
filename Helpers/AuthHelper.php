<?php

class AuthHelper
{

    function __construct()
    {
    }
    //array de sesion
    function login($userFromDB)
    {
        session_start();
        $_SESSION['USUARIO'] = $userFromDB->usuario;
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

    function checkLogIn()
    {   
        session_start();
        if(!isset($_SESSION['USUARIO'])){
            return false;
        }else return true;
    }  
 }
