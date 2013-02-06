


<?php 
	require_once('apps/login/login.php');
	Login::getView("form");
?>

<div class="editable">im an editable div</div>
<script type="text/javascript">
$('.editable').click(function(e) {
	Mercury.trigger('toggle:interface');
	$('.editable').attr('contenteditable', 'true');
	$('.editable').focus();
	
	$('.editable').off('click');
});
</script>



<script src="lib/mercury/javascripts/mercury_loader.js?pack=bundled&visible=false" type="text/javascript"></script>