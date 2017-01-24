<?php
require "base.php";
require "app/models/users_model.php";

class Play extends Base {
    function __construct() {
    
    $count = 10;
    $ipp = 5;
    $pages =  ceil($count/$ipp);
            
        if (isset($_GET['action']) && $_GET['action'] == "users") {
             
             $users = new UsersModel();
             
             
             // 1-5 -> 1
             // 6-10 -> 2      2-1 * 5+1
             // 11-15 ... ->3  3-1 * 5+1
             
             $from = 1;
             $to = 5;
             //var_dump($_GET);
             
             if (isset($_GET["p"])) {
                 $p = $_GET["p"];
                 $from = ($p-1)*$ipp+1;
                 $to = $p*$ipp; 
             }
             
             $aUsers = $users->getAllPages($from, $to);  
             
             echo json_encode($aUsers);
             
             //if ($_GET)
            //  $usersTpl = '';
            //  for($i=0; $i<count($aUsers); $i++ ) {
            //      $usersTpl .= "<div>" . $aUsers[$i]["first_name"] . "</div>";    
            //  }
            //  echo $usersTpl;
             
             //echo "<div></div>";
             
        }
        else {
      
            include "app/views/head_view.php"; 
            include "app/views/play_view.php";
            include "app/views/footer_view.php";
        }
    }
}
?>