<?php
class User {
	private $name;
	private $group;
	private $pwd;
	
	public function __construct($name, $pwd) {
		$this->name = $name;
		$this->pwd = $pwd;
	}
	
	public function setGroup($group) {
		$this->group = $group;
	}
}
?>