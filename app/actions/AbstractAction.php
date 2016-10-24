<?php

abstract class AbstractAction implements Action {
    protected $registry;
    protected $model;
    protected $view;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->model = new Model($registry);
        $this->view = new View($registry);
        
        /**
         * @todo $this->view->setGeneralData($data);
         */
    }
    
    abstract public function execute();
}
