<?php

    require_once "./libs/smarty/Smarty.class.php";

    class HotelView{

        private $title;
        private $smarty;
        
        function __construct(){
            $this->title = "Tabla de Hoteles";
            $this->smarty = new Smarty();
        }
        //MUESTRO LA TABLA DE HOTELES
        function ShowHoteles($hoteles){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('hoteles', $hoteles);
            $this->smarty->display('templates/hoteles.tpl');
        }
        //VISTA PARA EDITAR UN HOTEL
        function ShowEdithotel($hotel){
            $this->smarty->assign('hotel', $hotel);
            $this->smarty->display('templates/editar_hotels.tpl');  
        }
    }
?>