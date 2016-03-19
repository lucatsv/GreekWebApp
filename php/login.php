<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();
    
    $um = new UserManager();
    
    $data = $um->login($_POST["username"], md5($_POST["password"]));
    if($data['userid'] != null){
        $_SESSION['userid'] = $data['userid'];
    }
    
    echo json_encode($data, JSON_FORCE_OBJECT);

?>