<?php
// Load my root class
class Dispatcher extends MyObject {
	public static function dispatch($request){
		$controllerType = $request -> getController();
		$instanceController = ucfirst($controllerType).'Controller';
		echo $instanceController;
		echo class_exists($instanceController);
		echo true;
		if(!class_exists($instanceController)){
			throw new Exception("$controllerName does not exist");
		}
		$controller = new $instanceController($request);
		return $controller;
	}
	

}
?>