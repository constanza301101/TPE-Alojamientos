<?php
//tengo que conectar con todos los templates para el admin
require_once './libs/smarty/Smarty.class.php';


class AdminView{

    public function __construct(){
        $this->title = "HOTELERIA-Usted esta logueado";
        $this->smarty = new Smarty();
    }
    function Admin($habitaciones, $hoteles){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->assign('hoteles', $hoteles);

        $this->smarty->display('./templates/admin.tpl');//tengo que hacer la planilla todavia 
    }
    function AgregarHotel($hoteles){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->display('./templates/agregar_hotels.tpl');
    }
    function AgregarHabs($habitaciones){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->display('./templates/agregar_habs.tpl');
    }
    function editarHoteles($hoteles){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->display('./templates/editar_hotels.tpl');
    }

    function editarHabs($habitaciones){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->display('./templates/editar_habs.tpl');
    }

    
    function showLogin($mensaje = ''){
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('logeado', false);
        $this->smarty->display('./templates/login.tpl');
    }

    function showError($mensaje=" ", $logeado){
        $this->smarty->assign('BASE_URL' , BASE_URL);
        $this->smarty->assign('logeado',$logeado);
        $this->smarty->assign('message', $mensaje);
        $this->smarty->display('./templates/error.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."login");
    }

    function ShowAdmin(){
        header("Location: ".BASE_URL."admin");
    } 

}   
?>