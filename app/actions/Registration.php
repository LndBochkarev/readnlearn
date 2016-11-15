<?php

class Registration extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function execute() {        








        $this->view->setContent('registration.php');
        $this->view->addLink('registration.css');
        $this->view->generateHTML();
    }

}
