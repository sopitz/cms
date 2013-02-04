<?php
class HomeModel extends BaseModel {
    public function index() {   
        $this->viewModel->set("pageTitle","Startseite", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz");
        return $this->viewModel;
    }
}

?>
