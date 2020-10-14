<?php

require_once "./libs/smarty/Smarty.class.php";

//mostrar el login
class UserView{
    private $title;

    function __construct(){
        $this->title = "Login";
        $smarty = neW smarty (); 
    }

    function MostrarLogin(){

        //le asignamos el titulo y el mensaje 
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('message', $message);
        // muestro el template para el formulario de login
        $smarty->display('templates/login.tpl'); 
    }
    
    function showHomeLocation(){
        $smarty->assign('logeado', true);
        $smarty->display('templates/admin_hotels.tpl'); 
    }
}
?>