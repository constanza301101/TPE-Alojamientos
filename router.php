<?php
require_once 'AlojamientosController/AlojamientoController.php';

// instancio la clase del controlador
$controller = new AlojamientoController();

// simulamos un router


if (isset($_GET['id_hotel'])) {
    $controller->showHabitacionesByHotel();
}
else {
    if (isset($_GET['all'])){
        if($_GET['all']=='habitaciones'){
            $controller->showHabitaciones();
        }
        if($_GET['all']=='hoteles'){
            $controller->showHoteles();
        }
    }
    if (isset($_GET['op'])){
        if($_GET['op']=='ins'){
            $controller->insertHotel();
        }
        if($_GET['op']=='login'){
            $controller->Login();
        }
    }
    
}