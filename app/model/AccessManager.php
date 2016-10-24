<?php


class AccessManager {
    private $registry;


    public function __construct($registry) {
        $this->registry = $registry;
        
        session_start();
        
        
        
    }
    
    
}
