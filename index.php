<?php

/********************************************************************/
/*																	*/
/*       Project: CMS REVOLUTION                                    */
/*       Authors: sopitz                                            */
/*          File: index.php											*/
/*   Last change: 20130307                                          */
/*																	*/
/********************************************************************/

if (isset($_COOKIE['user'])) {
	$value = $_COOKIE['user'];
	setcookie("user", $value, time()+3600);
}
include("classes/lang.php");
include("classes/error.php");
require("classes/basecontroller.php");
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");



if( !function_exists('apache_request_headers') ) {

	function apache_request_headers() {
		$arh = array();
		$rx_http = '/\AHTTP_/';
		foreach($_SERVER as $key => $val) {
			if( preg_match($rx_http, $key) ) {
				$arh_key = preg_replace($rx_http, '', $key);
				$rx_matches = array();
				$rx_matches = explode('_', $arh_key);
				if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
					foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
					$arh_key = implode('-', $rx_matches);
				}
				$arh[$arh_key] = $val;
			}
		}
		return( $arh );
	}
}

$urlValues = $_GET;
$controllerName;
$action;
if ($urlValues['controller'] == "") {
	$controllerName = "home";
} else {
	$controllerName = strtolower($urlValues['controller']);
}
if ($urlValues['action'] == "") {
	$action = "index";
} else {
	$action = $urlValues['action'];
}
$file = "./views/".$controllerName."/structure.".Language::get().".xml";
$file2 = "./views/".$controllerName."/".$action.".".Language::get().".php";

$headers = apache_request_headers();
list(,,,,,,,,,$lastModified) = stat($file);
list(,,,,,,,,,$lastModified2) = stat($file2);
$eTag = "te-".dechex(crc32($file.$lastModified));
if ((strpos($headers['If-None-Match'], "$eTag")) && (gmstrftime("%a, %d %b %Y %T %Z", $lastModified) == $headers['If-Modified-Since']) && (gmstrftime("%a, %d %b %Y %T %Z", $lastModified2) == $headers['If-Modified-Since'])) {
	header('HTTP/1.1 304 Not Modified');
	header('Cache-Control: private');
	header("Pragma: ");
	header('Expires: ');
	header('Content-Type: ');
	header('ETag: "'.$eTag.'"');
	exit;
} else {
	header('Cache-Control: private');
	header('Pragma: ');
	header('Expires: ');
	header('Last-Modified: '.gmstrftime("%a, %d %b %Y %T %Z",$lastModified));
	header('ETag: "'.$eTag.'"');
	ob_start();
	$loader = new Loader();
	$controller = $loader->createController();
	$controller->executeAction();
	$busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
	$reemplaza = array('>','<','\\1');
	$webpage = preg_replace($busca, $reemplaza, ob_get_contents());
	ob_end_flush();
}


?>