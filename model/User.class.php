<?php 

class User extends Model {
	protected static $table_name = 'joueur';
	private $login;
	private $password;
	private $email;
	private $nb_parties_jouees;
	private $nb_parties_gagnees;
	private $score_cumule;
	
	public function getLogin(){
		return $this->login;
	}
	
	public function __construct($log, $pwd, $mail){
		$this->login = $log;
		$this->password = $pwd;
		$this->email = $mail;
		$this->nb_parties_jouees = 0;
		$this->nb_parties_gagnees = 0;
		$this->score_cumule = 0;
		
	}
	
	public static function create($login, $pwd, $mail){
	$sth = User::query("INSERT INTO joueur (PSEUDO, MOT_DE_PASSE, ADRESSE_MAIL, NB_PARTIES_JOUEES, NB_PARTIES_GAGNEES, SCORE_CUMULE) VALUES ('".$login."', '".$pwd."', '".$mail."', 0, 0, 0)");
	$user = new User($login, $pwd, $mail); 
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
	
	return 0;
	}
	
}
?>