<?php


class SignIn extends AbstractAction {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function execute() {
        
        if ($this->userId) {
            header('location: profile');
        }
        
        /**
         * @todo login fails counter
         *          for specified username/email
         *          for scecified ip
         * 
         * 
         */
        
        //if invalid -> location:login
        //if valid check the pass and login match
        //if mathed -> direct to main page
        
        
        
        $this->view->generateHTML();
    }

}
