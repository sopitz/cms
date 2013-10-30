<?php
class ImpressumController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/impressum.php");
        $this->model = new ImpressumModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
}

?>
