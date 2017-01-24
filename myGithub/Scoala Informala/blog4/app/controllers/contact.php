<?php
require ("app/controllers/base.php");
require ("app/models/contact_model.php");

class Contact extends Base 

{
    function __construct()
    {
        parent::__construct();
        $contact = new ContactModel();
        $getContacts = $contact -> getAll();
        
        //If submited (button)
        if (is_array($_POST) && !empty($_POST)){
            $rezult = $contact -> insert_contact($_POST);
            if ($rezult) {
                echo "Your Message has been sent";
                include "app/views/contact_view.php";
            }
        } 
        
        //Title render  name contact
        $data["title"] = "Contact";
        $this->render("app/views/head_view.php", $data);
        if (isset($_SESSION["logged"]) && 
        isset($_SESSION["isAdmin"]) &&
        $_SESSION["isAdmin"] == 1)
        {
        include "app/views/contact_admin_view.php";
        }
        else {
        include "app/views/contact_view.php";
        //If logged in user is administrator render admin view
        }
    }
}
?>