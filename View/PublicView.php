<?php
require_once './libs/smarty/Smarty.class.php';

class publicView{
    public function __construct(){
        $this->title = "HOTELERIA";
        $this->smarty = new Smarty();
    }
    function Home($hoteles){
        $this->smarty->assign('titulo_s', $this->title);
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->assign('logeado', false);
        $this->smarty->display('./templates/index.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
    function renderHabitaciones($habitaciones) {
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->assign('logeado', false);
        $this->smarty->display('./templates/habitaciones.tpl');
    }

    function renderHoteles($hoteles) {
        $this->smarty->assign('hoteles', $hoteles);
        $this->smarty->assign('logeado', false);
        $this->smarty->display('./templates/hoteles.tpl');
    }


    function showError($mensaje=" ", $logeado){
        $this->smarty->assign('BASE_URL' , BASE_URL);
        $this->smarty->assign('logeado',$logeado);
        $this->smarty->assign('message', $mensaje);
        $this->smarty->display('./templates/error.tpl');
    }

    function showMasHabitacion($habitacion, $logeado){
        $this->smarty->assign('BASE_URL' , BASE_URL);
        $this->smarty->assign('habitacion', $habitacion);
        $this->smarty->assign('logeado', $logeado);
        $this->smarty->display('./templates/habitacion.tpl');

    }
}



?>