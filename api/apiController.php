<?php 

require_once './api/View.php';

abstract class ApiController {
    protected $model; // lo instancia el hijo
    protected $view;
    
    private $data;

    public function __construct() {
        $this->view = new apiView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
