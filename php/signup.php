<?php

    $servername = "localhost";
    $dblogin = "root";
    $dbpassword = "root";
    $dbname = "greekwebapp";
    
    $data = array();
    
    $FirstName = $_POST["fname"];
    $LastName = $_POST["lname"];
    $email = $_POST["email"];
    $Address = $_POST["add"];
    $province = $_POST["province"];
    $phoneNumber = $_POST["tel"];
    $City = $_POST["city"];
    $ZipCode = $_POST["ptc"];
    $USERNAME = $_POST["username"];
    $password = $_POST["pwd"];
    
    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $dbpassword);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "select * from users where username = '" . $USERNAME . "'";
        
        $statement = $conn->prepare($sql);
        $statement->execute(array($firstname, $lastname));
        $count = $statement->rowCount();
        if($count >= 1){
            $data["error"] = "The username " . $username . " is existent.";
        }
  	    else {
            $sql = "insert into users (FirstName,LastName,email,Address,Province, Zipcode,phoneNumber,City,Password,USERNAME) values ('" . 
            $FirstName . "','" . $LastName . "','" . $email . "','" . 
            $Address . "','" . $province . "','" . $ZipCode . "','" . 
            $phoneNumber . "','" . $City . "','" . $password . "','" . $USERNAME . "')";
    
            $statement = $conn->prepare($sql);
            $statement->execute(array($firstname, $lastname));
            
            $data["success"] = "user registered";             
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