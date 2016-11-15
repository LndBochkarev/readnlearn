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
        
        $udh = $this->model->getUserDataHandler();
        
        $data = $udh->prepareUserData();
        
        if ($data['is_valid']) {
            
            $uqh = $this->model->getUserQueryHandler();
            
            //working
            //$uqh->insertUser($data);
            
            header('location: login');
            
        } else {
            //view setData
            //view setContent
            
            
        }
        
        
        $this->view->generateHTML();
    }
}
