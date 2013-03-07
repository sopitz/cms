<?php
class LogoutModel extends BaseModel {
    public function index() {   
        $this->viewModel->set("pagename", "index", "pageTitle","Logout", "description", "Meine Beschreibung", "keywords", "Simon, CMS, gudd", "author", "Simon Optz", "css", "css/logout.css");
        return $this->viewModel;
    }
}

?>
