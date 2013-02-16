<?php
class HomeModel extends BaseModel {
    public function index() {   
        $this->viewModel->set("pageTitle","Startseite", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "css/home.css");
        return $this->viewModel;
    }
    
    public function help() {
    	$this->viewModel->set("pageTitle","Hilfe", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "");
    	return $this->viewModel;
    }
}

?>
