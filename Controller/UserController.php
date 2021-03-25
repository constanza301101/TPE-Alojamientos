<?php
    require_once "./View/UserView.php";
    require_once "./View/HabitacionesView.php";
    require_once "./Model/UserModel.php";
    require_once "Helper.php";

    class UserController extends Helper {

        private $view;
        private $model;
        private $HabitaionesView;

        function __construct(){
            $this->view= new UserView();
            $this->model= new UserModel();
            $this->HabitacionesView = new HabitacionesView();
        }
        //VISTA PARA EL ADMINISTRADOR DE LOS USUARIOS
        function ShowUsers(){
            $logeado = $this->checkLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $users = $this->model->GetUsers();
                $this->view->ShowUsers($users);
            }else{
                $this->HabitacionesView->ShowLocation('login');
            }
        }
        //LLAMA A LA VISTA PARA EDITAR UN USUARIO
        function EditUser($params = null){
            $logeado = $this->checkLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id = $params[':ID'];
                $user = $this->model->GetUserById($id);
                $this->view->ShowEdit($user);
            }else{
                $this->HabitacionesView->ShowLocation('login');
            }
        }
        //ACTUALIZA LOS DATOS DE UN USUARIO
        function UpdateUser($params = null){
            $logeado = $this->checkLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id = $params[':ID'];
                $user = $this->model->GetUserById($id);
                if($user->admin == 0){
                    if(isset($_POST['selectAdmin'])){
                        $admin = $_POST['selectAdmin'];
                        $this->model->UpdateUser($admin, $id);
                        $this->HabitacionesView->ShowLocation('adminUsers');
                    }
                }else{
                    $existsAdmin = $this->model->ExistsAdmin();
                    $numberOfAdmin = 0;
                    foreach($existsAdmin as $admin){
                        $numberOfAdmin++;
                    }
                    if($numberOfAdmin != 1 && $numberOfAdmin != 0){
                        if($user->email != $_SESSION['EMAIL']){
                           if(isset($_POST['selectAdmin'])){
                                $admin = $_POST['selectAdmin'];
                                $this->model->UpdateUser($admin, $id);
                                $this->HabitacionesView->ShowLocation('adminUsers');
                            }
                        }else{
                            $this->view->ShowEdit($user, "No se pueden cambiar permisos, ya que estás haciendo uso de este administrador.");
                        }
                    }else{
                        $this->view->ShowEdit($user, "No se pueden quitar permisos ya que es el ultimo administrador del sistema.");
                    }
                }
            }else{
                $this->HabitacionesView->ShowLocation('login');
            }
        }
        //ELIMINA UN USUARIO
        function DeleteUser($params = null){
            $logeado = $this->CheckLoggedIn();
            if($logeado && $_SESSION['ADMIN'] == 1){
                $id = $params[':ID'];
                $typeOfUser = $this->model->GetUserById($id);
                if($typeOfUser->admin == 0){
                    $this->model->DeleteUser($id);
                    $this->HabitacionesView->ShowLocation('adminUsers');
                }else{
                    $existsAdmin = $this->model->ExistsAdmin();
                    $numberOfAdmin = 0;
                    foreach($existsAdmin as $admin){
                        $numberOfAdmin++;
                    }
                    if($typeOfUser->email == $_SESSION['EMAIL']){
                        $users = $this->model->GetUsers();
                        $this->view->ShowUsers($users, "No se puede eliminar este usuario ya que está haciendo uso de este.");
                    }else if($numberOfAdmin != 1 && $numberOfAdmin != 0){
                        $this->model->DeleteUser($id);
                        $this->HabitacionesView->ShowLocation('adminUsers');
                    }else{
                        $users = $this->model->GetUsers();
                        $this->view->ShowUsers($users, "No se puede eliminar este usuario ya que es el ultimo administrador del sistema.");
                    }
                }
            }else{
                $this->HabitacionesView->ShowLocation('login');
            }
        }
    }
?>