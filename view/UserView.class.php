<?php
class UserView extends View {


public function __construct($controller,$templateName, $argument = array()) {
parent::__construct($controller,$templateName,$argument);
$this->templateNames['menu'] = 'userMenu';
$this->templateNames['top'] = 'userTop';
$this->args['user'] = $controller->getRequest()->getUser();
if($this->args['user'] == 'Anonymous'){
throw new Exception('a user must be defined');}
}

public function render() {
$this->loadTemplate($this->templateNames['head'], $this->args);
$this->loadTemplate($this->templateNames['top'], $this->args);
$this->loadTemplate($this->templateNames['menu'], $this->args);
$this->loadTemplate($this->templateNames['content'], $this->args);
$this->loadTemplate($this->templateNames['foot'], $this->args);
}

public function loadTemplate($name,$args=NULL) {
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