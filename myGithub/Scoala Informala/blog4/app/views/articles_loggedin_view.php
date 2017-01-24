<div id= "ContentA">

<form id="articles" action="#" method="post">
    <div class="left">
      <input name="title" type="text" placeholder="title" required="required" value="<?php echo $titleUpdate;?>"/>
      <textarea placeholder="Content" name="content" required="required"><?php echo $ContentUpdate;?></textarea>
    <input type="hidden" value="<?php echo $articleidUpdate; ?>" name="hiddenUpdate" />
    </div>
    <div class="send-button cl">
      <button type="submit">Send</button>
    </div>
  </form>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Content</th>
        <th>Created</th>
        <th>Votes</th>
    </tr>
    <?php for($i=0; $i < count($articles); $i++) { ?>
        <tr>
            
            <td><?php echo $this->getUserName($articles[$i]["user_id"]); ?></td>
            <td><?php echo $articles[$i]["title"];?></td>
            <td><?php echo $articles[$i]["content"];?></td>
            <td><?php echo $articles[$i]["datetime"];?></td>
            <td><?php echo $articles[$i]["votes"];?></td>
            <td><form id="articles" action="/blog4/index.php?page=articles&type=up&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Up Vote</button></form></td>
            <td><form id="articles" action="/blog4/index.php?page=articles&type=down&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Down Vote</button></form></td>
            <?php 
            if ($this->canCRUD($articles[$i]["user_id"]))
            { ?>
                <td><form id="articles" action="/blog4/index.php?page=articles&type=update&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Update</button></form></td>
                <td><form id="articles" onsubmit="return confirm('Are you sure you want to delete this article?')" action="/blog4/index.php?page=articles&type=delete&id=<?php echo $articles[$i]["id"]; ?>" method="post"> <button type="submit">Delete</button></form></td>                
            <?php }
            ?>
        </tr>       
    <?php }?>
</table>

<?php include "footer_view.php";?>