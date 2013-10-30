<?php
class ZusammenarbeitController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/zusammenarbeit.php");
        $this->model = new ZusammenarbeitModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
}

?>
