<?php
class HomeModel extends BaseModel {
    public function index() {   
        $this->viewModel->set("pagename", "index", "pageTitle","Startseite", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "css/home.css");
        return $this->viewModel;
    }
    
    public function hilfe() {
    	$this->viewModel->set("pagename", "Hilfe", "pageTitle","Hilfe", "description", "Das ist die Hilfeseite", "keywords", "", "author", "Simon Optz", "css", "");
    	return $this->viewModel;
    }
}

?>
