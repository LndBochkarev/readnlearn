<?php


class SignIn extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function execute() {
        
        /**
         * @todo login fails counter
         *          for specified username/email
         *          for scecified ip
         * 
         * 
         */
        
        
        
        /**
         * check data
         * if invalid load registration again 
         * if valid register the user and 
         * direct him to the login page(location login)
         * 
         * 
         */
        
        
        
        $this->view->generateHTML();
    }

}
