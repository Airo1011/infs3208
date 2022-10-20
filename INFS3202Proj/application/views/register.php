<!-- $data = array(
			"username" =>  $username,
			"password" => $password,
			"fname" => $fname,
			"lname" =>  $lname,
            "email" => $email,
            "ans" => $ans,
            "quest" => $quest,
			"usernameErr" =>  $usernameErr,
			"passwordErr" => $passwordErr,
			"fnameErr" => $fnameErr,
			"lnameErr" =>  $lnameErr,
            "emailErr" => $emailErr,
            "ans" => $ansErr,
            "quest" => $questErr
		); -->

<style>
    .medium-password{background-color: #FCAB10;border:#BBB418 1px solid;}
    .weak-password{background-color: #B4654A;border:#AA4502 1px solid;}
    .strong-password{background-color: #ADE25D;border:#0FA015 1px solid;}
</style>


<div class="container">
      <div class="col-4 offset-4">
        <?php  if(!$registered){ ?>
        <?php echo form_open_multipart('register');?>
				<h2 class="text-center">Register</h2>   
                <p><span class="error">* required fields</span></p>    
                <div class="form-group">
                    <h5 type = text>Username:</h5>
                    <input type="text" class="form-control" value=<?php if($username ==""){echo "Username";}else{echo $username;};?> name="username">
                    <span class="error">* <?php echo $usernameErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text >Password:</h5>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" onKeyUp="checkPasswordStrength();">
                    <div id="password-checker"></div>
                    <span class="error">* <?php echo $passwordErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text>First Name:</h5>
                    <input type="text" class="form-control" value=<?php if($fname ==""){echo "FirstName";}else{echo $fname;};?> name="fname">
                    <span class="error"> <?php echo $fnameErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text>Last Name:</h5>
                    <input type="text" class="form-control" value=<?php if($lname ==""){echo "LastName";}else{echo $lname;};?> name="lname">
                    <span class="error"> <?php echo $lnameErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text>Email Address:</h5>
                    <input type="text" class="form-control" value=<?php if($email ==""){echo "EmailAddress";}else{echo $email;};?> name="emailaddress">
                    <span class="error">* <?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text>Identifying Question:</h5>
                    <input type="text" class="form-control" value=<?php if($quest ==""){echo "IdentifyingQuestion";}else{echo $quest;};?> name="quest">
                    <span class="error">* <?php echo $questErr;?></span>
                </div>
                <div class="form-group">
                    <h5 type = text>Identifying Answer:</h5>
                    <input type="text" class="form-control" value=<?php if($ans ==""){echo "IdentifyingAnswer";}else{echo $ans;};?> name="ans">
                    <span class="error">* <?php echo $ansErr;?></span>
                </div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>   
			<?php echo form_close(); ?>
            <?php }; ?>
            <?php if($registered){echo "<p>You have been registered. Please check your nominated email address for the Verification Link.</p>";};?>
	</div>
</div>

<script>
function checkPasswordStrength() {
	var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	
	if($('#password').val().length<4) {
		$('#password-checker').removeClass();
		$('#password-checker').addClass('weak-password');
        document.getElementById("password-checker").innerHTML = "<p>Weak (should be atleast 4 characters.)</p>"
	} else {  	
	    if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
			$('#password-checker').removeClass();
			$('#password-checker').addClass('strong-password');
            document.getElementById("password-checker").innerHTML = "<p>Strong (No Hacker Getting in tonight!)</p>"
        } else {
			$('#password-checker').removeClass();
			$('#password-checker').addClass('medium-password');
            document.getElementById("password-checker").innerHTML = "<p>Medium (Try including Letters, Numbers and Special characters.)</p>"
        } 
	}
}


</script>