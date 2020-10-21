<?php
//tengo que conectar con todos los templates para el admin
require_once './libs/smarty/Smarty.class.php';


class AdminView{

    public function __construct(){
        $this->title = "HOTELERIA";
        $this->smarty = new Smarty();
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

    function editarHabs($habitacion, $hoteles){
        
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->assign('habitacion', $habitacion);
        $this->smarty->assign('titulo', $this->title);
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
        
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->display('./templates/error.tpl');
    }

    function ShowAdmin(){
        header("Location: ".BASE_URL."home");
        
    } 
    function renderHabitaciones($habitaciones, $logeado){
        
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->assign('titulo_s', $this->title);
        $this->smarty->assign('logeado', $logeado);
        $this->smarty->display('./templates/habitaciones.tpl');
    }

}   
?>