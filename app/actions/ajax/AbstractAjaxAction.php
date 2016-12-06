<?php

/**
 * Difference betweed this and usual action is in different View class
 */
abstract class AbstractAjaxAction extends AbstractAction {


    public function __construct($registry) {
        parent::__construct($registry);
    }
    
    /**
     * @override
     */    
    function setView() {
    }


}
