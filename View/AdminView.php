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
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('./templates/login.tpl');
    }


    function ShowLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function ShowAdmin(){//tengo que hacer la planilla todavia 
        header("Location: ".BASE_URL."admin");
    } 

}   
?>