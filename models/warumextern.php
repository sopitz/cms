<?php
class WarumexternModel extends BaseModel {
    public function index() {   
        $this->viewModel->set(
        		"pagename", "index",
        		"pageTitle","Startseite",
        		"description", "Meine Beschreibung",
        		"keywords", "Simon, CMS, gudd",
        		"author", "Simon Optz",
        		"css", "css/home.css",
        		"js", "js/home.js"
        );
        return $this->viewModel;
    }
    
    public function vergleich() {   
        $this->viewModel->set(
        		"pagename", "index",
        		"pageTitle","Vergleich",
        		"description", "Meine Beschreibung",
        		"keywords", "Simon, CMS, gudd",
        		"author", "Simon Optz",
        		"css", "css/home.css",
        		"js", "js/home.js"
        );
        return $this->viewModel;
    }
}

?>
