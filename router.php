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
    $r->addRoute("home", "GET", "HabsController", "Home");
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");

    $r->addRoute("verifyUser", "POST", "UserController", "VerificarUsuario");

    $r->addRoute("habitaciones", "GET", "HabsController", "Home");

    //Esto lo veo en TasksView
    $r->addRoute("insert", "POST", "HabsController", "InsertHab");
    $r->addRoute("delete/:ID", "GET", "HabsController", "DeleteHabById");
    $r->addRoute("edit/:ID", "GET", "HabsController", "EditHabById");

    //Ruta por defecto.
    $r->setDefaultRoute("HotelController", "showHoteles");

    //Advance
    $r->addRoute("autocompletar", "GET", "HabsController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>



