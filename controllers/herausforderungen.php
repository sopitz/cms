<?php
class HerausforderungenController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/herausforderungen.php");
        $this->model = new HerausforderungenModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
    protected function loesung() {
    	$this->view->output($this->model->loesung());
    }
    
    protected function vorteil() {
    	$this->view->output($this->model->vorteil());
    }
    
}

?>
