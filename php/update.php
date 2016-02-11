<?php

    $servername = "localhost";
    $dblogin = "root";
    $dbpassword = "root";
    $dbname = "greekwebapp";

    session_start();

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
    
    
    //updating the session variables
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['phonenumber'] = $phonenumber;
    $_SESSION['province'] = $province;
    $_SESSION['username'] = $username;
    $_SESSION['zipcode'] = $zipcode;
    
    $data = array();
    try 
    {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $dbpassword);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE USERS
                SET ADDRESS = '$address', City='$city', email = '$email',
                password = '$password', phonenumber = '$phonenumber', province = '$province', zipcode = '$zipcode'
                WHERE userid='$userid'";

        $statement = $conn->prepare($sql);
        $statement->execute();

        
        //send back the data to the client
        $data["msg"] = "Data updated!";
        $data["firstname"] = $firstname;
        $data["lastname"] = $lastname;
        $data["address"] = $address;
        $data["city"] = $city;
        $data["email"] = $email;
        $data["password"] = $password;
        $data["phonenumber"] = $phonenumber;
        $data["province"] = $province;
        $data["username"] = $username;
        $data["zipcode"] = $zipcode;
    } 
    catch(PDOException $e) 
    {
        $data["msg"] = $e->getMessage();
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
    

     echo json_encode($data, JSON_FORCE_OBJECT);

?>