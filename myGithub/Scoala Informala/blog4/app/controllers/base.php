<?php
class Base {
     function __construct()
    {
        //if user opted for logout, render basic menu
         if (isset($_GET["logout"])) {
            session_destroy();
            $this->render("app/views/menu_view.php");
            header("Location: /blog4/index.php?page=home");
        }
        //if user didn't opt for logout
        else
        {
            //but if the user is not logged in, display basic menu
        if (!isset($_SESSION["logged"]))  {
            $this->render("app/views/menu_view.php");
        }
        else
        {
            //if the user is logged in, and is administrator, render administrator menu
            if (isset($_SESSION["logged"]) && 
                isset($_SESSION["isAdmin"]) &&
                $_SESSION["isAdmin"] == 1)
            {
                $this->render("app/views/menu_admin_view.php");
            }
            //else, render the standard logged in user menu.
            else
            {
                $this->render("app/views/menu_user_view.php");
            }
        }
        }
         
    }
    function render($view, $data = array()) {
        
        $template = file_get_contents($view);
        foreach($data as $key=>$value) {
            $template = str_replace("{{".$key."}}", $value, $template);    
        }
        echo $template;
    }
}
?>