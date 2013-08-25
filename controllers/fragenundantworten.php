<?php
class FragenundantwortenController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require("models/fragenundantworten.php");
        $this->model = new FragenundantwortenModel();
    }
    
//     protected function hilfe() {
//     	$this->view->output($this->model->hilfe());
//     }
    
    protected function index() {
        $this->view->output($this->model->index());
    }
    
}

?>
