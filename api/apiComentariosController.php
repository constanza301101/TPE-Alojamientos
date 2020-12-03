<?php
require_once './Model/ComentariosModel.php';
require_once './Model/UserModel.php';
require_once './apiapiController.php';
require_once './Helpers/AuthHelper.php';
require_once './Controller/AdminController.php';

class apiComentariosController extends apiController {
    private $comentariostModel;
    private $userModel;
    private $view;

    function __construct() {
        parent::__construct();
        $this->comentariosModel = new ComentariosModel();
        $this->userModel = new UserModel();
        $this->view = new apiView();
    }

    public function showComentarios($params = null) {
        $comentarios = $this->comentariosModel->getComentarios();
        if(!empty($comentarios)){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("No hay comentarios", 404);
        }
        
    }

    public function showComentarios($params = null){
        $id = $params[':ID'];
        $comentario = $this->comentariosModel->getComentarios($id);
        if (!empty($comentario)){
            $this->view->response($comentarios, 200);
        }
        else {
            $this->view->response("El comentario no existe", 404);
        }
    }
    
    public function deleteComentarios($params = null) {
        $id = $params[':ID'];
        $resultado = $this->comentariosModel->deleteComentarios($id);
        
        if($resultado > 0){
            $this->view->response("El comentario con el id=$id fue eliminado", 200);
        }
        else{
            $this->view->response("El comentario con el id=$id no existe", 404);
        }
    }

    public function addComentarios($params=[]){
        // devuelve el objeto JSON enviado por POST
        $body = $this->getData();

        $idUsuario = $body->usuario_id;
        $idHotel = $body->hotel_id;
        $puntaje = $body->puntaje;
        $comentario = $body->comentario;

        $response = $this->comentariossModel->addComentariosModel($idUsuario, $idHotel, $puntaje, $comentario);
        if (!empty($response)) {
            $this->view->response($this->comentariosModel->getComentarios(), 200);
            die();
        }else{
            $this->view->response("El comentario no se pudo insertar", 404);
            die();
        }
    }

}