<?php
class ErrorModel extends BaseModel
{    
    public function pageNotFound() {
        $this->viewModel->set("pageTitle", "Fehler 404 <br /> Seite nicht gefunden");
        return $this->viewModel;
    }
}

?>
