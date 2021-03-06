<?php
    require_once 'Controller/AdminController.php';
    require_once 'Controller/UserController.php';
    require_once 'Controller/PublicController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "PublicController", "Home");
    $r->addRoute("habsporhotel", "POST", "PublicController", "HabitacionesPorHotel");
    $r->addRoute("habitaciones", "GET", "PublicController", "showHabitaciones");
    $r->addRoute("hoteles", "GET", "PublicController", "showHoteles");
    
   

    //Login/Logout
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("VerificarUsuario", "POST", "UserController", "VerificarUsuario");
    $r->addRoute("registrar", "GET", "loginController", "showRegisterForm");
    $r->addRoute("registerUser", "POST", "loginController", "registerUser");
    
    $r->addRoute("verMasHabitacion/:IDHA/:IDHO", "GET", "PublicController", "ShowHabitacion");

    //borrar
    $r->addRoute("deleteHabitacion/:IDHA/:IDHO", "GET", "AdminController", "DeleteHabitacion");
    $r->addRoute("deleteHotel/:ID", "GET", "AdminController", "DeleteHotel");

    //insertar
    $r->addRoute("FormInsertHotel", "GET", "AdminController", "mostrarFormHotel");
    $r->addRoute("insertarHab", "POST", "AdminController", "agregar_habs");
    $r->addRoute("FormInsertHab", "GET", "AdminController", "mostrarFormInsertHab");
    $r->addRoute("insertHotel", "POST", "AdminController", "agregar_hotels");

    //editar
    $r->addRoute("FormEditHotel/:ID", "GET", "AdminController", "mostrarFormHotel");
    $r->addRoute("editarhab", "POST", "AdminController", "editarHabs");
    $r->addRoute("FormEditHab/:IDHA/:IDHO", "GET", "AdminController", "mostrarFormHab");
    $r->addRoute("editarHotel/:ID", "POST", "AdminController", "editarHotel");
    
     //admin
     $r->addRoute("editUser/:ID", "GET", "AdminController", "editUserMode"); 
     $r->addRoute("editarUsuario/:ID", "POST", "AdminController", "editUser"); 
     
    //Ruta por defecto.
    $r->setDefaultRoute("PublicController", "Home");  

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>



