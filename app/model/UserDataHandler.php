<?php


class UserDataHandler extends AbstractQueryHandler {
    
    public function __construct($registry, $db) {
        parent::__construct($registry, $db);
    }
    
    /**
     * 
     * @return int Id of created user
     * @throws Exception Exception describing the type of error
     */
    public function createUser() {

        $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        
        /**
         * @todo pass complexity
         * @todo compare pass and confirmed pass
         */
        $password = crypt(trim(filter_input(INPUT_POST, 'password')), $username);
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        if (!$first_name ||!$username || !$password) {
            $cookieExpireTime = time() + 120;
            setcookie('first_name', $first_name, $cookieExpireTime);
            setcookie('username', $username, $cookieExpireTime);
            setcookie('email', $email, $cookieExpireTime);
            
            throw new Exception('Some required fields are not filled');
        }      
        
        try {
            $query = "INSERT INTO users (" .
                    "first_name, username, password, email) " .
                    "VALUES (:first_name, :username, :password, :email);";
            
            $statement = $this->db->prepare($query);
            $values = array(
                ':first_name' => $first_name,
                'username' => $username,
                'password' => $password,
                ':email' => $email,
            );
            $statement->execute($values);
            
            $user_id = $db->lastInsertId();
            
        } catch (PDOException $ex) {
            /**
             * @todo log $ex
             */
            throw new Exception('User was not created');
        }
        
        return $user_id;
    }
    
    /**
     * @param type $user_id
     * @return array $array
     */
    public function getUserByID($user_id) {
        
        $query = "SELECT user_id, username, first_name, email " .
        " FROM users WHERE id = :user_id";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue('user_id', $user_id);
        $statement->execute();
        
        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
               
        return $array;
    }
    
    /**
     * @param type $username
     * @return array $array
     */
    public function getUserByUsername($username) {
        
        $query = "SELECT user_id, username, first_name, email " .
        " FROM users WHERE username = :username";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue('user_id', $user_id);
        $statement->execute();
        
        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
               
        return $array;
    }
}
