<?php

abstract class AbstractAction implements Action {
    protected $registry;
    
    /**
     * @var QueryHandlerFactory
     */
    protected $qhFactory;
    
    /**
     * @var View
     */
    protected $view;
    
    protected $userId;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->qhFactory = new QueryHandlerFactory($registry);
        $this->setView();
        
        $this->userId = $this->getUserId();
        
        /**
         * @todo $this->view->setGeneralData($data);
         */
    }
    
    abstract public function execute();
    
    /**
     * Basic authorization
     * 
     * @return mixed
     */
    private function getUserId() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userId = filter_var($userId, FILTER_VALIDATE_INT);
            
            if ($userId) {
                return $userId;
            }
            return false;
        }
    }
    
    /**
     * 
     */
    protected function setView() {
        $this->view = new View($this->registry);
    }
}
