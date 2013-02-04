<?php
class ErrorController extends BaseController
{    
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("models/error.php");
        $this->model = new ErrorModel();
    }
    
    protected function pageNotFound() {
        $this->view->output($this->model->pageNotFound());
    }
}

?>
