<?php
// Load my root class
require_once(__ROOT_DIR . '/classes/AutoLoader.class.php');
class UserController extends Controller {
	public $currentRequest;

		protected function defaultAction($args){
			echo "<br>" .  $args ->getUser() . "</br>" ;
			$view = new UserView($this, "content", $args);
			$view->render();
		}
		

		
		public function execute(){
			$methodName = $this->getRequest()->getActionName();
				if(!method_exists($this,$methodName))
					throw new exception ("$methodName n'existe pas");
				else
					$this->$methodName($this->getRequest());
			}
		
					

}
?>