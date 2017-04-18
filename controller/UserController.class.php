<?php
// Load my root class
class UserController extends Controller {
	protected $user;

		protected function defaultAction($args){
			$option = $args->getPartieOption();

			if(isset($option)){
			if($option == 'oui'){
				Partie::creerPartie($args->getUserName(), 1);
			}
			else{
				Partie::creerPartie($args->getUserName(),0);
			}
				}
			$view = new UserView($this, "userContent", $args);
			$view->render();
		}
		
		
		protected function creerpartie($args){
			$view = new UserView($this, 'creerpartie', $args);
			$view->render();
		}

		protected function mesparties($args){
			$parties = Rejoindre::loadMesParties($args->getUserName());
			$view = new UserView($this, 'mespartie', $args);
			$view->setArgs('parties', $parties);
			$view->render();
		}


		protected function joinpartie($args){
			Partie::joinPartie($args->getUserName(), $args->getIdPartie());
			$view = new UserView($this, 'joinedpartie', $args);
			$view->render();
		}
		protected function showuserprofil($args){
			$currentUser = User::loadThisUser($args->getUserName());
			$view = new UserView($this, 'showprofile', $args);
			$view -> setArgs('user', $currentUser);
			$view->render();
		}

		protected function partiesencours($args){
			$parties = Partie::loadAllRunningParties();
			$view = new UserView($this, 'partiesencours', $args);
			$view->setArgs('parties', $parties);
			$view->render();
		}

		protected function partiesjoignables($args){
			$parties = Partie::loadAllReachablesParties($args->getUserName());
			$view = new UserView($this, 'partiesjoignables', $args);
			$view ->setArgs('parties', $parties);
			$view->render();
		}


		function __construct($request){
			parent::__construct($request);

		}
		

		
		public function execute(){
			$methodName = $this->getRequest()->getActionName();
				if(!method_exists($this,$methodName))
					echo($methodName);
				else
					$this->$methodName($this->getRequest());
			}
		
					

}
?>