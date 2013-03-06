<?php
class DoCreateNewSubmenu {
	
	private $user_exists = 0;
	private $password_correct = -1;
	
	private $user_array = array();
	
	public function _do($view, $viewname) {
		$this->generateControllerFile();
		$this->generateModelFile();
		$this->createViewFile();
		$this->generateXML();
	}
	
	private function generateControllerFile() {
		ob_start();
		$controller = $this->prepare("../cms/controllers/".strtolower($view).".php");
		echo "<pre>";
		echo $controller;
		echo "protected function $viewname() {\n";
		echo "\$this->view->output(\$this->model->$viewname());\n";
		echo "}\n";
		echo "}\n";
		echo "?>";
		echo "</pre>";
		file_put_contents("../cms/controllers/".strtolower($view).".php", ob_get_contents());
		ob_end_clean();
	}
	
	private function generateModelFile() {
		ob_start();
		$model = $this->prepare("../cms/models/".strtolower($view).".php");
		echo "<pre>";
		echo $model;
		echo "public function $viewname() {\n";
		echo "\$this->viewModel->set(\"pageTitle\",\"$viewname\", \"description\", \"\", \"keywords\", \"\", \"author\", \"\", \"css\", \"\");\n";
		echo "return \$this->viewModel;\n";
		echo "}\n";
		echo "}\n";
		echo "?>";
		echo "</pre>";
		file_put_contents("../cms/models/".strtolower($view).".php", ob_get_contents());
		ob_end_clean();
	}
	
	private function createViewFile() {
		file_put_contents("../cms/views/$view/$viewname.php", "test");
	}
	
	private function generateXML() {
		$file = "../cms/views/$view/structure.xml";
		if (file_exists($file)) {
			$subentries = simplexml_load_file($file);
			$subentries->addAttribute('type', 'documentary');
			$element = $subentries->addChild('subentry');
			$element->addChild('name', $viewname);
			$element->addChild('template', "default/default");
			$subentries->asXML("../cms/views/$view/structure.xml");
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