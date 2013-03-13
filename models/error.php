<?php
class ErrorModel extends BaseModel
{    
    public function pageNotFound() {
        $this->viewModel->set(
        		"pagename", "pageNotFound",
        		"pageTitle", "Fehler 404 - Seite nicht gefunden");
        return $this->viewModel;
    }
}

?>
