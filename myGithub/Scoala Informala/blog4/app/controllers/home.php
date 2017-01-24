<?php
require "app/models/articles_model.php";
require "base.php";


class Home extends Base {
    function __construct() {
        parent::__construct();
        
        $blog = new ArticlesModel();
        $ablog = $blog->getAll();
        $n_articole = count($ablog);
        $Page = $blog->getPage();
        //echo "Pagina este".$Page;
        $perPage=$blog->get_perPage(1);
        $n_pagini = $blog->n_pagini(6,$n_articole);
        $pag_link = $blog->set_paginare_link();
        $pp=intval($Page);
        $blogs=$blog->blog_pagination(6*$pp-6,6);
        //var_dump($blogs);
        //echo $page;
        
        
        $articles = new ArticlesModel();
        $articles2 = $articles -> getAllTop();
        
        
        //
        //if the user is not logged in, render home_view.php
        
        if (!isset($_SESSION["logged"]))  {
            include ("app/views/home_articles_view.php");
        }
        else
        {
            //if the user is logged in, and is administrator, render logged_in_admin_view.php
            if (isset($_SESSION["logged"]) && 
                isset($_SESSION["isAdmin"]) &&
                $_SESSION["isAdmin"] == 1)
            {
                
                include ("app/views/logged_in_admin_view.php");
            }
            //else, render the standard logged in user logged_in_view.php
            else
            {
                
                include ("app/views/logged_in_view.php");
            }
        }
        
        
        
       
        //parent::__construct();
        
        
        
        
        
        
        
        
        $data["title"] = "Home";
        $this->render("app/views/head_view.php", $data);
        include "app/views/footer_view.php";
        //include "app/views/home_view.php";
        }
        
}
?>