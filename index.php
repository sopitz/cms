<?php
require_once("settings.php");
require_once($controller);
$controller = new Controller($_REQUEST);
?>
<? $controller->getPage(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?
// generate meta tags
?>
<title>cmsrevolution</title>
<? $controller->createCSS(); ?>
<? $controller->createJS(); ?>
</head>
<body>

<? $controller->renderTpl("main"); ?>
<? //$controller->printmethods(); ?>

<?php

?>
</body>
</html>