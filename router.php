<?php
    require_once './Controller/AdminController.php';
    require_once './Controller/UserController.php';
    require_once './Controller/PublicController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "PublicController ", "ShowHome");
    $r->addRoute("habsporhotel", "POST", "PublicController ", "HabitacionesPorHotel");
    $r->addRoute("habitaciones", "GET", "PublicController ", "showHabitaciones");
    $r->addRoute("hoteles", "GET", "PublicController ", "showHoteles");

    //Login/Logout
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("verificarUser", "POST", "UserController", "VerificarUsuario");

    //admin
    $r->addRoute("insert", "POST", "AdminController", "InsertHab");
    $r->addRoute("delete/:ID", "GET", "AdminController", "DeleteHabById");
    $r->addRoute("edit/:ID", "GET", "AdminController", "EditHabById");

    //Ruta por defecto.
    $r->setDefaultRoute("PublicController", "ShowHome");   

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>



