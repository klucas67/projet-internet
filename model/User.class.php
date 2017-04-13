<?php 

class User extends Model {
	protected static $table_name = 'joueur';

	
	public function getLogin(){
		return $this->PSEUDO;
	}

	public static function loadThisUser($login){
	$sql = "SELECT * FROM joueur WHERE PSEUDO = '".$login ."'";
	$sth = User::query($sql);
	$res = $sth->fetch();
	return $res;
	}
	
	
	
	
	
	public static function create($login, $pwd, $mail){
	$sth = User::query("INSERT INTO joueur (PSEUDO, MOT_DE_PASSE, ADRESSE_MAIL, NB_PARTIES_JOUEES, NB_PARTIES_GAGNEES, SCORE_CUMULE) VALUES ('".$login."', '".$pwd."', '".$mail."', 0, 0, 0)");
	$user = new User(); 
	$user->login = $login;
		$user->password = $pwd;
		$user->email = $mail;
		$user->nb_parties_jouees = 0;
		$user->nb_parties_gagnees = 0;
		$user->score_cumule = 0;
		
	return $user;
	}
	public static function isLoginUsed($login){
		$sql = "SELECT * FROM joueur WHERE PSEUDO ='".$login."'";
		$res= User::query($sql);

		return ($res->rowCount()>0);
	}
	
	public static function check($login, $pwd){
	$sql = "SELECT * FROM joueur WHERE PSEUDO ='". $login . "' AND MOT_DE_PASSE = '".$pwd . "'";
	$sth = User::query($sql);
	$res = $sth->fetch();
	return $res;
	}
	
}
?>