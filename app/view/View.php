<?php

class View extends AbstractView {
    /**
     * 
     * 
     * 
     */

    /**
     * 
     * @param Registry $registry
     */
    public function __construct($registry) {
        parent::__construct($registry);
    }
    
    /**
     * Set data required for almost each page
     * 
     * @param type $data
     */
    public function setGeneralData($data) {
        
        //$this->viewData['first_name'] = 
    }

    /**
     * Set data for page if needed
     * 
     * @param mixed $data
     */
    public function setData($data = NULL) {
        $this->receivedData = $data;
    }

    public function generateHTML() {
        $this->loadData();
        parent::generateHTML();        
    }

    private function loadData() {
        switch ($this->registry['action_class_name']) {
            case 'Index':
                break;

            case 'Book':
                $this->content = 'book.php';
                break;

            case 'Dictionary':
                $this->content = 'dictionary.php';
                $this->addLink('dictionary.css');
                break;

            case 'DBStructure':
                $this->content = 'dbstructure.php';
                $this->addLink('dbstructure.css');

                $this->viewData->set('dbstructure', $this->receivedData);
                break;
            
            case 'Registration':
                $this->content = 'registration.php';
                $this->addLink('registration.css');                
                break;
            
            
            
            
            
            
            
            
            
            
            
        }
    }

}
