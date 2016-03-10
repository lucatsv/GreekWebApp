<?php
    function specialities($scope){
        
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
            
            if($scope == "lunch") {
                $sql = "SELECT * FROM dishes where categoryId = 1" ;
            }
            else if ($scope == "dinner") {
                $sql = "SELECT * FROM dishes where categoryId = 2" ;
            }
            else {
                $sql = "SELECT * FROM dishes where categoryId != 3";                
            }
            
            $statement = $conn->prepare($sql);
            $statement->execute();
            
            $rows = $statement->fetchAll();

            $col =1;       
            foreach ($rows as $row) {
                if($col == 1)
                {
                    echo "<div class='row'>";
                }   
                echo "<div class='col-md-4 hidden-xs border'>
                        <a href='#' data-toggle='modal' data-target='#" . strtolower($row[dishName]) . "'>".
                        "<strong>" . $row['dishName'] . "</strong><br />" .
                        "<img name='nutrition-guide' src='../$row[imgAddress]' alt='" . $row['dishName'] . "'/></a><br/>" 
                        . "$" . $row['price'] . " <btn name='".$row['dishId']."' id='addCart_" . $row['dishId'] ."' class='btn btn-primary glyphicon glyphicon-shopping-cart' aria-hidden='true'></btn>" .
                    "</div>" .
                    "<div class='col-md-4 visible-xs border'>" . 
                         "<strong>" . $row['dishName']. "</strong>" . "<br />" . $row['description'] . "<br />" .
                        "$" . $row['price'] . " <btn name='".$row['dishId']."' id='addCart_" . $row['dishId'] ."' class='btn btn-primary glyphicon glyphicon-shopping-cart' aria-hidden='true'></btn>" .                               
                    "</div>";

                if($col == 3) //closing the row
                    echo "</div>";
    
                $col++;
                if($col == 4)
                    $col = 1;
            }
    
        echo "</div>";      
  
        } 
        catch(PDOException $e) 
        {
            echo "<p style='color: red;'>From the SQL code: $sql</p>";
            $error = $e->getMessage();
            echo "<p style='color: red;'>$error</p>";
        }
    }

?>