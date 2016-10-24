<?php

class DBStructure extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);        
    }

    public function execute() {
        $array = $this->model->getDBStructureQueryHandler()->getDBStructure();     
        
        $this->view->setData($array);
        
        $this->view->generateHtml();
    }

}
