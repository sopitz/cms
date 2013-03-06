<?php
if (isset($_COOKIE['user'])) {
	$value = $_COOKIE['user'];
	setcookie("user", $value, time()+3600);
}

$headers = apache_request_headers();
list(,,,,,,,,,$lastModified) = stat($file);
$eTag = "ci-".dechex(crc32($file.$lastModified));
if ((strpos($headers['If-None-Match'], "$eTag")) &&
		(gmstrftime("%a, %d %b %Y %T %Z", $lastModified) == $headers['If-Modified-Since'])) {
	header('HTTP/1.1 304 Not Modified');
	header('Cache-Control: private');
	header("Pragma: ");
	header('Expires: ');
	header('Content-Type: ');
	header('ETag: "'.$eTag.'"');
	exit;
} else {
	include("classes/error.php");
	require("classes/basecontroller.php");  
	require("classes/basemodel.php");
	require("classes/view.php");
	require("classes/viewmodel.php");
	require("classes/loader.php");

	header('Cache-Control: private');
	header('Pragma: ');
	header('Expires: ');
	header('Last-Modified: '.gmstrftime("%a, %d %b %Y %T %Z",$lastModified));
	header('ETag: "'.$eTag.'"');
	
	$loader = new Loader();
	$controller = $loader->createController();
	$controller->executeAction();
}

?>