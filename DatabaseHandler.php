<?php


class DatabaseHandler {
    private $_objPdo;

    /**
     *
     */
    public function __construct() {
        $hostname = 'host';
        $username = 'user';
        $password = 'password';
        try {
            $this->_objPdo = new PDO("mysql:host=$hostname;dbname=db_name", $username, $password);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    /**
     * @param $user_name
     * @param $email
     * @return bool|int
     */
    public function authenticate($user_name, $email) {

        $strSql = "SELECT count(.*) FROM `users` WHERE `api_key` = :api_key LIMIT 1";
        try {
            $objSt = $this->_objPdo->prepare($strSql);
            $objSt->execute(array(
                ':api_key' => md5($email . 'api' . $user_name) // your technique for api key generation
            ));
            return $objSt->rowCount();
        }
        catch (PDOException $e) {
            die( 'ERROR: '. $e->getMessage());
        }
        return false;
    }

    /**
     * @return array
     */
    public function getUserDetails() {
        $strSql = "SELECT `id`, `name`, `email` FROM `users`";
        try {
            $objSt = $this->_objPdo->prepare($strSql);
            $objSt->execute();
           return $objSt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            die( 'ERROR: '. $e->getMessage());
        }
        return array();
    }

}