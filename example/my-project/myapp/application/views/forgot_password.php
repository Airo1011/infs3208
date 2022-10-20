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

<?php echo $reset?>
<?php if (!$reset && !$change_password){ ?> 
    
    <div class="container">
      <div class="col-4 offset-4">
        <?php echo form_open_multipart('register/forgot_password/'.$id);?>
				<h2 class="text-center">Check Identity</h2>   
                <p><span class="error">* required fields</span></p>    

                <div class="form-group">
                    <h5 type = text><?php echo $question;?></h5>
                    <input type="text" class="form-control" placeholder= "IdentifyingAnswer" name="ans">
                    <span class="error">* <?php echo $ansErr;?></span>
                </div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Check</button>
                    </div>   
			<?php echo form_close(); ?>
            <?php //if($registered){echo "<p>You have been registered. Please check your nominated email address for the Verification Link.</p>";};?>
        </div>
    </div>

<?php }; ?>

<?php if ($change_password ==1){ ?> 
    
    <div class="container">
      <div class="col-4 offset-4">
        <?php echo form_open_multipart('register/insert_password/'.$id);?>
				<h2 class="text-center">Change Password</h2>   
                <p><span class="error">* required fields</span></p>    

                <div class="form-group">
                    <h5 type = text >New Password:</h5>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" onKeyUp="checkPasswordStrength();">
                    <div id="password-checker"></div>
                    <span class="error">* <?php echo $passwordErr;?></span>
                </div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Check</button>
                    </div>   
			<?php echo form_close(); ?>
            <?php //if($registered){echo "<p>You have been registered. Please check your nominated email address for the Verification Link.</p>";};?>
        </div>
    </div>

<?php }; ?>
<?php if ($change_password==2){ ?> 
    
    <p>Time to Leave bucko</p>

<?php }; ?>

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