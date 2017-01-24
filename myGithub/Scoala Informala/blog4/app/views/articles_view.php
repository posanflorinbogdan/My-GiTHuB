<div id= "ContentA"> 

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Uploaded By</th>
            <th>Title</th>
            <th>Content</th> 
            <th>Created</th>
            <th>Votes</th>
            <th>UpVote</th>
            <th>DownVote</th>
        </tr>
    </thead>
    
    <?php for($i=0; $i < count($articles); $i++) { ?>
    
    <tbody>
        <tr>
            
            <td><?php echo $this->getUserName($articles[$i]["user_id"]); ?></td>
            <td><strong><a href="index.php?page=articles&id=<?php echo $articles[$i]["id"];?>"><?php echo $articles[$i]["title"];?></a></strong></td>
            <td><?php echo $articles[$i]["content"];?></td>
            <td><?php echo $articles[$i]["datetime"];?></td>
            <td><?php echo $articles[$i]["votes"];?></td>
            <td><form id="articles" action="/blog4/index.php?page=articles&type=up&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Up Vote</button></form></td>
            <td><form id="articles" action="/blog4/index.php?page=articles&type=down&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Down Vote</button></form></td>
        </tr>        
    </tbody>
    
    <?php }?>

</table>

<?php include "footer_view.php";?>