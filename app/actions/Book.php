<?php

class Book extends AbstractAction {
    
    public function __construct($registry) {
        parent::__construct($registry);        
        
    }
    
    public function execute() {
        require_once $this->registry['view_path'] . 'View.php';
        $view = new View($this->registry);
        
        
        $view->generateHTML();
    } 
}
