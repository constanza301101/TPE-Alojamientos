<?php
require_once 'AlojamientoModel/HotelModel.php';
require_once 'AlojamientosView/AlojamientoView.php';

class HotelController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelModel();
        $this->view = new HotelView();
    }

    function showHabitacionesByHotel() {

        // verifica datos obligatorios
        if (!isset($_GET['id_hotel']) || empty($_GET['id_hotel'])) {
            $this->view->renderError();
            return;
        }
      
        // obtiene el hotel enviado por GET 
        $hotel= $_GET['id_hotel'];
        // obtengo las habitaciones del modelo
        $habs = $this->model->getHabitacionesByHotel($hotel);


        // actualizo la vista
        $this->view->renderHabitacionesByHotel($hotel, $habs);

    }

    function showHabitaciones() {

        // obtener todas las habitaciones
        $habitaciones = $this->model->getHabitaciones();

        // actualizo la vista
        $this->view->showHabitaciones($habitaciones);
    }

    function showHoteles() {

        // obtener todas las habitaciones
        $hoteles = $this->model->getHoteles();

        // actualizo la vista
        $this->view->renderHoteles($hoteles);
    }

    function insertHotel(){
        $this->view->renderInsertHotel();

    }
}