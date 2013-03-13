<div id="login_form_wrapper">
	<form id="login">
		<input id="user" type="text" name="user" value="Username" /><br />
		<input id="pwd" type="password" name="user" value="Password" /><br />
		<input type="button" id="submit_login" value="login" />
	</form>
	<script type="text/javascript">
	//$(document).bind('ready',function(){
		$("#submit_login").click(function() {
			console.log("doing login");
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
				console.log(data);
				switch(data) {
				case "user_not_exists":
					$("#submit_login").val("Benutzer existiert nicht");
					break;

				case "logged_in":
					$("#submit_login").val("Logout");
					break;

				case "something_went_wrong":
					$("#submit_login").val("Uups. Bitte versuch es nochmal.");
					break;

				case "password_incorrect":
					$("#submit_login").val("Falsches Passwort!");
					break;
					
				}
			});
		});
	//});
	
	 </script>
 </div>