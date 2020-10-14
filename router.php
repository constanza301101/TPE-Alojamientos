<?php
    require_once 'Controller/HabsController.php';
    require_once 'Controller/HotelController.php';
    require_once 'Controller/UserController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "HotelController", "Home");

   
    $r->addRoute("insertHab", "POST", "HabsController", "InsertHab");
    $r->addRoute("deleteHab/:ID", "GET", "HabsController", "DeleteHabById");
    $r->addRoute("editHab/:ID", "GET", "HabsController", "EditHabById");

    $r->addRoute("insertHotel", "POST", "HotelController", "InsertHotel");
    $r->addRoute("deleteHotel/:ID", "GET", "HotelController", "DeleteHotel");
    $r->addRoute("editHotel/:ID", "GET", "HotelController", "UpdateHotel");

    //Ruta por defecto.
    $r->setDefaultRoute("HotelController", "Home");

    //Advance
    $r->addRoute("autocompletar", "GET", "HabsController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>



