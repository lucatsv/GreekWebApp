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
        
        public function getUserData() {
            
            $id = $this->getUserId();
            if($id == null)
                return null;
            $params = array(":USERID" => $id);
            $sql = "SELECT * FROM USERS WHERE USERID = :USERID";
            $rows = $this->db->query($sql, $params);
            
            return $rows;
        }    
        
        public function login($username, $password) {
            $params = array(":username" => $username, ":password" => $password);
            
            $sql = "SELECT * FROM USERS WHERE USERNAME = :username AND PASSWORD = :password";
            $rows = $this->db->query($sql, $params);
            
            if(count($rows) > 0) 
                $data = array("status" => "ok", "userid" => $rows[0]["userid"], "userfullname" => $rows[0]["FirstName"] . " " . $rows[0]["LastName"], "admin" => $rows[0]["admin"]);
            else
                $data = array("status" => "error", "userid" => null, "error" => "User/Password not found");
            return $data;
        }
    }
?>