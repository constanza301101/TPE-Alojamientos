<?php
    require_once 'Controller/HabitacionController.php';
    require_once 'Controller/HotelController.php';
    require_once 'Controller/LoginController.php';
    //require_once 'Controller/UserController.php';
    require_once 'routerClass.php';

    // CONSTANTES PARA RUTEO
    define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    //HOME
    $r->addRoute("home/:PAGE", "GET", "HabitacionController", "Home");
    $r->addRoute("Hotel", "GET", "MHotelController", "HomeMHotel");
    $r->addRoute("filterHotel", "POST", "HabitacionController", "FilterHabitacionByHotel");
    $r->addRoute("itemDetail/:ID", "GET", "HabitacionController", "ItemDetail");
    $r->addRoute("search", "POST", "HabitacionController", "SearchItem");
    //LOGIN
    $r->addRoute("login", "GET", "LoginController", "Login");
    $r->addRoute("register", "GET", "LoginController", "Register");
    $r->addRoute("newUser", "POST", "LoginController", "NewUser");
    $r->addRoute("verify", "POST", "LoginController", "VerifyUser");
    $r->addRoute("admin", "GET", "LoginController", "ShowAdmin");
    $r->addRoute("logout", "GET", "LoginController", "Logout");
    //HABITACION
    $r->addRoute("insert", "POST", "HabitacionController", "InserHabitacion");
    $r->addRoute("delete/:ID", "GET", "HabitacionController", "DeletHabitacion");
    $r->addRoute("edit/:ID", "GET", "HabitacionController", "EdiHabitacion");
    $r->addRoute("update/:ID", "POST", "HabitacionController", "UpdatHabitacion");
    //HOTEL
    $r->addRoute("insertHotel", "POST", "HotelController", "InsertHotel");
    $r->addRoute("deleteHotel/:ID", "GET", "HotelController", "DeleteHotel");
    $r->addRoute("editHotel/:ID", "GET", "HotelController", "EditHotel");
    $r->addRoute("updateHotel/:ID", "POST", "HotelController", "UpdateHotel");
    //ADMIN USER
    $r->addRoute("adminUsers", "GET", "UserController", "ShowUsers");
    $r->addRoute("editUser/:ID", "GET", "UserController", "EditUser");
    $r->addRoute("updateUser/:ID", "POST", "UserController", "UpdateUser");
    $r->addRoute("deleteUser/:ID", "GET", "UserController", "DeleteUser");
    //ELIMINA IMAGEN
    $r->addRoute(":HABITACION/deleteImg/:ID", "GET", "HabitacionController", "DeleteImg");
    //Ruta por defecto.
    $r->setDefaultRoute("HabitacionController", "Home");
    //run
    //$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
    ?>