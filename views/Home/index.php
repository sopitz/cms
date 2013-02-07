


<?php 
	
	Login::getView("form");
?>

<div class="editable">im an editable div</div>
<script type="text/javascript">
$('.editable').click(function(e) {
	$.getScript('lib/mercury/javascripts/mercury_loader.js?pack=bundled&visible=false', function() {
		window.location.reload();
	});
	
	Mercury.trigger('toggle:interface');
	$('.editable').attr('contenteditable', 'true');
	$('.editable').focus();
	$('.editable').off('click');
	
});
</script>
