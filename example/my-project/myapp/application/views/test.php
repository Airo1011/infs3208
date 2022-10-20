<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<!-- Search Bar -->
<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-6 centered">
      <form class="form-inline my-2 my-lg-0">
        <?php echo form_open('ajax'); ?>
        <div >
          <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Search </button>
        <?php echo form_close(); ?>
        <div class="container">
    <!-- </div> -->
        </div>
</div>
</div>


  
<div class="row row-cols-1 row-cols-md-4" id="result"></div>
<div id="load_data_message"></div>


<script>
    $(document).ready(function(){
    var limit = 4;
    var start = 0;
    var action = 'inactive';

    function load_data( limit, start)
    {
      $.ajax({
        url:"<?php echo base_url(); ?>ajax/fetch",
        method:"PGETOST",
        data:{limit:limit, start:start},
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
          }
          else
          {
            $('#result').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#result").height() && action == 'inactive')
      {
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
    // load_data();
    //     function load_data(query){
    //         $.ajax({
    //         url:"<?php// echo base_url(); ?>ajax/fetch2",
    //         method:"GET",
    //         data:{query:query},
    //         success:function(response){
    //             $('#result').html("");
    //             if (response == "" ) {
    //                 $('#result').html(response);
    //             }else{
    //                 var obj = JSON.parse(response);
    //                 if(obj.length>0){
    //                     var items=[];
    //                     $.each(obj, function(i,val){
    //                         // items.push($('<h4>').text(val.filename));
    //                         if (val.filename.includes("jpg")) {
    //                             items.push($('<div class="col mb-4 centered"><div class="card"><div class="card-body"><h4>'+val.filename+'</h4><img width="320" height="240" src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" /></div></div></div>'));
    //                         }else{
    //                             items.push($('<div class="col mb-4 centered"><div class="card"><div class="card-body"><h4>'+val.filename+'</h4><video width="320" height="240" controls><source  src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" type="video/mp4"></video></div></div></div>'));
    //                         }
    //                 });
    //                 $('#result').append.apply($('#result'), items);         
    //                 }else{
    //                 $('#result').html("Not Found!");
    //                 }; 
    //             };
    //         }
    //     });
    //     }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != ''){
                load_data(search);
            }else{
                load_data();
            }
        });
    });
</script>

</body>
</html>

<!-- View Implemetnation
<div class="row row-cols-1 row-cols-md-4">
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>

<div class="col mb-4"><div class="card"><div class="card-body">
</div></div></div>
</div> -->

