<?php
require "base.php";

class Register extends Base {
    function __construct() {
        
        // If form submitted for registering new user
        if (!empty($_POST['email']) && 
        !empty($_POST['password'])) {
            require "app/models/users_model.php";
            $userModel = new UsersModel();
            $new_user = $userModel->insert($_POST);
            if (!empty($new_user)) {
                $_SESSION["logged"] = TRUE;
                $logged_user = $userModel->getUserByEmail($_POST["email"]);
                $_SESSION["userId"] = $logged_user[0]["id"];
                parent::__construct();
                header("Location: /blog4/index.php?page=home");
            }
            else
            {
                parent::__construct();
                echo "Invalid Values Entered";
        $data["title"] = "Register";
        $this->render("app/views/head_view.php", $data);
        include "app/views/register_view.php";

            }
            
        }
        else{
        
        parent::__construct();
        // display view
        $data["title"] = "Register";
        $this->render("app/views/head_view.php", $data);
        include "app/views/register_view.php";
        }
    }
}
?>