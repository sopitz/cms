<?php

class BaseModel {
    
    protected $viewModel;

    public function __construct() {
        $this->viewModel = new ViewModel();
        $this->commonViewData();
    }

    
    protected function commonViewData() {
    	//establish viewModel data that is required for all views in this method (i.e. the main template)
    	//e.g. $this->viewModel->set("mainMenu",array("Home" => "/home", "Help" => "/help"));
    }
}

?>
