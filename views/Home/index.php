<?php

?>


<?php
	$login = new Login();
	$login->__call(getView, array("form"));
	$login->__call(doLogin, array("user"));
	
	$mercury = new Mercury();
	$mercury->__call("activate", array(".editable"));
?>

<div class="editable">im an editable div</div>

