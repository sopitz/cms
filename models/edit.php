<?php
class EditModel extends BaseModel {
    public function index() {   
        $this->viewModel->set("pageTitle","Login", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "css/edit.css");
        return $this->viewModel;
    }
    
    public function save() {
    	$this->viewModel->set("pageTitle","save", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "css/edit.css");
    	return $this->viewModel;
    }
}

?>
