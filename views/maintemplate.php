<?php 
$handle = opendir("apps");
while (false !== ($entry = readdir($handle))) {
	if(!($entry === "." || $entry === ".." || $entry === ".DS_Store")) {
		require("apps/".$entry."/".$entry.".php");
	}
}
closedir($handle);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="<?php echo $viewModel->get('description'); ?>">
<meta name="keywords" content="<?php echo $viewModel->get('keywords'); ?>">
<meta name="author" content="<?php echo $viewModel->get('author'); ?>">
<meta charset="UTF-8">
<title><?php echo $viewModel->get('pageTitle'); ?></title>
<link href="views/<?php echo $this->controller?>/<?php echo $viewModel->get('css'); ?>" rel="stylesheet"></link>
<script type="text/javascript" src="lib/jquery-1.7.2.js"></script>
</head>
<body>
<?php require($this->viewFile); ?>
</body>
</html>