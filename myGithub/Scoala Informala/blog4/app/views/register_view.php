<div id= "Content">
    
    
    <div class="row">
		<div class="col-md-12">
			<div class="row">
			    
				<div class="col-md-4"></div>
				<div class="col-md-4">
				    <h2>Register</h2>
                    <form class="register_form" method="post">
                        <label> Enter First Name: </label></br>
                        <input type="text" name="first_name" required="required"></br>
                        <label> Enter Last Name: </label></br>
                        <input type="text" name="last_name" required="required"></br>
                        <label> Enter Email: </label></br>
                        <input id="email" type="text" name="email" required="required"></br>
                        <label> Password: </label></br>
                        <input type="password" name="password" required="required"></br>
                        </br>
                        
                        <input type="submit" id="register_form" name="register_Up" value="Register"></br>
                    </form>
                    <p>
                    Please login <a href="index.php?page=login">here</a>
                    if you have an account.
                    </p>
                </div>
                <div class="col-md-4"></div>
    	    </div>
        </div>
    </div>

<?php include "footer_view.php";?>