<?php

require_once "./libs/smarty/Smarty.class.php";

//mostrar el login
class UserView{
    private $title;

    function __construct(){
        $this->title = "Login";
    }

    function MostrarLogin(){

        $smarty = neW smarty (); 
        //le asignamos el titulo y el mensaje 
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('message', $message);
        // muestro el template para el formulario de login
        $smarty->display('templates/login.tpl'); 
    }
}
?>