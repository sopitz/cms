<?php
class DoCreateNewSubmenu {
	
	private $view;
	private $viewname;
	
	public function _do($view, $viewname) {
		$this->view = $view;
		$this->viewname = $viewname;
		
		
		$this->generateControllerFile();
		$this->generateModelFile();
		$this->createViewFile();
		$this->generateXML();
	}
	
	private function generateControllerFile() {
		ob_start();
		$controller = $this->prepare("../cms/controllers/".strtolower($this->view).".php");
		echo $controller;
		echo "protected function $this->viewname() {\n";
		echo "\$this->view->output(\$this->model->$this->viewname());\n";
		echo "}\n";
		echo "}\n";
		echo "?>";
		file_put_contents("../cms/controllers/".strtolower($this->view).".php", htmlspecialchars_decode(ob_get_contents()));
		ob_end_clean();
	}
	
	private function generateModelFile() {
		ob_start();
		$model = $this->prepare("../cms/models/".strtolower($this->view).".php");
		echo $model;
		echo "public function $this->viewname() {\n";
		echo "\$this->viewModel->set(\"pagename\", \"$this->viewname\", \"pageTitle\",\"$this->viewname\", \"description\", \"\", \"keywords\", \"\", \"author\", \"\", \"css\", \"\");\n";
		echo "return \$this->viewModel;\n";
		echo "}\n";
		echo "}\n";
		echo "?>";
		file_put_contents("../cms/models/".strtolower($this->view).".php", htmlspecialchars_decode(ob_get_contents()));
		ob_end_clean();
	}
	
	private function createViewFile() {
		file_put_contents("../cms/views/$this->view/$this->viewname.php", "test");
	}
	
	private function generateXML() {
		$file = "../cms/views/$this->view/structure.xml";
		if (file_exists($file)) {
			$subentries = simplexml_load_file($file);
			$element = $subentries->addChild('subentry');
			$element->addChild('name', $this->viewname);
			$element->addChild('template', "default/default");
			$subentries->asXML("../cms/views/$this->view/structure.xml");
		}
	}
	
	private function prepare($filename) {
		$file = htmlspecialchars(file_get_contents($filename));
		// replace "? >"
		$file = str_replace(htmlspecialchars("?>"), "", $file);
		// replaces last "}"
		$file = $this->str_lreplace(htmlspecialchars("}"), "", $file);
		return $file;
	}
	
	private function str_lreplace($search, $replace, $subject)
	{
		$pos = strrpos($subject, $search);
		if($pos !== false) { $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
		return $subject;
	}
	
}
?>