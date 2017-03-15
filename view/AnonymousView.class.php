<?php
class AnonymousView extends View {
protected $args;
protected $templateNames;


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