<?php
// Load my root class
require_once(__ROOT_DIR . '/classes/AutoLoader.class.php');
class AnonymousController extends Controller {
	public $currentRequest;

		protected function defaultAction($args){
			$view = new AnonymousView($this, "content");
			$view->render();
		}
		
		protected function inscription($request){
			$view = new AnonymousView($this, 'inscription');
			$view->render();
		}
		
		public function execute(){
			$login = $this->getRequest()->getInscLogin();
			$pwd = $this->getRequest()->getInscPwd();
			$mail = $this->getRequest()->getInscMail();
			if(($login!=NULL) AND ($pwd!=NULL)){
				$args = array (
				'login' => $login,
				'password' => $pwd,
				'mail' => $mail);
				$this->validateInscription($args);
			}
			else{
			$methodName = $this->getRequest()->getActionName();
				if(!method_exists($this,$methodName))
					throw new exception ("$methodName n'existe pas");
				else
					$this->$methodName($this->getRequest());
		}}
		
					
		
		protected function validateInscription($args){
			$login = $args['login'];
			
			if(User::isLoginUsed($login)){
				$view = new View($this, 'inscription');
				$view -> setArgs('inscErrorText' , 'This login is already used');
				$view -> render();
			}
			else{
				$password = $args['password'];
				$mail = $args['mail'];
				$user = User::create($login, $password, $mail);
				if(!isset($user)) {
					$view = new View($this,'inscription');
					$view->setArgs('inscErrorText', 'Cannot complete inscription');
					$view->render();
				} else {
				$newRequest = new Request();
				$newRequest->write('controllerName','user');
				$newRequest->write('user',$login);
				$newController=Dispatcher::dispatch($newRequest);
				$newController->execute();
				}
				
			}
		}
}
?>