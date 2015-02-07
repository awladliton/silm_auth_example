<?php


class DatabaseHandler {
    private $_objPdo;

    /**
     *
     */
    public function __construct() {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        try {
            $this->_objPdo = new PDO("mysql:host=$hostname;dbname=slim", $username, $password);

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

        $strSql = "SELECT * FROM `users` WHERE `api_key` = :api_key LIMIT 1";
        try {
            $objSt = $this->_objPdo->prepare($strSql);
            $objSt->execute(array(
                ':api_key' => md5($email . $user_name) // your technique for api key generation
            ));
            $arrUser = $objSt->fetch();
            return $arrUser['id'];
        }
        catch (PDOException $e) {
            die( 'ERROR: '. $e->getMessage());
        }
        if (is_array($arrUser)) {

        }
        return array('status' =>false);
    }

    public function generate_token($intUserId){

        $strToken = md5(time(). $intUserId);
        $strSql = "INSERT INTO `api_users`(`user_id`, `api_token`, `expired_time` ) VALUES
                (:user_id, :api_token, :expired_time)";
        try {
            $objSt = $this->_objPdo->prepare($strSql);
            $boolResult = $objSt->execute(array(
                ':user_id' => $intUserId,
                ':expired_time' => strtotime("+10 minutes"),
                ':api_token' => $strToken
            ));
        }
        catch (PDOException $e) {
            die( 'ERROR: '. $e->getMessage());
        }
        if($boolResult) {
            return $strToken;
        }
        return false;
    }

    public function verifyToken($strToken) {
        $strSql = "SELECT * FROM `api_users` WHERE `api_token` = :api_token LIMIT 1";
        try {
            $objSt = $this->_objPdo->prepare($strSql);
            $objSt->execute(array(
                ':api_token' => $strToken
            ));
            $objUser = $objSt->fetch();
            return $objUser['expired_time'];
        }
        catch (PDOException $e) {
            die( 'ERROR: '. $e->getMessage());
        }
        return array('status' =>false);
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