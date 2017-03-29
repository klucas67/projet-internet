<?php
// Load my root class
class Partie extends Model {
	protected static $table_name = 'partie';

public static function getIdMax(){
	$sql = "SELECT max(IDENTIFIANT_PARTIE) as idmax FROM partie";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll;
}

public static function loadAllRunningParties(){
	$sql = "SELECT * FROM partie WHERE EN_COURS = 1";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}

public static function createPartie($login, $publique){
	$id = Partie::getIdMax() + 1;
	$sql = "INSERT INTO partie(IDENTIFIANT_PARTIE, PSEUDO_CREATEUR, PUBLIQUE, NB_JOUEURS, EN_COURS) VALUES ('".$id."', '".$login."', '".publique."', 1, 0)";

}

public static function loadAllReachablesParties(){
	$sql = "SELECT * FROM partie WHERE EN_COURS = 0 AND PUBLIQUE = 1 AND NB_JOUEURS < 10";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}
}
?>