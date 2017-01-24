<?php
require "base.php";
require "app/models/articles_model.php";

class Admin extends Base {
    function __construct() {
        
        if (!isset($_SESSION["logged"])) {
            header("Location: index.php");   
        }
        
        if(isset($_GET['action']) && $_GET['action'] == 'articles') {
            $this->getArticles();    
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'update') {
            $this->updateArticle();    
        }
        else {
            include "app/views/admin_view.php";
            include "app/views/footer_view.php";
        }
    }
    
    function getArticles() {
        $articlesModel = new ArticlesModel();
        $articles = $articlesModel->getAll();
        echo json_encode($articles);
    }
    
    function updateArticle() {
        $articlesModel = new ArticlesModel();
        $article = $articlesModel->update($_POST);
        $result = array("success"=>$article);
        echo json_encode($result);
    }
}
?>