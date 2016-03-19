<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $userid = $_SESSION['userid'];  

    $db = DBConnector::getInstance();
    
    $password = MD5($password);

    $sql = "UPDATE USERS
            SET ADDRESS = '$address', City= '$city', email = '$email',
            password = '$password', phonenumber = '$phonenumber', 
            province = '$province', zipcode = '$zipcode'
            WHERE userid='$userid'";
    
    $rows = $db->affectRows($sql);
    
    
    $data = array();
    
    if($rows > 0)
        $data["msg"] = "Data updated!";
    else    
        $data["msg"] = "Data could not be updated! Try again.";
    

    echo json_encode($data, JSON_FORCE_OBJECT);

?>