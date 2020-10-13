<?php
require_once './Model/HabitacionModel.php';
require_once './View/HabitacionView.php';

class HabitacionController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new HabitacionModel();
        $this->view = new HabitacionView();
    }

    function showHabitaciones() {

        // obtener todas las habitaciones
        $Habitaciones = $this->model->GetHabs();

        // actualizo la vista
        $this->view->renderHabitaciones($Habitaciones);
    }

    function insertHabitacion(){
        $this->view->renderInsertHabitacion();

    }
}