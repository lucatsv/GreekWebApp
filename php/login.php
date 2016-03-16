<?php

    session_start();
    $_SESSION['username'] = $_POST["username"];
    $_SESSION['password'] = $_POST["password"];
   
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $servername = "localhost";
    $dblogin = "root";
    $dbpassword = "root";
    $dbname = "greekwebapp";
    
    $data = array();
    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $dbpassword);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        
        if($count == 1)
        {
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['lastname'] = $row['LastName'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['city'] = $row['City'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['Password'];
            $_SESSION['phonenumber'] = $row['phoneNumber'];
            $_SESSION['province'] = $row['Province'];
            $_SESSION['username'] = $row['USERNAME'];
            $_SESSION['zipcode'] = $row['Zipcode'];
            $_SESSION['userid'] = $row['userid'];                                
  
            $data["userfullname"] = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
            
            $data['firstname'] = $row['FirstName'];
            $data['lastname'] = $row['LastName'];
            $data['address'] = $row['Address'];
            $data['city'] = $row['City'];
            $data['email'] = $row['email'];
            $data['password'] = $row['Password'];
            $data['phonenumber'] = $row['phoneNumber'];
            $data['province'] = $row['Province'];
            $data['username'] = $row['USERNAME'];
            $data['zipcode'] = $row['Zipcode'];
            $data['userid'] = $row['userid'];

        }
        else
        {
            $data["error"] = "user not found/wrong password";
        }
    } 
    catch(PDOException $e) 
    {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
    
    echo json_encode($data, JSON_FORCE_OBJECT);
?>