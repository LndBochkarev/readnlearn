<?php


class Profile extends AbstractAction {
    
    public function __construct($registry) {
        parent::__construct($registry);
    }
    
    public function execute() {
        
        $this->view->generateHTML();
    }
}
