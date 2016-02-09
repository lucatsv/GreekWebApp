<?php

    $servername = "localhost";
    $dblogin = "root";
    $dbpassword = "root";
    $dbname = "greekwebapp";

    session_start();

    //can't read from sessions variables because the data are new
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $province = $_POST['province'];
    $username = $_POST['username'];
    $zipcode = $_POST['zipcode'];
    $userid = $_SESSION['userid'];  
    
    $data = array();
    try 
    {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $dbpassword);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE USERS
                SET ADDRESS = '$address', City='$city', email = '$email',
                password = '$password', phonenumber = '$phonenumber', province = '$province', zipcode = '$zipcode'
                WHERE userid='$userid'";
                
        $statement = $conn->prepare($sql);
        $statement->execute();
        
        $data = array("msg" => "Success update!");
    } 
    catch(PDOException $e) 
    {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
    

     echo json_encode($data, JSON_FORCE_OBJECT);

?>