<?php
// Load my root class
class Dispatcher extends MyObject {
	public static function dispatch($request){
		$controllerType = $request -> getController();
		$instanceController = ucfirst($controllerType).'Controller';
		if(!class_exists($instanceController)){
			throw new Exception("$instanceController does not exist");
		}
		$controller = new $instanceController($request);
		return $controller;
		$request->lireR();
	}
	

}
?>