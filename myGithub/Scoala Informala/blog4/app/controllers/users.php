<?php
require "base.php";
require "app/models/users_model.php";

class Users extends Base {
    function __construct() {
        parent::__construct();
        //this view will be available only to administrators
        if (!isset($_SESSION["logged"]) || 
        !isset($_SESSION["isAdmin"]) || 
        (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] != 1))
        {
            header("Location: index.php?page=home");
        }
        $users = new UsersModel();
        $aUsers = $users->getAll(); 
        
        // get user 
        if (!empty($_GET['id'])) {
            $aUser = $users->getUser($_GET['id']); 
            echo json_encode($aUser);
            exit;
        }
        
        // add new user
        if (!empty($_GET['action']) && !empty($_GET['action'] == 'add')) {
            $isAdded = $users->insert($_POST); 
            echo json_encode(array($isAdded));
            exit;
        }
        
        
        $data["title"] = "Users";
        $data["name"] = "Name Users";
        $this->render("app/views/head_view.php", $data);
        $this->render("app/views/menu_admin_view.php");
        include "app/views/users_view.php";
        
        include "app/views/footer_view.php";
    }
}
?>