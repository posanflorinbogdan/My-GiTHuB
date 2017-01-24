<?php
require_once ("db.php");
class ArticlesModel extends DB {
    
    public function insert($article, $user_Id) 
    {
        date_default_timezone_set('Europe/Bucharest');
        $date = date('Y/m/d h:i:s ', time());
        $article["datetime"]=$date;
        
        $query = "INSERT into `articles` (title, content, datetime, user_id) 
        values (:title, :content, :datetime, :user_id)";
        $params = (array(
            ":title" => $article["title"],
            ":content"=> $article["content"], 
            ":datetime"=> $article["datetime"],
            ":user_id"=> $user_Id));
        return $this->insertOrUpdate($query, $params);
        
    }
    
    public function update($article) {
        $query = "UPDATE articles SET title=:title, content=:content WHERE id=:id";
        $params = (array(
            ":title" => $article["title"],
            ":content"=> $article["content"],
            ":id"=> $article["hiddenUpdate"]));
        return $this->insertOrUpdate($query, $params);
    }
    
    public function getAll() {
        $query = "SELECT * from `articles`";   
        return $this->select($query);
    }
    
    public function getAllDesc()
    {
        $query = "SELECT * FROM  `articles` ORDER BY `articles`.`datetime` DESC ";   
        return $this->select($query);
    }
    
    public function getAllTop() 
    {
        $query = "SELECT * FROM  `articles` ORDER BY `articles`.`votes` DESC ";   
        return $this->select($query);
    }
    
    public function getArticle($id) {
        $query = "SELECT * from `articles` WHERE id = '".$id."'";   
        return $this->select($query);
    }
    
    public function del($id) {
        $query = "DELETE FROM articles WHERE id=".$id;
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute();
    }
    
    public function upvote($id)
    {
        $query = "UPDATE articles SET votes=votes + 1 WHERE id=".$id;
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute();
    }
    
    public function downvote($id)
    {
        $query = "UPDATE articles SET votes=votes - 1 WHERE id=".$id;
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute();
    }
    
    public function blog_pagination($offset,$limit) {
        //echo "</br> offset este".$offset."limit este".$limit;
        $query = "SELECT * from `articles` LIMIT :offset,:page_limit";

        return $this->pagination($query,$offset,$limit);
    }
    
    public function n_pagini($perPage,$n_articole) {
        //NUMAR DE PAGINI TOTAL = numar total de valori ($n_pagini din valori.php) / nr valori per pagina
        $n_pagini=ceil($n_articole/$perPage); 
        return $n_pagini;
    }
    
    public function getPage(){
        if (isset($_GET["p"])) {
            $page=$_GET["p"];
            //echo "pagina este".$page;
        }
        else 
        $page="1";

        return $page;
    }
    
        public function get_perPage($perpage){
        if (!empty($perPage)) {
            return $perPage;
        }
    }
    
    public function set_paginare_link(){
            $search_url="";
            $pag_link="<a href=index.php?page=home&p=";
            return $pag_link;
    }
 }
?>