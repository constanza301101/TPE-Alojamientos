<?php
require_once './Model/ComentariosModel.php';
require_once 'apiController.php';

class apiComentariosController extends apiController {

    function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();
    }

    public function GetComments($params = null) {
        $id_habitacion = $params[':ID'];
        $comments = $this->model->GetCommentByhabitacion($id_habitacion);
        if (!empty($comments) || sizeof($comments) == 0) {
            $this->view->response($comments, 200);
        }else{
            $this->view->response($comments, 404);
        }
    }

    public function InsertComment($params = null){
        $body = $this->getData();
        if($body->comentario && $body->valoracion){
            $idComment = $this->model->InsertComment($body->comentario, $body->valoracion, $body->id_usuario,$body->id_habitacion);

            if (!empty($idComment)) {
                $this->view->response($this->model->GetComment($idComment), 201);
            }
        }
    }

    public function DeleteComment($params = null){
        $id = $params[':ID'];
        $result = $this->model->DeleteComment($id);

        if($result > 0) {
            $this->view->response("El comentario con el id=$id fue eliminada", 200);
        }
    }
}