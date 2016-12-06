<?php

class View extends AbstractView {
    /**
     * Provides a methods to manipulate HTML output 
     */

    /**
     * 
     * @param Registry $registry
     */
    public function __construct($registry) {
        parent::__construct($registry);
    }
    
    /**
     * Set the data required for almost each page
     * 
     * @param mixed $data
     */
    public function setGeneralData($data) {
        
        //$this->viewData['first_name'] = 
    }

    /**
     * Set the data for page if needed
     * 
     * @param string $key
     * @param mixed $data
     */
    public function setData($key, $data) {
        $this->viewData->set($key, $data);
    }   
    
    /**
     * Sets the HTML part between header and footer
     * 
     * @param type $content
     */
    public function setContent($content) {
        $this->content = $content;
    }
}
