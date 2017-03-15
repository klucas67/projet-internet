<?php
// Load my root class
abstract class Controller extends MyObject {
	protected $currentRequest;
	public function getRequest(){
		return $this->currentRequest;
	}
		function __construct($request){
			$this->currentRequest = ($request -> getCurrentRequest());
		}
		abstract protected function defaultAction($request);
		public function execute(){
			$methodName = $this->getRequest()->getActionName();
				if(!method_exists($this,$methodName))
					throw new exception ("$methodName n'existe pas");
				else
					$this->$methodName($this->getRequest());
			}

}
?>