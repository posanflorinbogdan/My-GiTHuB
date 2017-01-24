<?php 
require "base.php";
require "app/models/users_model.php";

class Profile extends Base {
    function __construct () {
        //echo $_SESSION["userId"];
        //var_dump($_SESSION);
        
        
        // If form submitted for updating profile
        if (!empty($_POST['first_name']))
        {
            $userModel = new UsersModel();
            $id = $_SESSION["userId"];
            $update_user = $userModel->update($_POST,$id);
            
            header("Location: /blog4/index.php?page=home");
        }
        
        
    
        parent::__construct();
        // display view
        $data["title"] = "Profile";
        $this->render("app/views/head_view.php", $data);
        include "app/views/profile_view.php";
    }  
}
    



?>