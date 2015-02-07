<?php
$hostname='localhost';
$username='root';
$password='root';
try {
    $objPDO = new PDO("mysql:host=$hostname;dbname=slim",$username,$password);

}
catch(PDOException $e) {
    die( $e->getMessage());
}
if(isset($_REQUEST['name']) && isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
    $strSql = "INSERT INTO `users`(name, email,password, api_key ) VALUES
                (:name, :email, :password, :api_key )";
    try {
        $objSt = $objPDO->prepare($strSql);
        $boolResult = $objSt->execute(array(
            ':name' => $_REQUEST['name'],
            ':email' => $_REQUEST['mail'],
            ':password' => md5($_REQUEST['password']),
            ':api_key' => md5($_REQUEST['mail']. $_REQUEST['name'])
        ));
    }
    catch (PDOException $e) {
        die( 'ERROR: '. $e->getMessage());
    }
    if ($boolResult) {
        echo 'Successfully Registered!';
    }
//    print_r(array($_REQUEST['email'], $_REQUEST['name']));
}