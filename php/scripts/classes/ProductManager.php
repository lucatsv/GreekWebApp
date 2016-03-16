<?php

//require_once('./DBConnector.php');

//$um = new ProductManager();

// Facade
class ProductManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }
    
    
    public function productListToHTML($scope = "") {

        $col = 1;
        foreach($this->listProducts($scope) as $product)
        {
            if($col == 1)
                echo "<div class='row'>";
            echo "<div class='col-md-4 hidden-xs border'>
                <a href='#' data-toggle='modal' data-target='#" . strtolower($product['dishName']) . "'>".
                "<strong>" . $product['dishName'] . "</strong><br />" .
                "<img data-id=".$product['dishId'] . " name='nutrition-guide' src='../$product[imgAddress]' alt='" . $product['dishName'] . "'/></a><br/>" 
                . "$" . $product['price'] . " <btn name='".$product['dishId']."' id='addCart_" . $product['dishId'] ."' class='btn btn-primary glyphicon glyphicon-shopping-cart' data-id = '" . $product["dishId"] . "' 'aria-hidden='true'></btn>" .
                "</div>" .
                "<div class='col-md-4 visible-xs border'>" . 
                "<strong>" . $product['dishName']. "</strong>" . "<br />" . $product['description'] . "<br />"
                . "$" . $product['price'] . " <btn name='".$product['dishId']."' id='addCart_" . $product['dishId'] ."' class='btn btn-primary glyphicon glyphicon-shopping-cart' data-id = '" . $product["dishId"] . "' 'aria-hidden='true'></btn>" .                               
                "</div>";
            if($col == 3) //closing the row
                echo "</div>";
    
            $col++;
            if($col == 4)
                $col = 1;
        }
    }

    public function listProducts($scope = "") {
       if($scope == "lunch") {
            $sql = "SELECT * FROM dishes where categoryId = 1" ;
        }
        else if ($scope == "dinner") {
            $sql = "SELECT * FROM dishes where categoryId = 2" ;
        }
        else {
            $sql = "SELECT * FROM dishes where categoryId != 3"; //not retrieving beverages ('3')               
        }
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function findProduct($dishId) {
        $params = array(":dishId" => $dishId);
        $sql = "select * from dishes d left join nutrition_facts nf on d.dishId = nf.dsh_id where dishId = :dishId";
        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }


}

?>
