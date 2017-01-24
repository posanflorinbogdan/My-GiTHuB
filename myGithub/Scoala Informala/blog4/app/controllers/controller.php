<?php
class Controller {
    function __construct() {
        $pages = array(
            "home" => array("path" => "home.php", "class" => "Home"),
            "users" => array("path" => "users.php", "class" => "Users"),
            "login" => array("path" => "login.php", "class" => "Login"),
            "register" => array("path" => "register.php", "class" => "Register"),
            "admin" => array("path" => "admin.php", "class" => "Admin"),
            "play" => array("path" => "play.php", "class" => "Play"),
            "articles" => array("path" => "articles.php", "class" => "Articles"),
            "profile" => array("path" => "profile.php", "class" => "Profile"),
            "contact" => array("path" => "contact.php", "class" => "Contact"));

        
        $page = "home";
        if (isset($_GET["page"]) && array_key_exists($_GET["page"], $pages)) {
            $page = $_GET["page"];
        }
        
        $controllerPath = $pages[$page]["path"];
        $controller = $pages[$page]["class"];
        
        require $controllerPath;  
        new $controller();
        
    } 
    
}
?>