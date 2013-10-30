<?php
class User {
	private $name;
	private $username;
	private $password;
	private $email;
	private $pwdchanged;
	private $group;
	private $lastlogin;
	private $failedlogins;
	private $asctive;
	private $activeuntil;
	private $sessionID;
	
	public function __construct($name, $username, $password, $email, $pwdchanged = null, $group  = null, $lastlogin = null, $failedlogins = null, $active = null, $activeuntil = null, $sessionID = null) {
		$this->setName($name);
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setEmail($email);
		$this->setPwdchanged($pwdchanged);
		$this->setGroup($group);
		$this->setLastlogin($lastlogin);
		$this->setFailedlogins($failedlogins);
		$this->setActive($active);
		$this->setActiveuntil($activeuntil);
		$this->setSessionID($sessionID, null);
	}
	
	public function getName() { return $this->name; }
	public function getUsername() { return $this->username; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getPwdchanged() { return $this->pwdchanged; }
	public function getGroup() { return $this->group; }
	public function getLastlogin() { return $this->lastlogin; }
	public function getFailedlogins() { return $this->failedlogins; }
	public function getActive() { return $this->active; }
	public function getActiveuntil() { return $this->activeuntil; }
	public function getSessionID() { return $this->sessionID; }
	public function setName($x) { $this->name = $x; }
	public function setUsername($x) { $this->username = $x; }
	public function setPassword($x) { $this->password = $x; }
	public function setEmail($x) { $this->email = $x; }
	public function setPwdchanged($x) { $this->pwdchanged = $x; }
	public function setGroup($x) { $this->group = $x; }
	public function setLastlogin($x) { $this->lastlogin = $x; }
	public function setFailedlogins($x) { $this->failedlogins = $x; }
	public function setActive($x) { $this->active = $x; }
	public function setActiveuntil($x) { $this->activeuntil = $x; }
	public function setSessionID($x, $counter) {
		$this->sessionID = $x;
		$file = "lib/users.xml";
		$users = simplexml_load_file($file);
		$users->user[($counter-1)]->sessionID = $x;

		$fp = fopen($file, 'w');
		fwrite($fp, $users->asXML());
		fclose($fp);
	}
}
?>