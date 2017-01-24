<?php

require_once ("db.php");
class ContactModel extends DB {

    // Get all users from db
    public function getAll() 
    {
        $query = "SELECT * from `contacts`";   
        return $this->select($query);
    }
    
    public function insert_contact($contacts)
    {
        
        date_default_timezone_set('Europe/Bucharest');
        $date = date('Y/m/d h:i:s ', time());
        $contacts["created"]=$date;
        
        $query = "INSERT into `contacts` (name, email, subject, text, created) 
        values (:name, :email, :subject, :text, :created)";
        $params = array (
                        ":name" => $contacts["name"],
                        ":email" => $contacts["email"],
                        ":subject" => $contacts["subject"],
                        ":text" => $contacts["text"],
                        ":created" => $contacts["created"]
                        );
        return $this->insertOrUpdate($query, $params);
    }
    
 }
?>

