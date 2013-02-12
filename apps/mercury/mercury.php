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
		$string .= "<script type='text/javascript'>$(document).ready(function() { $('$this->selector').click(function(e){Mercury.trigger('toggle:interface');$('$this->selector').attr('contenteditable', 'true');$('$this->selector').focus();$('$this->selector').off('click');});});</script>";

		echo $string;
	}
}
?>


