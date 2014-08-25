<?php

namespace Com\Mindmutex\NaesBundle\Draugiem;

class DraugiemUser {
	
	public $id;
	public $name; 
	public $nick;
	public $img;
	public $imgThumbnail;
	public $imgMedium; 
	public $imgLarge;
	
	public function __construct($userData = array()) {
		$this->id = $userData['uid'];
		$this->name = sprintf("%s %s", $userData['name'], $userData['surname']);
		$this->nick = $userData['nick'];
		$this->img = $userData['img'];
		$this->imgThumbnail = $userData['imgi'];
		$this->imgMedium = $userData['imgm'];
		$this->imgLarge = $userData['imgl'];
	}
	
	public function __toString() {
		return sprintf("%s@%d",$this->name, $this->id);
	}
}
