<?php
require_once "db.php";
class UsersModel extends DB {
    
    public function login($email, $password) {
         $query = "SELECT * from `users` WHERE email = '$email' AND password = '$password'";   
        return $this->select($query);        
    }

    // Get all users from db
    public function getAllPages($from,$to) {
        $query = "SELECT * from `users` LIMIT ".$from.",".$to;   
        return $this->select($query);
    }
    
    public function getAll() {
        $query = "SELECT * from `users`";   
        return $this->select($query);
    }
    
    public function getUser($id) {
        $query = "SELECT * from `users` WHERE id = '".$id."'";   
        return $this->select($query);
    }
    
    public function getUserByEmail($email) {
        $query = "SELECT * from `users` WHERE email = '".$email."'";   
        return $this->select($query);
    }
    
    public function insert($user) {
        $md5Password = md5($user["password"]);
         date_default_timezone_set('Europe/Bucharest');
        $date = date('Y/m/d h:i:s ', time());
        
        $query = "INSERT into `users` (first_name, last_name, email, password, created) values (:first_name, :last_name, :email, :password, :created)";
        $params = array(":first_name" => $user["first_name"],":last_name"=> $user["last_name"], ":email"=> $user["email"], ":password"=> $md5Password, ":created"=>$date);
        return $this->insertOrUpdate($query, $params);
        
    }
    
    public function update($user,$id) {
        //$md5Password = md5($user["password"]);
        
        
        $query = "UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email WHERE id=$id";
        $params = array(":first_name" => $user["first_name"],":last_name"=> $user["last_name"], /*":new_email"=> $user["new_email"],*/ ":email"=> $user["email"]);
        return $this->insertOrUpdate($query, $params);
    }
    
    public function del() {
        
    }
 }
?>