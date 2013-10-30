<?php
/*
 *   Copyright (C) cmsrevolution.de - All Rights Reserved!
 *   Unauthorized copying of this file, via any medium is strictly prohibited
 *   Proprietary and confidential
 *   Written by cmsrevolution.de, March 2013
 *
 *   @file: index.php
 *   @author: sopitz
 *   @created at: 2013-03-12 10:44:40 pm
 *   @last edited by: sopitz
 *   @file-version: 1.2.1
 *   
 *   
 *   ToDos:
 *   - make all actions a method-call
 */



include("classes/lang.php");
include("classes/error.php");
require("classes/basecontroller.php");
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");


// check users session
$file = "lib/users.xml";
$users = simplexml_load_file($file);
$cookiedata = unserialize($_COOKIE['session']);

if (isset($cookiedata) && (time() - $cookiedata['last_activity'] > 3600) || ($users->user[($cookiedata['#']-1)]->sessionID != $cookiedata['id'])) {
	setcookie("session", "", time()-3600, '/');
} else {
	$cookiedata['last_activity'] = time();
	setcookie("session", serialize($cookiedata), '/');
}


// add apache_request_headers function if not existing
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

// check for modified date
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
$file = "./views/".strtolower($controllerName)."/structure.".Language::get().".xml";
$file2 = "./views/".strtolower($controllerName)."/".$action.".".Language::get().".php";

$headers = apache_request_headers();
list(,,,,,,,,,$lastModified) = stat($file);
list(,,,,,,,,,$lastModified2) = stat($file2);
$eTag = "cms-".dechex(crc32($file.$lastModified));

// return 304 or 200
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