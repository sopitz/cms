<?php
class Mercury {
	private $selector;
	public function __call($name, $arguments) {
		//do all the rights-management stuff
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function activate($selector) {
		$this->selector = $selector;
		$string = "<script type='text/javascript' src='apps/mercury/lib/javascripts/mercury_loader.js?pack=bundled&visible=false'></script>";
 		//$string .= "<script type='text/javascript'>$(document).ready(function() { $('$this->selector').click(function(e){Mercury.trigger('toggle:interface');$('$this->selector').attr('contenteditable', 'true');$('$this->selector').focus();$('$this->selector').off('click');});});</script>";
		echo $string;
	}
	
	//$string = "<script type='text/javascript' src='apps/mercury/lib/javascripts/mercury_loader.js?pack=bundled&visible=false'></script>";
	//$string .= '<script type="text/javascript">$(document).ready(function(){$("content").children().click(function(e){ var str = e.currentTarget.className; str = str.replace(" contenteditable",""); $("."+str).attr("contenteditable", "true"); $("."+str).attr("data-mercury", "full"); $("."+str).focus(); $("."+str).off("click"); });});</script>';
	//$string .= "<script type='text/javascript'>Mercury.trigger('toggle:interface'); </script>";
	
	private function upload($data) {
		require_once("controllers/upload.php");
		$image = $data['files']['image'];
		Upload::_do($image);
	}
}
?>


