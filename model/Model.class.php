<?php 
// Load my root class
require_once(__ROOT_DIR . '/classes/MyObject.class.php');
class Model extends MyObject {
	
	protected static function db(){
return DatabasePDO::getPDO();
}
protected static function query($sql){
	$st = static::db()->query($sql) ;
	$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
	return $st;
}
	protected static function exec1($sql){
	$st = static::db()->exec($sql);
	return $st;
}
	protected $props;
	public function __construct($props = array()) {
		$this->props = $props;
}
	public function __get($prop) {
		return $this->props[$prop];
}
	public function __set($prop, $val) {
		$this->props[$prop] = $val;
}

}
?>