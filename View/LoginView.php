<?php
require_once "./libs/smarty/Smarty.class.php";

class LoginView{
    private $title;
    private $smarty;

    function __construct(){
        $this->title = "Tabla de Habitaciones";
        $this->smarty = new Smarty();
    }
    //MUESTRA EL LOGIN
    function ShowLogin($message = null){
        $this->smarty->assign('message', $message);
        $this->smarty->display('templates/login.tpl');
    }
    //MUESTRA EL FORMULARIO DE REGISTRO
    function ShowRegister($message = null, $user = null){
        $this->smarty->assign('message', $message);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/register.tpl');
    }
    //MUESTRA LA PAGINA PARA EL ADMIN
    function ShowVerify($habitaciones, $hoteles, $images = null){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->assign('images', $images);
        $this->smarty->display('templates/verify.tpl');
    }
}
?>