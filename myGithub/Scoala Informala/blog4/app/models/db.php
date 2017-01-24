<?php
class DB {
    public $db;
    
    function __construct() {
        //$this->db = new PDO('mysql:host='. getenv('IP') . ';dbname=mysqlweb3', getenv('C9_USER'), '');      
        $this->db = new PDO('mysql:host='. getenv('IP') . ';dbname=blog', getenv('C9_USER'), '');      
    }
    
    function select($query) {
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute();
        return $afterPrepare->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function insertOrUpdate($query, $params) {
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->execute($params);
        return $afterPrepare->rowCount();    
    }
    public function pagination($query,$offset,$limit) {
        //$params = array(":offset" => $blog_pagination["offset"],":page_limit" => $blog_pagination["page_limit"]);
        $afterPrepare = $this->db->prepare($query);
        $afterPrepare->bindParam(":offset", $offset, PDO::PARAM_INT);
        $afterPrepare->bindParam(":page_limit", $limit, PDO::PARAM_INT);
        $afterPrepare->execute();
        return $afterPrepare->fetchAll(PDO::FETCH_ASSOC);
    }
    /*public function check2($query,$code_test) {
        //$params = array(":offset" => $blog_pagination["offset"],":page_limit" => $blog_pagination["page_limit"]);
        $afterPrepare = $this->db->prepare($query);
        echo "<br>".$code_test;
        $afterPrepare->bindParam(":confirmed_code", $code_test, PDO::PARAM_INT);
        //$afterPrepare->bindParam(":page_limit", $limit, PDO::PARAM_INT);
        $afterPrepare->execute();
        return $afterPrepare->fetchAll(PDO::FETCH_ASSOC);
    }*/
}

?>