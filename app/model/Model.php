<?php

class Model {

    private $registry;
    private $db;

    /**
     * 
     * @throws PDOException
     */
    public function __construct($registry) {
        $this->registry = $registry;
        
        try {
        $this->connect();
        } catch (PDOException $ex) {
            /**
             * handle exception
             */
        }
    }

    /**
     * 
     * @throws PDOException
     */
    private function connect() {
        $dsn = "mysql:host=" . $this->registry['db_host'] .
                ";dbname=" . $this->registry['db_name'];

        $this->db = new PDO($dsn, $this->registry['db_username'], $this->registry['db_pass']);

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getDBStructureQueryHandler() {
        $this->includeModelClass('DBStructureQueryHandler.php');
        return new DBStructureQueryHandler($this->registry, $this->db);
    }
    
    public function getUserDataHandler() {
        $this->includeModelClass('UserDataHandler.php');
        return new UserDataHandler($this->registry, $this->db);
    }
    
    private function includeModelClass($fileName) {
        require_once $this->registry['site_root'] . 'app/model/' . $fileName;
    }
}
