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
<!--<script type="text/javascript" src="lib/jquery-1.7.2.js"></script> -->
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
        	<?php
		        $names = array();
		        $links = array();
		        $mainmenus = array();
		    	$file = "views/structure.".Language::get().".xml";
				if (file_exists($file)) {
			    	$mainentries = simplexml_load_file($file);
			    	foreach ($mainentries as $entryinfo) {
						$mainmenus["".$entryinfo->name] = "".$entryinfo->link;
			   		}
			   		
			   		$i = 0;
			   		$len = count($mainmenus);
			   		$viewname = $viewModel->get('viewname');
			   		foreach ($mainmenus as $name => $link) {
						if ($i == $len - 1) {
							if (strtolower($this->controller) == strtolower($link)) { echo "<li class='active'><a href=\"$link\">$name</a></li>"; } else { echo "<li><a href=\"$link\">$name</a></li>"; }
						} else {
							if (strtolower($this->controller) == strtolower($link)) { echo "<li class='active'><a href=\"$link\">$name&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>"; } else { echo "<li><a href=\"$link\">$name&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>"; }
			   			}
			   			$i++;
			   		}
		   		}
		    ?>
        	</ul>
        </div>
        <br clear="both" />
        
    </div><!-- header ende -->
    <div class="follow" style="display:none;" >&nbsp;</div>
	<article>
	<div id="submenu"><ul class="submenu">
    <?php
        $names = array();
        $links = array();
        $submenus = array();
        
    	$file = "views/".$this->controller."/structure.".Language::get().".xml";
		if (file_exists($file)) {
	    	$subentries = simplexml_load_file($file);
	    	foreach ($subentries as $entryinfo) {
				$submenus["".$entryinfo->name] = "".$entryinfo->link;
	   		}
	   		$i = 0;
	   		$len = count($submenus);
	   		$viewname = $viewModel->get('viewname');
	   		foreach ($submenus as $name => $link) {
	   			if ($i == 0) {
					if (strtolower($viewModel->get('viewname')) == strtolower($link)) { echo "<li class='submenuitem active'><a href=\"$this->controller/$link\">$name</a></li>"; } else { echo "<li class='submenuitem'><a href=\"$this->controller/$link\">$name</a></li>"; }
	   				
	   			} else if ($i == $len - 1) {
	   				if (strtolower($viewModel->get('viewname')) == strtolower($link)) { echo "<a href=\"$this->controller/$link\"><li class='submenuitem active'>> $name</li></a>"; } else { echo "<a href=\"$this->controller/$link\"><li class='submenuitem'>> $name</li></a>"; }
	   			}
	   			$i++;
	   		}
   		}
    ?>
    </ul></div>
        <div id="content_wrapper">
        <input type="button" id="buttonde" value="de" />
        <input type="button" id="buttonen" value="en" /><br />
        <!-- gotta change that back to the footer -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        
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
<script type="text/js">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39150688-1']);
  _gaq.push(['_setDomainName', 'cmsrevolution.de']);
  _gaq.push(['_trackPageview']);
  _gaq.push (['_gat._anonymizeIp']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript">
var loaderStatus = 0;
$(document).bind('ready',function(){
	$('body').one('mousemove', function() {
		$.get('lib/loader.js');
	});

});

</script>
</html>
