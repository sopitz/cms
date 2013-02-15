<?php
$handle = opendir("apps");
while (false !== ($entry = readdir($handle))) {
	if(!($entry === "." || $entry === ".." || $entry === ".DS_Store")) {
		require("apps/".$entry."/".$entry.".php");
	}
}
closedir($handle);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="de">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo $viewModel->get('description'); ?>">
<meta name="keywords" content="<?php echo $viewModel->get('keywords'); ?>">
<meta name="author" content="<?php echo $viewModel->get('author'); ?>">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<title>Datenschutz Opitz | Startseite</title>
<title><?php echo $viewModel->get('pageTitle'); ?></title>

<link href="views/css/base.css" rel="stylesheet" type="text/css"></link>

<link href="views/<?php echo $this->controller?>/<?php echo $viewModel->get('css'); ?>" rel="stylesheet"></link>
<script type="text/javascript" src="lib/jquery-1.7.2.js"></script>
</head>

<body><?php echo $test45; ?>
<div id="wrapper">
	<div id="header">
    	<span class="opitz">Datenschutz Opitz</span><br clear="all" /><span class="system">Datenschutz mit System</span>
        <div class="logo">
        	<img src="views/img/turm.png" height="130" />
        </div>
        <div id="menu"><p>Start  |   Fragen & Antworten  |  Fachwissen  |  Herausforderung  |   Warum Extern  |  Zusammenarbeit  |  Haftung</p></div>
    </div><!-- header ende -->
    <div class="follow" style="display:none;" >&nbsp;</div>

	<article>
        <div id="content_wrapper">
        	<?php require($this->viewFile); ?>
        </div><!-- content_wrapper ende -->
    </article>
    
    <br clear="all" />
    
    <div id="footer">
        <div id="menu">Kontakt  |   Impressum</div>
    	<div id="copyright"><content>&copy; Gernot Opitz, Dresden, 2013 </content></div>
    </div><!-- footer ende -->
</div><!-- wrapper ende -->
</body>
</html>
<!--<script type="text/javascript" src="js/jquery-1.7.2.js"></script>-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
var status = 0;
$(document).bind('ready',function(){
	if (status == 0) {
		$('#header #menu p').mousemove(function(e) {
			$('#header #menu p').unbind('mousemove');
			$.getScript('lib/follower.js', function() {
				status = 1;
				$("#header #menu").bind('mousemove', function(e) {getMouse(e)});
				$('#header #menu p').bind('mouseenter', function(e) {following(e)});
				$('#header #menu p').trigger('mouseenter')
				$("#header #menu p").bind('mouseout', function (e) {
					insideHeader = false;
				});

			});
			
		});
	}
});
</script>