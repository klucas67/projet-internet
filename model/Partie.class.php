<?php
// Load my root class
class Partie extends Model {
	protected static $table_name = 'partie';

public static function getIdMax(){
	$sql = "SELECT max(IDENTIFIANT_PARTIE) as idmax FROM partie";
	$sth = Model::db()->query($sql);
	$res = $sth->fetchAll();
	return intval($res[0][0]);
}

public static function loadAllRunningParties(){
	$sql = "SELECT * FROM partie WHERE EN_COURS = 1";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}

public static function creerPartie($login, $publique){
	$id = Partie::getIdMax() + 1;
	$sql = "INSERT INTO partie(IDENTIFIANT_PARTIE, PSEUDO_CREATEUR, PUBLIQUE, NB_JOUEURS, EN_COURS) VALUES ('".$id."', '".$login."', '".$publique."', 1, 1)";
	$sth = Partie::query($sql);
	$sql = "INSERT INTO rejoindre (IDENTIFIANT_PARTIE, PSEUDO) VALUES('".$id."', '".$login."')";
	$sth = Model::db()->query($sql);

}

public static function loadAllReachablesParties($login){
	$sql = "SELECT * FROM partie WHERE EN_COURS = 0 AND PUBLIQUE = 1 AND NB_JOUEURS < 10 AND PSEUDO_CREATEUR!='".$login."' ";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}

public static function loadMesParties($login){
	$sql = "SELECT IDENTIFIANT_PARTIE FROM rejoindre WHERE PSEUDO= '".$login."' ";
	$sth = Partie::query($sql);
	$res = $sth->fetchAll();
	return $res;
	}

	public static function joinPartie($login, $id){
		$sql = "INSERT INTO rejoindre (IDENTIFIANT_PARTIE, PSEUDO) VALUES('".$id."', '".$login."')";
		printf($sql);
		$sth = Model::db()->exec($sql);
		$sql ="SELECT NB_JOUEURS FROM PARTIE WHERE IDENTIFIANT_PARTIE=" .$id;
		$sth = Model::db()->query($sql);
		$res = $sth -> fetchAll();
		$nb_players = intval($res[0][0]) + 1;

		$sql = "UPDATE partie SET NB_JOUEURS = " . $nb_players .' WHERE IDENTIFIANT_PARTIE = '.$id;
		$sth = Model::db()->exec($sql);
		echo $sql;

	}
}
?>