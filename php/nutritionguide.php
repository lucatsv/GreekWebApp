<?php
    $servername = "localhost";
    $dblogin = "root";
    $dbpassword = "root";
    $dbname = "greekwebapp";
    $data = array();
    $dishName = $_POST["dishName"];
    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $dbpassword);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM DISHES WHERE DISHNAME = '$dishName'";
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        
        if($count == 1)
            $data = $statement->fetch(PDO::FETCH_ASSOC);
        else
            $data["error"] = "item not found";
    } 
    catch(PDOException $e) 
    {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
    echo json_encode($data, JSON_FORCE_OBJECT);
?>