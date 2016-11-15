<?php

class Book extends AbstractAction {
    
    public function __construct($registry) {
        parent::__construct($registry);        
        
    }
    
    public function execute() {
        
        $this->view->setContent('book.php');
        $this->view->generateHTML();
    } 
}
