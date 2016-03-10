<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require "classes/DbConnector.php";
        
        $db = DBConnector::getInstance();
              
        $rows = $db->query("select * from dishes");
        foreach ($rows as $row) {
            foreach ($row as $key => $value) {
                echo $value;
            }
        }
         
    
    ?>
</body>
</html>