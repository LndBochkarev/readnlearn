<?php

class Login extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function execute() {
        
        
        
        $this->view->setContent('login.php');
        $this->view->addLink('login_form.css');                
        $this->view->generateHTML();
    }

}
