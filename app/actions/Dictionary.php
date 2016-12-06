<?php

class Dictionary extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function execute() {
        
        
        
        //display translate window
        //select prev words
        //display them or nothing

   
        
        
        $this->view->setContent('dictionary.php');
        $this->view->addLink('dictionary.css');
        $this->view->addScript('translator.js?do=notCache' . time());
        $this->view->generateHtml();
    }

}
