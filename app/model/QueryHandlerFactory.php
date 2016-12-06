<?php

/**
 * Factory for objects inherited from QueryHandler
 */
class QueryHandlerFactory {
    
    /**
     * @var Registry
     */
    private $registry;
    
    /**
     * 
     * @param Registry $registry
     */    
    public function __construct($registry) {
        $this->registry = $registry;        
    }
    
        /**
     * @return DBStructureQueryHandler
     */
    public function getDBStructureQueryHandler() {
        return $this->loadModelClass('DBStructureQueryHandler');
    }
    
    /**
     * @return UserQueryHandler
     */
    public function getUserQueryHandler() {
        return $this->loadModelClass('UserQueryHandler');
    }
    
    /**
     * Includes class and returns new object
     * 
     * @param type $className
     * @return mixed new object with name specified by input parameter
     */
    private function loadModelClass($className) {
        require_once $this->registry['site_root'] . 'app/model/' . $className . ".php";
        return new $className($this->registry);
    }
}
