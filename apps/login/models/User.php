<?php
class User {
	private $name;
	private $group;
	private $pwd;
	
	public function __construct($name, $pwd) {
		$this->name = $name;
		$this->pwd = $pwd;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPassword() {
		return $this->pwd ;
	}
	
	public function setGroup($group) {
		$this->group = $group;
	}
}
?>