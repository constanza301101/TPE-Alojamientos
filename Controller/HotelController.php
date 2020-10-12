<?php
require_once 'Model/HotelModel.php';
require_once 'View/HotelView.php';

class HotelController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelModel();
        $this->view = new HotelView();
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