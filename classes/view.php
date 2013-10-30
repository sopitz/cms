<?php
class View {    
    
    protected $viewFile;
    public $controller;
    
    public function __construct($controllerClass, $action) {
    	$this->controller = str_replace("Controller", "", $controllerClass);
        $controllerName = str_replace("Controller", "", $controllerClass);
        $this->viewFile = "views/" . $controllerName . "/" . $action . ".".Language::get().".php";
    }
               
    public function output($viewModel, $template = "maintemplate") {
        
        $templateFile = "views/".$template.".".Language::get().".php";
        if (file_exists($this->viewFile)) {
            if ($template) {
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("views/error/badtemplate.".Language::get().".php");
                }
            } else {
                require($this->viewFile);
            }
        } else {
            require("views/error/badview.".Language::get().".php");
        }
        
    }
}

?>