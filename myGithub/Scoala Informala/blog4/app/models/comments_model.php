<?php
require "db.php";
class CommentsModel extends DB {
    
    public function insert($comments, $user_Id) 
    {
        date_default_timezone_set('Europe/Bucharest');
        $date = date('Y/m/d h:i:s ', time());
        $comments["datetime"]=$date;
        
        $query = "INSERT into `comments` (user_id, article_id, comment, datetime) 
        values (:user_id, :article_id, :comment, :datetime)";
        $params = (array(
            ":user_id"=> $user_Id,
            ":article_id" => $article_Id,
            ":comment"=> $comments["comment"], 
            ":datetime"=> $comments["datetime"]
            ));
        return $this->insertOrUpdate($query, $params);
        
    }
    
    
    
    public function getAll() {
        $query = "SELECT * from `comments`";   
        return $this->select($query);
    }
    
    public function getAllDesc()
    {
        $query = "SELECT * FROM  `comments` ORDER BY `datetime` DESC ";   
        return $this->select($query);
    }
    
    
    
    public function getComment($id) 
    {
        $query = "SELECT * from `comments` WHERE id = '".$id."'";   
        return $this->select($query);
    }
    
    public function del($id) 
    {
        $query = "DELETE FROM comments WHERE id=".$id;
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute();
    }
    
    
    
 }
 
?>