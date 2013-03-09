<?php
class Language {
	static function get() {
		$lang = "de";
		if(isset($_COOKIE['language'])) {
			$lang = $_COOKIE['language'];
		}
		return $lang;
	}
}