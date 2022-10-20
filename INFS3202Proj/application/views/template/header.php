<html>
        <head>
                <title>INFS3202 - Assingment</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dropzone.css"> -->
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                <!-- <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type='text/javascript'></script> -->
        </head>
        <style>
          .error { color: #FF0000;}
          video {
            width: 100%;
            height: auto;
          }
        </style>
        <body   onload="set_interval()"
  onmousemove="reset_interval()"
  onclick="reset_interval()"
  onkeypress="reset_interval()"
  onscroll="reset_interval()">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">INFS3202 Proj</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>register"> Register </a>
            <a href="<?php echo base_url(); ?>upload"> Profile </a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
            <a href="<?php echo base_url(); ?>home"> Home </a>
            <a href="<?php echo base_url(); ?>upload"> Profile </a>
            <a href="<?php echo base_url(); ?>email"> Email </a>
           </li>
           <?php endif; ?>
        <li class="nav-item">
            
        </li>
    </ul>
    <ul class="navbar-nav my-lg-0">
    <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>login"> Login </a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
            <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
           </li>
           <?php endif; ?>
    </ul>

    </div>
    
</nav>
<script>
  //https://stackoverflow.com/questions/572938/force-logout-users-if-users-are-inactive-for-a-certain-period-of-time
  // Add the following into your HEAD section
  var timer = 0;
  function set_interval() {
    // the interval 'timer' is set as soon as the page loads
    timer = setInterval("auto_logout()", 300000);
    // the figure '10000' above indicates how many milliseconds the timer be set to.
    // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
    // So set it to 300000
  }

  function reset_interval() {
    //resets the timer. The timer is reset on each of the below events:
    // 1. mousemove   2. mouseclick   3. key press 4. scroliing
    //first step: clear the existing timer

    if (timer != 0) {
      clearInterval(timer);
      timer = 0;
      // second step: implement the timer again
      timer = setInterval("auto_logout()", 300000);
      // completed the reset of the timer
    }
  }

  function auto_logout() {
    // this function will redirect the user to the logout script
    window.location = "<?php echo base_url(); ?>login/logout";
  }
  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }
</script>

