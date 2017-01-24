<div id= "Content"> 
<h1>Users Page</h1>
<!-- users list -->


<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>ID</th>
        
    </tr>
    <?php for($i=0; $i < count($aUsers); $i++) { ?>
        <tr>
            <td><?php echo $aUsers[$i]["first_name"] . " " . $aUsers[$i]["last_name"]; ?></td>
            <td><?php echo $aUsers[$i]["email"];?></td>
            <td><?php echo $aUsers[$i]["id"];?></td>
        </tr>       
    <?php }?>
</table>
