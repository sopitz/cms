<?php
class KontaktController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/kontakt.php");
        $this->model = new KontaktModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
}

?>
