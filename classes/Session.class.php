<?php
// Load my root class
class Session extends MyObject {
	public static function setSession($cle, $val){
		$_SESSION[$cle] = $val;
	}
	
	public static function getSession($cle){
		if(!isset($_SESSION[$cle])){
			return NULL;
		}
		return $_SESSION[$cle];
	}

}
?>