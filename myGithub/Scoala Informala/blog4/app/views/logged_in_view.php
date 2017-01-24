<div id= "Content"> 
    

<h1>Logged in Home view user id= <?php echo $_SESSION["userId"];?></h1>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="articlenews">
					<div class="row">
				<?php

    				//echo "Numar articole = ".$n_articole."</br>";

				 for ($i=0; $i<count($blogs); $i++)
        		{
        				echo "<div class='col-md-4 newsarticle'>";
        				echo "<div class='article_content newstitle'><strong>".$blogs[$i]["title"]."</strong></div></br>"; 
        				echo "<div class='article_content'>".substr($blogs[$i]["content"], 0, 300)." </div>";
          				echo "</div>";
          				if ($i==2) {
          					echo "</div>";
          					echo "<div class='row'>";
          				}
          				
          				
        		}?>
        		</div>
				</div>
				</div>
				</br>
				
				<?php
    			for ($p=1;$p<=$n_pagini;$p++)
    			{
    			 //echo $query_url;
        		echo $pag_link.$p.">".$p."</a> ";
    			}

				?>
			
					
			</div>
			<div class="col-md-3">
				<div class="row">
					<?php
				
				for($i=0; $i < count($articles2); $i++) {
					echo "<div class='col-md-12 article'></br>";
    				echo "<div class='article_content title'><strong>".$articles2[$i]["title"]."</strong></div>";
    				echo "</div>";
				 }
            	?>
			</div>
			</div>
			</div>
			</div>
<?php //include "footer_view.php";?>