<?php
// Load my root class
class Partie extends Model {
	protected static $table_name = 'partie';


	public static function loadMesParties($login){
	$sql = "SELECT IDENTIFIANT_PARTIE FROM rejoindre WHERE PSEUDO= '".$login."' ";
	$sth = Rejoindre::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}
}
?>