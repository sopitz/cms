<?
class Controller {
private $webroot = "localhost/_cms/";
private $errorreporting = "E_ALL ^ E_NOTICE";
public  $basetitle = "CMSREVOLUTION";

/** Data **/
private $data_img = "data/img/";
private $data_mov = "data/mov/";
private $data_sounds = "data/sounds/";

/** core files **/
private $core = "core/";
private $controller = "core/lib/controller.php";
private $views = "core/lib/views/";
private $css = "core/css/";
private $js = "core/js/";
private $imgs = "core/imgs/";

/** app settings **/
private $apps = "apps/";

/** uri settings **/
private $mainmenu = "main";
private $submenu = "sub";

/** list of all appcontrollers **/
private $appcontroller = array();

private $methodlist = array();



	public function __construct($request) {
		$this->request = $request;
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		$pageURL = array_filter(explode("/", preg_replace('%'.$this->webroot.'%i', '', $pageURL)));
		$this->mainmenu = $pageURL[2];
		$this->submenu = $pageURL[3];
	}



	public function logger($msg) {
		// call like that:
		//$this->logger("Controller created");
		$logfile = $this->core.'lib/log/logfile.log';
		file_put_contents($logfile, date('d.m.Y - H:i:s')."   ".$msg."\n", FILE_APPEND);
	}

	public function getPage() {
		$this->mainmenu;
		$this->submenu;
	}



	public function renderTpl($tpl) {
		$apps = array();
		
		ob_start();
		$browser = $this->checkBrowser();
		switch($browser)
		{
			case "html5": include($this->views."".$tpl.".html5.tpl.php"); break;
			case "html4": include($this->views."".$tpl.".html4.tpl.php"); break;
			case "mobile": include($this->views."".$tpl.".mobile.tpl.php"); break;
		}
		include($this->views."".$tpl.".tpl.php");
		$template = ob_get_clean();
		$app = strtok($template, '-#-');
		echo $app;
		$i = 0;
		while ($app !== false) {
			$i++;
			if($i == 2 ) {
				array_push($apps, "_".$app);
				//include("".$this->apps."".$app."/index.php");
				include("".$this->apps."".$app."/lib/controller.php");
				
				array_push($this->appcontroller, new $app()); //creates controller for all apps and stores them in array
				
			}
			$app = strtok('-#-');
			if ($i == 2) { $i = 0; }
		}
		
		foreach($this->appcontroller as $controller)
		{
			$controller->setMethods(array_filter(get_class_methods($controller), array('Controller', 'validateMethode')));
		}
		
		ob_end_flush();
		//echo $this->appcontroller[0]->alive(); //um auf die Methode alive() der ersten App zuzugreifen
	}
	
	public function printmethods() {
		foreach ($this->appcontroller as $controller) {
			$this->methodlist = array_filter(get_class_methods($controller), array('Controller', 'validateMethode'));
		}
		var_dump( $this->methodlist );
	}
	
	public function getURL($menu) {
		return $this->$menu;
	}
	public function getPath($resource) {
		return $this->$resource;
	}
	
		public function createCSS() {
		if ($handle = opendir($this->getPath("css"))) {
			while (false !== ($entry = readdir($handle))) {
				if(!($entry === "." || $entry === "..")) {
					echo '<link href="http://'.$this->webroot.''.$this->css.''.$entry.'" rel="stylesheet" type="text/css" />';
				}
			}
			closedir($handle);
		} else {
			errorpage("missingresource");
		}
	}
	
	///
	///
	///
	public function createJS() {
		if ($handle = opendir($this->getPath("js"))) {
			while (false !== ($entry = readdir($handle))) {
				if(!($entry === "." || $entry === "..")) {
					echo '<script type="text/javascript" src="http://'.$this->webroot.''.$this->js.''.$entry.'"></script>';
				}
			}
			closedir($handle);
		} else {
			errorpage("missingresource");
		}
	}

	
	public function errorpage($code) {
		switch($code)
		{
			case 'missingresource': { break; }
			
		}
	}
	
	private function validateMethode($var) {
		if ($var != "__construct" && $var != "setMethods") {
			return true;
		}
	}
	
	public function checkBrowser() {
		// mobile, html4, html5
		$browser = "mobile";
		return $browser;
	}
}
?>
