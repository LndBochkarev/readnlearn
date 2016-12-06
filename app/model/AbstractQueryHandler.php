<?php

abstract class AbstractQueryHandler {
    
    protected $db;
    protected $registry;

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
}
