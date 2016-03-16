<?php
    function loadScripts() {

        $scripts = array('DBconnector.php',
                    'ProductManager.php',
                    "Messages.php",
                    "ShoppingCartManager.php",
                    'Utils.php');

        $subDir = "classes";

        foreach($scripts as $script) {
            require_once($subDir . DIRECTORY_SEPARATOR. $script);
        }
        
    }   
?>    