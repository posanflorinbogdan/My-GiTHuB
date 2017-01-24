<?php
require "base.php";

class Login extends Base {
    function __construct() {
        
        // If form submitted
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require "app/models/users_model.php";
            $login = new UsersModel();
            $user = $login->login($_POST['email'], md5($_POST['password']));
            //
            if (is_array($user) && !empty($user)) {
               
                $_SESSION["logged"] = TRUE;
                $_SESSION["isAdmin"] = $user[0]["is_Admin"]; 
                $_SESSION["userId"] = $user[0]["id"];
                //$_SESSION["userEmail"] = $user[0]["email"];
                
                
                parent::__construct();
                header("Location: /blog4/index.php?page=home");
            }
            else
            {
                parent::__construct();
                echo "Invalid Login Attempt";
        /*$data["title"] = "Login";
        $this->render("app/views/head_view.php", $data);
        include "app/views/login_view.php";*/

            }
            
        }
       // else{
        
        parent::__construct();
        // display view
        $data["title"] = "Login";
        $this->render("app/views/head_view.php", $data);
        include "app/views/login_view.php";
        //}
    }
}
?>