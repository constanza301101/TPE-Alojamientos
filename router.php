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
    
}