<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();

    $data = array();
    
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $address = $_POST["add"];
    $province = $_POST["province"];
    $phoneNumber = $_POST["tel"];
    $city = $_POST["city"];
    $zipCode = $_POST["ptc"];
    $userName = $_POST["username"];
    $password = $_POST["pwd"];
    
    $db = DBConnector::getInstance();

    
    $sql = "select * from users where username = :userName";
    $params = array(":userName" => $userName);
    $rows = $db->query($sql, $params);
    if(count($rows) >= 1) {
        $data["error"] = "The username " . $userName . " is existent.";
    }
    else {
        $sql = "insert into users (FirstName,LastName,email,Address,Province, Zipcode,phoneNumber,City,Password,USERNAME) values ('" . 
        $firstName . "','" . $lastName . "','" . $email . "','" . 
        $address . "','" . $province . "','" . $zipCode . "','" . 
        $phoneNumber . "','" . $city . "','" . MD5($password) . "','" . $userName . "')";
            
        if($db->affectRows($sql) > 0)
            $data["success"] = "user registered";
        else       
            $data["error"] = "Could not register. Please, try again!";
    } 
    
    echo json_encode($data, JSON_FORCE_OBJECT);
?>