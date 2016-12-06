<?php

class SignUp extends AbstractAction {
    
    public function __construct($registry) {
        parent::__construct($registry);
    }
    
    public function execute() {
        
        /**
         * @todo add register tries counter for specified ip
         */
        
        if ($this->userId) {
            header('location: profile');
        }
        
        $udh = DataHandlerFactory::getUserDataHandler();
        
        $data = $udh->prepareUserData();
        
        if ($data['is_valid']) {
            
            $uqh = $this->qhFactory->getUserQueryHandler();
            
            //working
            //$uqh->insertUser($data);
            
            header('location: login');
            
        } else {
            //view set cookie or session
            //session failed reg array
            //if failed reg array exists
            
            header('location: registration');
        }
        
        
        
    }
}
