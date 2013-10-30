<?php
class HerausforderungenModel extends BaseModel {
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
    
    public function loesung() {
    	$this->viewModel->set(
    			"pagename", "loesung",
    			"pageTitle","Herausforderungen - Lösung",
    			"description", "Meine Beschreibung",
    			"keywords", "Simon, CMS, gudd",
    			"author", "Simon Optz",
    			"css", "css/home.css",
    			"js", "js/home.js"
    	);
    	return $this->viewModel;
    }
    
    public function vorteil() {
    	$this->viewModel->set(
    			"pagename", "vorteil",
    			"pageTitle","Herausforderungen - Lösung",
    			"description", "Meine Beschreibung",
    			"keywords", "Simon, CMS, gudd",
    			"author", "Simon Optz",
    			"css", "css/home.css",
    			"js", "js/home.js"
    	);
    	return $this->viewModel;
    }
    
//     public function hilfe() {
//     	$this->viewModel->set(
//     			"pagename", "Hilfe",
//     			"pageTitle","Hilfe",
//     			"description", "Das ist die Hilfeseite",
//     			"keywords", "",
//     			"author", "Simon Optz",
//     			"css", "",
//     			"js", "");
//     	return $this->viewModel;
//     }
}

?>
