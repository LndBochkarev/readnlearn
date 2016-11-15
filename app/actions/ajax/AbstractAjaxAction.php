<?php

/**
 * Difference betweed this and usual action is in lack of View class
 */
abstract class AbstractAjaxAction implements Action {
    
    
    
    protected $registry;
    
    /**
     * @var Model
     */
    protected $model;
    
    protected $userId;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->model = new Model($registry);
        
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
        session_start();

        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userId = filter_var($userId, FILTER_VALIDATE_INT);
            
            if ($userId) {
                return $userId;
            }
            return false;
        }
    }
}