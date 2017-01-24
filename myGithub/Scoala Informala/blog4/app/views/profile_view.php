<div id= "Content">
    
    <h2>My Profile</h2>
    <div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
                    <form class="updateProfile_form" method="post">
                        <label> Enter First Name: </label></br>
                        <input type="text" name="first_name" required="required"></br>
                        <label> Enter Last Name: </label></br>
                        <input type="text" name="last_name" required="required"></br>
                        <label> Enter Email: </label></br>
                        <input id="email" type="text" name="email" required="required"></br>
                        <!--<label> Password: </label></br>
                        <input type="password" name="password" required="required"></br>-->
                        <input type="submit" id="updateProfile_form" name="updateProfile" value="Update"></br>
                    </form>
                   
                </div>
                <div class="col-md-4"></div>
    	    </div>
        </div>
    </div>
   
  
    

<?php include "footer_view.php";?>