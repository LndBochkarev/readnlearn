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
     * Set data required for almost each page     * 
     * @param type $data
     */
    public function setGeneralData($data) {
        
        //$this->viewData['first_name'] = 
    }

    /**
     * Set data for page if needed
     * @param mixed $data
     */
    public function setData($data) {
        $this->viewData->set('content', $data);
    }   
    
    public function setContent($content) {
        $this->content = $content;
    }
}
