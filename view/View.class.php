<?php
class View extends MyObject {
protected $args;
protected $templateNames;

public function __construct($controller, $templateName, $argument = array()) {
$this->templateNames = array();
$this->templateNames['head'] = 'head';
$this->templateNames['top'] = 'top';
$this->templateNames['menu'] = 'menu';
$this->templateNames['foot'] = 'foot';
$this->templateNames['content'] = $templateName;
$this->args['controller'] = $controller;

}
public function setArgs($key, $val) {
$this->args[$key] = $val;
}
public function render() {
$this->loadTemplate($this->templateNames['head'], $this->args);
$this->loadTemplate($this->templateNames['top'], $this->args);
$this->loadTemplate($this->templateNames['menu'], $this->args);
$this->loadTemplate($this->templateNames['content'], $this->args);
$this->loadTemplate($this->templateNames['foot'], $this->args);
}

public function loadTemplate($name,$args) {
	$templateFileName = __ROOT_DIR  . '/templates/'. $name . 'Template.php';
	if(is_readable($templateFileName)) {
		if(isset($args))
			foreach($args as $key => $value)
				$$key = $value;
	require_once($templateFileName);
	}
	else
		throw new Exception('undefined template "' . $name .'"');
	}
}
// ....
?>