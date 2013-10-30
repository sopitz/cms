<?php
class WarumexternController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/warumextern.php");
        $this->model = new WarumexternModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
    protected function vergleich() {
        $this->view->output($this->model->vergleich());
    }
}

?>
