<?php
require_once 'APublicModel/PublicModel.php';
require_once 'APublicView/PublicView.php';

class PublicController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new PublicModel();
        $this->view = new PublicView();
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

        // llmar el modelo para obtener todas las habitaciones
        $habitaciones = $this->model->getHabitaciones();

        // actualizo la vista
        $this->view->renderHabitaciones($habitaciones);
    }

    function showHoteles() {

        // llmar el modelo para obtener todas las habitaciones
        $hoteles = $this->model->getHoteles();

        // actualizo la vista
        $this->view->renderHoteles($hoteles);
    }

}