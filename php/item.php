<?php

    session_start();
    $_SESSION['username'] = $_POST["username"];
    $_SESSION['password'] = $_POST["password"];
    
    $dishId = $_POST["dishId"];
    
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

        $sql = "SELECT * FROM dishes WHERE dishID = '$dishId'";
        $statement = $conn->prepare($sql);
        $statement->execute(array($firstname, $lastname));
        $count = $statement->rowCount();
        
        if($count == 1)
        {
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $data['dishName'] = $row['dishName'];
            $data['price'] = $row['price'];

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