<div id= "ContentA">  
</br>
</br>
</br>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Text</th> 
        <th>Created</th>
        
    </tr>
    <?php for($i=0; $i < count($getContacts); $i++) { ?>
        <tr>
            <td><?php echo $getContacts[$i]["name"]; ?></td>
            <td><?php echo $getContacts[$i]["email"];?></td>
            <td><?php echo $getContacts[$i]["subject"];?></td>
            <td><?php echo $getContacts[$i]["text"];?></td>
            <td><?php echo $getContacts[$i]["created"];?></td>
        </tr>       
    <?php }?>
</table>
<?php include "footer_view.php";?>