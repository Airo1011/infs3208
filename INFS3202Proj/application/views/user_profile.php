
<style>
  #result {
    width: 100%;
    height: 200px;
    overflow: scroll;
    padding: 0px 0px 10px;
} #remove_btn{
  background-color: #f44336;
  color: white;
}
.break {
  word-break: break-all;
}
/* "username" =>  $user[0]['username'],
					"firstname" => $user[0]['firstname'],
					"lastname" =>  $user[0]['lastname'],
					"emailaddress" => $user[0]['emailaddress'],
					"verificationlink"=>$user[0]['emailverificationcode'], 
          
        

          */


</style>
<?php if (!$show){ ?>
<div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <div class="card-text" >
        <p> Username: <b><?php echo $username; ?></b></p>
        <p> Name: <b><?php echo $firstname; ?></b> <b><?php echo $lastname; ?></b> </p>
        <p> Email: <b><?php echo $emailaddress; ?></b> </p>
        <p> Verified: <b><?php if($verified){echo "Verified";}else{echo 'Unverified';}; ?></b> </p>
        <?php echo form_open_multipart('upload');?>
              <input type="hidden" name="show" value=1 />
              <div class="form-group">
                  <button type="submit" class="float-right btn btn-secondary" >Update Details</button>
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php }; ?>
  <?php if ($show ==1){ ?> 
    <div class="row row-cols-1 row-cols-md-2">
    <div class="col mb-2">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update User</h5>
          <div class="card-text" >
            <?php echo form_open_multipart('upload');?>  
              <div class="form-group">
                  <h5 type = text>First Name:</h5>
                  <input type="text" class="form-control" placeholder="FirstName" value = <?php if($fname ==""){if($firstname ==""){echo "FirstName";}else{echo $firstname;};}else{echo $fname;};?> name="fname">
                  <span class="error"> <?php echo $fnameErr;?></span>
              </div>
              <div class="form-group">
                  <h5 type = text>Last Name:</h5>
                  <input type="text" class="form-control" placeholder=LastName value = <?php if($lname ==""){if($lastname ==""){echo "Lastname";}else{echo $lastname;};}else{echo $lname;};?> name="lname">
                  <span class="error"> <?php echo $lnameErr;?></span>
              </div>
              <div class="form-group">
                  <h5 type = text>Email Address:</h5>
                  <input type="text" class="form-control" placeholder="EmailAddress" value = <?php if($email ==""){echo $emailaddress;}else{echo $email;};?> name="email">
                  <span class="error">* <?php echo $emailErr;?></span>
              </div>
                <?php if ($fnameErr || $lnameErr ||$emailErr ){ ?> 
                  <input type="hidden" name="show" value=1 />
                <?php }else{ ?>
                  <input type="hidden" name="show" value=0 />
                <?php }; ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>   
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

  <?php }; ?>
  <div class="col mb-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Watchlist</h5>
        <div id="result">
          <table class="table text-justify" id="table">
              <tbody>
              <?php if(isset($watchlist))
                      foreach($watchlist as $row){ echo'
              <tr>
                <td class="break"><a href="'. base_url().'/video/search/'. $row->fileid .'">'.$row->filename .'</a></td>
                <td> by '. $row->username.'</td>
                <td>
                '.form_open_multipart('upload') .'
                    <input type="hidden" name="username" value='. $username.' />
                    <input type="hidden" name="fileID" value='.$row->fileid.' />
                    <div class="form-group">
                      <button type="submit" class="btn btn-block" id="remove_btn">Remove</button>
                    </div>   
                  '. form_close().'
                </td>
              </tr>
            ';}?>
              </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liked</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div> -->
</div>

<div class="col mb-4"><div class="card"><div class="card-body">
</div>


<?php echo form_close(); ?>
<h3></h3>
<div class="main"> </div>

<!-- <script>
$(document).ready(function(){
load_data();
    function load_data(query){
        $.ajax({
        url:"<?php echo base_url(); ?>ajax/fetch_user",
        method:"GET",
        data:{query:query},
        success:function(response){
            $('#user').html("");
            if (response == "" ) {
                $('#user').html(response);
            }else{
                var obj = JSON.parse(response);
                if(obj.length>0){
                    var items=[];
                    $.each(obj, function(i,val){
                        // items.push($('<h4>').text(val.filename));
                        items.push($('<p>First Name: <b>'+ val.firstname + '</b></p><p>Last Name: <b>'+ val.lastname + '</b></p><p>Email Address: <b>'+ val.emailaddress'</b></p>'));
                });
                $('#user').append.apply($('#user'), items);         
                }else{
                $('#user').html("Not Found!");
                }; 
            };
        }
    });
    }
    var search = "<?php echo $_SESSION['username']; ?>";
    if(search != ''){
        load_data(search);
    }else{
        load_data();
    }
});
</script> -->