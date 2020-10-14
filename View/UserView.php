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
        $smarty->assign('titulo_s', $this->title);
        $smarty->display('templates/login.tpl'); 
    }
    
    function showHomeLocation(){
        $smarty->assign('logeado', true);
        $smarty->display('templates/admin_hotels.tpl'); 
    }
}
?>