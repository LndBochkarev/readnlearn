<?php

class DBStructure extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);        
    }

    public function execute() {
        $array = $this->model->getDBStructureQueryHandler()->getDBStructure();     
        
        $this->view->setContent('dbstructure.php');
        $this->view->setData($array);
        $this->view->addLink('dbstructure.css');
        
        $this->view->generateHtml();
    }

}
