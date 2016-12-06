<?php

class DataHandlerFactory {

    /**
     * @return UserDataHandler
     */
    public static function getUserDataHandler() {
        return $this->loadModelClass('UserDataHandler');
    }
    
    /**
     * Includes class and returns new object
     * 
     * @param type $className
     * @return mixed new object with name specified by input parameter
     */
    private function loadModelClass($className) {
        require_once $this->registry['site_root'] . 'app/model/' . $className . ".php";
        return new $className();
    }
}
