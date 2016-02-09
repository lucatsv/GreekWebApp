<?php

    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
    }    
    
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

        $sql = "SELECT firstname, lastname, address, city, email, password, 
        phonenumber, province, username, zipcode, userid
        FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $statement = $conn->prepare($sql);
        $statement->execute(array($firstname, $lastname));
        $count = $statement->rowCount();
        
        if($count == 1)
        {
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['phonenumber'] = $row['phonenumber'];
            $_SESSION['province'] = $row['province'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['zipcode'] = $row['zipcode'];
            $_SESSION['userid'] = $row['userid'];                                

            $data = array();
            array_push($data, $_SESSION['firstname'] . " " . $_SESSION['lastname']);
        }
        else
        {
            //display an error message within json object to append it on the modal
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