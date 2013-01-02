login view<br />
<?
if($this->isLoggedIn("test") == true) { echo "eingeloggt"; } else { echo "nicht eingeloggt"; }
//if ( $this->c("login", "isLoggedIn", array("User")) == 1 ) { echo "eingeloggt"; }


?>