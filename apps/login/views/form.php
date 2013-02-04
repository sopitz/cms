<div id="login_form_wrapper">
	<form id="login">
		<input id="user" type="text" name="user" value="Username" /><br />
		<input id="pwd" type="password" name="user" value="Password" /><br />
		<input type="button" id="submit_login" value="login" />
	</form>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#submit_login").click(function() {
			var args = new Object();
			args.pwd = $("form#login input#pwd").val();
			args.user = $("form#login input#user").val();

			var json = JSON.stringify(args);
			$.ajax({
				   type: "POST",
				   url: "ajaxcontroller.php",
				   data: {
					   controller: "login",
					   action: "doLogin",
					   args: json
				   }
			}).done(function(data) {
				if (data == "true") {
					console.log("logged me in");
				}
			});
		});
	});
	
	 </script>
 </div>