<?php
// Load my root class
require_once(__ROOT_DIR . '/classes/AutoLoader.class.php');
class AnonymousController extends Controller {
	public $currentRequest;

		protected function defaultAction($args){
			$view = new UserView($this, "content");
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