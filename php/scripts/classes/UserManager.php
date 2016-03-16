<?php
    
    class UserManager{
        private $db;

        public function __construct() {
            $this->db = DBConnector::getInstance();
        }  
    
    
        public function getUserId() {
            if (session_status() == PHP_SESSION_NONE)
                session_start();

            if(isset($_SESSION['userid']))
                return $_SESSION['userid'];
            else 
                return null;
        }
        
        
        public function getUserData(){
            
            $id = getUserId();
            if($id == null)
                return null;
            $params = array(":USERID" => $id);
            $sql = "SELECT * FROM USERS WHERE USERID = :USERID";
            $rows = $this->db->query($sql, $params);
            
            return $rows;
        }    
    }
    
?>