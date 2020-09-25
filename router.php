<?php
require_once 'AlojamientosController/AlojamientoController.php';

// instancio la clase del controlador
$controller = new AlojamientoController();

// simulamos un router


if (isset($_GET['id_hotel'])) {
    $controller->showHabitacionesByHotel();
}
else {
    $controller->showHabitaciones();
}