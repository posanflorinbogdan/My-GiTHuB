<?php
require ("app/controllers/base.php");
require ("app/models/articles_model.php");
require ("app/models/users_model.php");
class Articles extends Base {
    function __construct()
    {
        parent::__construct();
        $articleModel = new ArticlesModel();
        $titleUpdate= "";
        $ContentUpdate = "";
        $articleidUpdate = "";
        if (!empty($_GET["type"]) && !empty($_GET["id"]))
        {
            if ($_GET["type"] == "delete")
            {
                $articleModel->del($_GET["id"]);
            }
            else
            {
                $selectedArticle = $articleModel->getArticle($_GET["id"]);
                $titleUpdate = $selectedArticle[0]["title"];
                $ContentUpdate = $selectedArticle[0]["content"];
                $articleidUpdate = $_GET["id"];
            }
        }
        
        
        //If submited (button)
        if (is_array($_POST) && !empty($_POST)){
            if (empty($articleidUpdate))
            {
            $article = $articleModel -> insert($_POST, $_SESSION["userId"]);
            if ($article) {
                echo "Your article has been saved";
            }
            }
            else
            {
                $article = $articleModel -> update($_POST);
            if ($article) {
                echo "Your article has been updated";
            }
            }
        } 
        
        //voting sistem
        
        if (!empty($_GET['id']))
        {
           if(!empty($_GET['type']) && $_GET['type']== "down") {
               $rezult = $articleModel ->downvote($_GET['id']);
           }
           else {
               $rezult = $articleModel ->upvote($_GET['id']);
           }
            
            
            if ($rezult) {
                echo "SUCCES";}
                
        }
        
        
        $articles = $articleModel -> getAllDesc();
        //Title render  name contact
        $data["title"] = "Articles";
        $this->render("app/views/head_view.php", $data);
        //if the user is logged, render a view for logged in user
        //otherwise render a view for a not logged in user
        if (isset($_SESSION["logged"]))
        {
        include "app/views/articles_loggedin_view.php";
        }
        else
        {
        include "app/views/articles_view.php";
        }
        
        
    }
    
    function getUserName($id)
    {
        $userModel = new UsersModel();
        $user = $userModel->getUser($id)[0];
        if (!empty($user))
        {
            return $user["first_name"]." ".$user["last_name"];
        }
        else
        {
            return "Jon Doe";
        }
    }
    
    function canCRUD($articleUserId)
    {
        if ($_SESSION["logged"] && 
        (
            $_SESSION["isAdmin"] == 1 ||
            $_SESSION["userId"]== $articleUserId)
        )
        {
            return 1;
        }
        else{
            return 0;
        }
    }
}
?>