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
<base href="http://localhost/cms/">
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

<body>
<div id="wrapper">
	<div id="header">
    	<span class="opitz">Datenschutz Opitz</span><br clear="all" /><span class="system">Datenschutz mit System</span>
        <div class="logo">
        	<img src="views/img/turm.png" height="130" />
        </div>
        <div id="menu">
        	<ul>
        		<li><a <?php if ($this->controller == "" || $this->controller == "Home") { echo "class='active'"; }?> href="./">Start</a>  |   </li><li><a <?php if ($this->controller == "FragenUndAntworten") { echo "class='active'"; }?> href="FragenUndAntworten">Fragen & Antworten</a>  |  </li><li><a <?php if ($this->controller == "Fachwissen") { echo "class='active'"; }?> href="Fachwissen">Fachwissen</a>  |  </li><li><a <?php if ($this->controller == "Herausforderung") { echo "class='active'"; }?> href="Herausforderung">Herausforderung</a>  |   </li><li><a <?php if ($this->controller == "WarumExtern") { echo "class='active'"; }?> href="WarumExtern">Warum Extern</a>  |  </li><li><a <?php if ($this->controller == "Zusammenarbeit") { echo "class='active'"; }?> href="Zusammenarbeit">Zusammenarbeit</a>  |  </li><li><a <?php if ($this->controller == "Haftung") { echo "class='active'"; }?> href="Haftung">Haftung</a></li>
        	</ul>
        </div>
        <br clear="both" />
        <div id="submenu"><ul class="submenu">
        <?php
        $submenus = array();
    	$file = "views/".$this->controller."/structure.xml";
		if (file_exists($file)) {
	    	$subentries = simplexml_load_file($file);
	    	foreach ($subentries as $entryinfo) {
				array_push($submenus, "".$entryinfo->name);
	   		}
	   		$i = 0;
	   		$len = count($array);
	   		foreach ($submenus as $submenu) {
	   			if ($i == 0) {

					if ($viewModel->get('viewname') == $submenu) { echo "<li class='submenuitem active'>$submenu</li>"; } else { echo "<li class='submenuitem'>$submenu</li>"; }
	   				
	   			} else if ($i == $len - 1) {
	   				if ($viewModel->get('viewname') == $submenu) { echo "<li class='submenuitem active'>> _$submenu</li>"; } else { echo "<li class='submenuitem'>> $submenu</li>"; }
	   			}
	   			$i++;
	   		}
   		}
    ?>
    </ul></div>
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
		$('#header #menu ul').mousemove(function(e) {
			$('#header #menu ul').unbind('mousemove');
			$.getScript('lib/follower.js', function() {
				status = 1;
				$("#header #menu").bind('mousemove', function(e) {getMouse(e)});
				$('#header #menu ul').bind('mouseenter', function(e) {following(e)});
				$('#header #menu ul').trigger('mouseenter');
				//$("#header #menu ul").bind('mouseout', function (e) {
				//	insideHeader = false;
				//});
				

			});
			
		});
	}
});
</script>