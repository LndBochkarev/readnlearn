<?php

class UserDataHandler {

    public function __construct() {
        
    }

    public function validateLoginData() {
        $result['is_valid'] = true;

        /**
         * @todo if email->prepare email, if username->prepare username
         */
        //$result = $this->prepareEmail($result);

        $result['password'] = filter_input(INPUT_POST, 'password');
        if (!$result['password']) {
            $result['password_msg'] = 'Enter your password';
            $result['is_valid'] = false;
        }

        return $result;
    }

    /**
     * Prepares data from registration form for inserting into database
     * 
     * @return array
     */
    public function prepareUserData() {
        $result['is_valid'] = true;

        $this->prepareUsername($result);
        $this->prepareFirstName($result);
        $this->preparePassword($result);
        $this->prepareEmail($result);

        /*
          if (!$first_name || !$password) {
          $cookieExpireTime = time() + 120;
          setcookie('first_name', $first_name, $cookieExpireTime);
          setcookie('email', $email, $cookieExpireTime);
          } */

        return $result;
    }

    /**
     * 
     * @param array $data
     * @return array $data
     */
    private function prepareUsername(&$data) {
        $data['username'] = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));

        if (!$data['username']) {
            $data['username_msg'] = 'Enter your username';
            $data['is_valid'] = false;
            
        } elseif (!ctype_alnum($data['username'])) {
            $data['username_msg'] = 'Only characters and numbers is accepted';
            $data['is_valid'] = false;
        }

        return $data;
    }

    /**
     * Adds first name data from POST request to array
     * 
     * @param array $data
     * @return array $data
     */
    private function prepareFirstName(&$data) {
        $data['first_name'] = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));

        if (!$data['first_name']) {
            $data['first_name_msg'] = 'Enter your first name';
            $data['is_valid'] = false;
            
        } elseif (!ctype_alpha($data['first_name'])) {
            $data['first_name_msg'] = 'Only characters is accepted';
            $data['is_valid'] = false;
        }

        return $data;
    }

    /**
     * Adds and encrypts password data from POST request to array
     * 
     * @param array $data 
     * @return array $data
     */
    private function preparePassword(&$data) {

        $data['password'] = trim(filter_input(INPUT_POST, 'password'));

        if (!$data['password']) {
            $data['password_msg'] = 'Enter your password';
            $data['is_valid'] = false;
        } else {

            //validate password        
            if (strlen($data['password']) < 6) {

                $data['password_msg'] = 'Password is too short';
                $data['is_valid'] = false;
            } else {

                $data['confirm_password'] = trim(filter_input(INPUT_POST, 'confirm_password'));

                if (!$data['confirm_password']) {
                    $data['confirm_password_msg'] = 'Confirm your password';
                    $data['is_valid'] = false;

                    //compare passwords
                } elseif ($data['password'] !== $data['confirm_password']) {
                    $data['confirm_password_msg'] = 'Passwords must be equal';
                    $data['is_valid'] = false;
                } else {

                    //encode password
                    $options = [
                        'cost' => 12
                    ];
                    $data['password'] = password_hash($data['password'], CRYPT_BLOWFISH, $options);

                    if (!$data['password']) {
                        $data['password_msg'] = 'Password hashing has failed';
                        $data['is_valid'] = false;
                    }
                }
            }
        }

        return $data;
    }

    /**
     * Adds email data from POST request to array
     * Email is not a required field
     * 
     * @param array $data with email field
     * @return array $data
     */
    private function prepareEmail(&$data) {

        $data['email'] = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        if ($data['email']) {
            $data['email'] = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

            if (!$data['email']) {
                $data['email_msg'] = 'Entered email is not valid';
                $data['is_valid'] = false;
            }
        } else {
            $data['email'] = NULL;
        }
        return $data;
    }

}
