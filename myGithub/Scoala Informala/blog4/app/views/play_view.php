<h1>Play with ajax</h1>
<div class="list"></div>


<label>Pages</label>

<?php for($i =1; $i<=$pages; $i++) { ?>
   <!-- <a href="index.php?page=play&p=<?php echo $i;?>">page <?php echo $i;?></a>-->
    <span data-page="<?php echo $i;?>">page <?php echo $i;?></span>
<?php }?>