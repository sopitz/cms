
<br />

<?php
$controller = $_POST['controller'];
$newsubpage = $_POST['newsubpage'];


$generator = new Generator();
$generator->__call(createNewSubmenu, array($controller, $newsubpage));

?>


<!-- 
How To Use:


$(document).ready(function() {
 			$("#button").click(function() {
 				$.ajax({
 					   type: "POST",
 					   url: "edit/addsubpage",
 					   data: {
 						   newsubpage: "testsubasdfasfdasfdpage",
 						   controller: "edit"
 					   }
 				}).done(function(data) {
 					//redirect
 				});
 			});
 		});

-->