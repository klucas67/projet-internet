<?php 
// Load my root class
require_once(__ROOT_DIR . '/classes/MyObject.class.php');
class Request extends MyObject {
	private $controllerName;
	private $actionName;
	private $user;
		
	protected static  $uniqueRequest = NULL;
	public static function getCurrentRequest(){
		if(static::$uniqueRequest == NULL){
			static::$uniqueRequest = new Request();
			
		}
		return static::$uniqueRequest;
	}
	function __construct(){
		$this->controllerName=$this->getControllerName();
		$this->actionName=$this->getActionName();
		$this->user=$this->getUserName();
	}
		

	public function getController(){
		return $this->controllerName;
	}
	public function getUSer(){
		return $this->user;
	}
	
	
	

	public function getControllerName(){
		if(isset($this->controllerName)){
			return $this->controllerName;}
		
		if(empty($_GET['controller']) && empty($_POST['controller'])){
			return('Anonymous');
		}
		else
	return((empty($_GET['controller'])) ? $_POST['controller'] : $_GET['controller']);
	}
	
	public function getActionName(){
		if(empty($_GET['action']) && empty($_POST['action'])){
			return('defaultAction');
		}
		else
	return((empty($_GET['action'])) ? $_POST['action'] : $_GET['action']);
	}
	
	public function getUserName(){
	if(empty($_GET['user']) && empty($_POST['user'])){
		return 'Anonymous';
	}
	else
		return((empty($_GET['user'])) ? $_POST['user'] : $_GET['user']);
	}
	
	public function getInscLogin(){
		if(empty($_POST['inscLogin'])){
			return NULL;
		}
		else
	return($_POST['inscLogin'] );
	}
	
	public function getInscMail(){
		if(empty($_POST['inscMail'])){
			return NULL;
		}
		else
	return($_POST['inscMail'] );
	}
		
	
	public function getInscPwd(){
		if(empty($_POST['inscPassword'])){
			return NULL;
		}
		else
	return($_POST['inscPassword'] );
	}
	
	public function getConnLogin(){
		if(empty($_POST['connexLogin'])){
			return NULL;
		}
		else
	return($_POST['connexLogin'] );
	}
	
	public function getConnPwd(){
		if(empty($_POST['connexPassword'])){
			return NULL;
		}
		else
	return($_POST['connexPassword'] );
	}
	
	public function write($cle, $value){
		$this->$cle = $value;
	}
	
	
	public function lireR(){
		echo "<br> Controller : $this->controllerName </br>";
		echo "<br> Action : $this->actionName </br>";
		echo "<br> User : $this->user </br>";

	}
	}
?>