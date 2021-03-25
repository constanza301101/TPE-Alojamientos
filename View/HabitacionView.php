<?php

    require_once "./libs/smarty/Smarty.class.php";

    class HabitacionesView{

        private $title;
        private $titleEdit;
        private $smarty;

        function __construct(){
            $this->title = "Tabla de habitaciones";
            $this->titleEdit = "Editar habitaciones";
            $this->titleHotels = "Tabla de hoteles";
            $this->smarty = new Smarty();
        }
        //REDIRECCIONA LAS CONSTANTES PARA RUTEO
        function ShowLocation($action){
            header("Location: ".BASE_URL.$action);
        }
        //MUESTRA EL HOME
        function ShowHome($phabitaciones, $hoteles, $pagination, $page, $user = null){
            $this->smarty->assign('title', $this->title);
            $this->smarty->assign('phabitaciones', $phabitaciones);
            $this->smarty->assign('hoteles', $hoteles);
            $this->smarty->assign('pagination', $pagination);
            $this->smarty->assign('page', $page);
            $this->smarty->assign('user', $user);
            $this->smarty->display('templates/habitacion.tpl');
        }
        //VISTA PARA EDITAR UNA HABITACION
        function ShowEdithabitaciones($habitaciones, $hoteles, $images){
            $this->smarty->assign('habitaciones', $habitaciones);
            $this->smarty->assign('hoteles', $hoteles);
            $this->smarty->assign('images', $images);
            $this->smarty->display('templates/edithabitaciones.tpl');
        }
        //VISTA DE UNA HABITACIONES EN DETALLE - TABLA HABITACIONES Y TABLA DEL HOTEL
        function ShowItemDetail($habitaciones, $hotel, $images = null, $stars = null, $user = null, $Iduser = null, $admin = null){
            $this->smarty->assign('habitaciones', $habitaciones);
            $this->smarty->assign('hotel', $hotel);
            $this->smarty->assign('hotel', $hotel);
            $this->smarty->assign('images', $images);
            $this->smarty->assign('stars', $stars);
            $this->smarty->assign('user', $user);
            $this->smarty->assign('Iduser', $Iduser);
            $this->smarty->assign('admin', $admin);
            $this->smarty->display('templates/itemDetail.tpl');
        }
        //VEO LO BUSCADO
        function ShowSearch($phabitaciones, $habitaciones, $user=null, $hotel_id = null){
            $this->smarty->assign('title', $this->title);
            $this->smarty->assign('phabitaciones', $phabitaciones);
            $this->smarty->assign('hoteles', $hoteles);
            $this->smarty->assign('hotel_id', $hotel_id);
            $this->smarty->assign('user', $user);
            $this->smarty->display('templates/showSearch.tpl');
        }
    }
?>