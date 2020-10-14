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
        $this->smarty->display('./templates/index.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
    function renderHabitaciones($habitaciones) {
        $this->smarty->assign('habitaciones', $habitaciones);
        $this->smarty->display('./templates/habitaciones.tpl');
    }
}



?>