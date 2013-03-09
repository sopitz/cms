<?php
class View {    
    
    protected $viewFile;
    public $controller;
    
    public function __construct($controllerClass, $action) {
    	$this->controller = str_replace("Controller", "", $controllerClass);
        $controllerName = str_replace("Controller", "", $controllerClass);
        $this->viewFile = "views/" . $controllerName . "/" . $action . ".".$_COOKIE['language'].".php";
    }
               
    public function output($viewModel, $template = "maintemplate") {
        
        $templateFile = "views/".$template.".".$_COOKIE['language'].".php";
        
        if (file_exists($this->viewFile)) {
            if ($template) {
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("views/error/badtemplate.".$_COOKIE['language'].".php");
                }
            } else {
                require($this->viewFile);
            }
        } else {
//         	echo "views/error/badview.".$_COOKIE['language'].".php";
            require("views/error/badview.".$_COOKIE['language'].".php");
        }
        
    }
}

?>